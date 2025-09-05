<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'user_id',
    ];

    protected $hidden = [
        'published_at'
    ];

    protected function casts(): array
    {
        return [
            'active' => 'boolean',
            'published_at' => 'datetime',
            'user_id' => 'integer',
        ];
    }
}
