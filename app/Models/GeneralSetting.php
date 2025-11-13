<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends MyModel
{
    use HasFactory;

    protected $table = 'general_setting';

    protected $guarded = [];
}
