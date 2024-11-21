<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Journal extends Model
{
    use HasFactory, Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'issn_print',
        'issn_online',
        'about_desc',
        'scope_desc',
        'journal_url',
        'cover_url',
        'submit_url',
        'guide_url',
        'archive_url',
        'publisher',
        'contact_name',
        'contact_email',
        'user_id',
        'slug',
        'is_active',
        'is_image_from_sync',
        'path',
        'is_manual_created',
        'accreditation',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'is_active' => 'boolean',
        'is_image_from_sync' => 'boolean',
        'is_manual_created' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function indices(): BelongsToMany
    {
        return $this->belongsToMany(Index::class);
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

}
