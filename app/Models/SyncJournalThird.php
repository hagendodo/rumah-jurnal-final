<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SyncJournalThird extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'cover',
        'issn_print',
        'issn_online',
        'publisher',
        'contact_email',
        'contact_name',
        'description',
        'aims_and_scope',
        'archive_url',
        'submit_url',
        'author_guide_url',
        'path',
        'base_url',
    ];
}
