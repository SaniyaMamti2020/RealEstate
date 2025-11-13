<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends MyModel
{
    use HasFactory,SoftDeletes;

    protected $table = 'category';

    protected $guarded = [];
    protected $dates = ['deleted_at'];
}
