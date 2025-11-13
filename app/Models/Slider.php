<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends MyModel
{
    use HasFactory,SoftDeletes;

    protected $table = 'slider';

    protected $guarded = [];
    protected $dates = ['deleted_at'];
}
