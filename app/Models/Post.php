<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\PostTopic;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_other',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'title' => PostTopic::class
    ];
}
