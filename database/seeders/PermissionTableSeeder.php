<?php
namespace Database\Seeders;
  
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    public function run()
    {
        /*$role = Role::find(1);
         
            $permissions = Permission::pluck('id','id')->all();
       
            $role->syncPermissions($permissions);*/
         

        $permissions = [
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',

           'category-list',
           'category-create',
           'category-edit',
           'category-delete',

           'slider-list',
           'slider-create',
           'slider-edit',
           'slider-delete',

           'pages-list',
           'pages-create',
           'pages-edit',
           'pages-delete',
           
           'testimonial-list',
           'testimonial-create',
           'testimonial-edit',
           'testimonial-delete',

           'about-list',
           'social_media-list',
           'general_setting-list',
           'clear_cache-list',

        ];
     
        foreach ($permissions as $permission) {
            $permit = Permission::where(['name' => $permission])->get()->toArray();
            if(isset($permit) && empty($permit))
            {
                Permission::create(['name' => $permission]);
            }
        }
    }
}