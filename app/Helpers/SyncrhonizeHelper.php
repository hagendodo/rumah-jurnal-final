<?php

namespace App\Helpers;

use App\Models\SyncJournalSecond;
use Illuminate\Support\Facades\DB;

class SyncrhonizeHelper{
    private static function getQuery($settingName): string
    {
        return "
        SELECT
            journals.journal_id AS id,
            (SELECT setting_value
             FROM journal_settings
             WHERE journal_id = journals.journal_id
               AND setting_name = '".$settingName."'
               AND journal_settings.locale = journals.primary_locale LIMIT 1) AS title,

            COALESCE(
            (SELECT setting_value FROM journal_settings
             WHERE journal_id = journals.journal_id
               AND setting_name = 'homepageImage' LIMIT 1),
            (SELECT setting_value FROM journal_settings
             WHERE journal_id = journals.journal_id
               AND setting_name = 'journalThumbnail' LIMIT 1)
            ) AS cover,

            (SELECT setting_value
             FROM journal_settings
             WHERE journal_id = journals.journal_id
               AND setting_name = 'printIssn' LIMIT 1) AS issnPrint,

            (SELECT setting_value
             FROM journal_settings
             WHERE journal_id = journals.journal_id
               AND setting_name = 'onlineIssn' LIMIT 1) AS issnOnline,

            (SELECT setting_value
             FROM journal_settings
             WHERE journal_id = journals.journal_id
               AND setting_name = 'publisherInstitution' LIMIT 1) AS publisher,

            (SELECT setting_value
             FROM journal_settings
             WHERE journal_id = journals.journal_id
               AND setting_name = 'publisherUrl' LIMIT 1) AS publisherUrl,

            (SELECT setting_value
             FROM journal_settings
             WHERE journal_id = journals.journal_id
               AND setting_name = 'contactEmail' LIMIT 1) AS contactEmail,

            (SELECT setting_value
             FROM journal_settings
             WHERE journal_id = journals.journal_id
               AND setting_name = 'contactName' LIMIT 1) AS contactName,

            (SELECT setting_value
             FROM journal_settings
             WHERE journal_id = journals.journal_id
               AND setting_name = 'description' LIMIT 1) AS description,

            (SELECT setting_value
             FROM journal_settings
             WHERE journal_id = journals.journal_id
               AND setting_name = 'focusScopeDesc'
               AND journal_settings.locale = journals.primary_locale LIMIT 1) AS aimsAndScope,

            journals.path,
            journals.primary_locale AS language
        FROM
            journals
        WHERE
            journals.enabled = 1;
        ";
    }

    private static function getCoverFileName($data): string | null
    {
        $result = [];
        $regex = '/s:(\d+):"([^"]+)";/'; // The regular expression pattern

        // Perform regular expression matching
        preg_match_all($regex, $data, $matches, PREG_SET_ORDER);

        // Process the matches
        foreach ($matches as $match) {
            $length = $match[1];
            $value = $match[2];
            $result["s:$length"] = $value;
        }

        // Check for "s:23" first, otherwise fallback to "s:26"
        return $result["s:23"] ?? $result["s:26"] ?? null;
    }

    private static function processJournals(string $baseUrl, array $journals): void
    {
        foreach ($journals as $journal) {
            // Set baseUrl
            $journal->baseUrl = $baseUrl;

            // Update cover URL if available
            if ($journal->cover) {
                $journal->cover = "{$baseUrl}/public/journals/{$journal->id}/" . SyncrhonizeHelper::getCoverFileName($journal->cover);
            } else {
                $journal->cover = null;
            }

            // Add additional URLs based on journal.path
            $journal->aimsAndScope = "{$baseUrl}/index.php/{$journal->path}/about";
            $journal->archiveUrl = "{$baseUrl}/index.php/{$journal->path}/issue/archive";
            $journal->submitUrl = "{$baseUrl}/index.php/{$journal->path}/about/submissions";
            $journal->authorGuideUrl = "{$baseUrl}/index.php/{$journal->path}/about/submissions";

            SyncJournalSecond::create([
                'title' => $journal->title,
                'cover' => $journal->cover,
                'issn_print' => $journal->issnPrint,
                'issn_online' => $journal->issnOnline,
                'publisher' => $journal->publisher,
                'contact_email' => $journal->contactEmail,
                'contact_name' => $journal->contactName,
                'description' => $journal->description,
                'aims_and_scope' => $journal->aimsAndScope,
                'archive_url' => $journal->archiveUrl,
                'submit_url' => $journal->submitUrl,
                'author_guide_url' => $journal->authorGuideUrl,
                'path' => $journal->path,
                'base_url' => $journal->baseUrl,
            ]);
        }
    }

    private static function fetchOJS2(): void
    {
        $settingName = 'title';
        $baseUrl = env('BASE_URL_OJS2');

        $journals = DB::connection('ojs2')->select(SyncrhonizeHelper::getQuery($settingName));

        SyncrhonizeHelper::processJournals($baseUrl, $journals);
    }

    private static function fetchOJS3(): void
    {
        $settingName = 'name';
        $baseUrl = env('BASE_URL_OJS3');

        $journals = DB::connection('ojs3')->select(SyncrhonizeHelper::getQuery($settingName));

        SyncrhonizeHelper::processJournals($baseUrl, $journals);
    }

    public static function fetchJournals(): void
    {
        SyncJournalSecond::truncate();
        SyncrhonizeHelper::fetchOJS2();
        SyncrhonizeHelper::fetchOJS3();
    }
}
