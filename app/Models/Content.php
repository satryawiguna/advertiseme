<?php

namespace App\Models;

use App\Core\Entity\BaseEntity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Content extends BaseEntity
{
    use HasFactory;

    protected $fillable = [
        'content'
    ];

    protected $casts = [
        'id' => 'string'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($content) {
            $content->id = Str::uuid(36);
        });
    }
}
