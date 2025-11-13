<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Core\Traits\SpatieLogsActivity;
use Schema;
use Auth;

class MyModel extends Model
{
    use HasFactory;
    use SpatieLogsActivity; 

    protected static function booted()
    {
        if(Auth::check()) 
        {
            $user_id = Auth::user()->id;
            static::creating(function ($model) use ($user_id) 
            {
                if (Schema::hasColumn($model->getTable(), 'created_by')) {
                    $model->created_by = $user_id;
                }
            });
        }
        
        
        // dd($model->id);
        // static::updating(function ($model) use ($user_id) {
        //     if (Schema::hasColumn($model->getTable(), 'updated_by')) 
        //     {
        //         dd($user_id);
        //         if($model->id && count($model->dirtyData)) {
        //             $model->updated_by = $user_id;
        //         } 
        //         else if($model->id) 
        //         {
        //             $model->timestamps = false;
        //         }
        //     }
        // });
    }
}
