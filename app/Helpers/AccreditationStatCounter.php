<?php

namespace App\Helpers;

use App\Models\Journal;

class AccreditationStatCounter
{
    public static function count($accreditation)
    {
        return Journal::where('is_active', true)->where('accreditation', $accreditation)->count();
    }

    public static function countAll()
    {
        return Journal::where('is_active', true)->count();
    }

    public static function notAccredited()
    {
        return Journal::where('is_active', true)->where('accreditation', 'NOT_ACCREDITED')->count();
    }
}
