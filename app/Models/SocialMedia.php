<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends MyModel
{
    use HasFactory;

    protected $table = 'social_media';

    protected $guarded = [];
}
