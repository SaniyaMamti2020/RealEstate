<?php

namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Hash;
class CreateAdminUserSeeder extends Seeder
{
   
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        $user = User::where('username','admin')->where('email','admin@gmail.com')->get()->toArray();
        if(empty($user))
        {
            $user = User::create([
                'username' => 'admin', 
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),
                'user_type' => 'admin',
                'status' => 1
            ]);
            $role = Role::create(['name' => 'admin']);
         
            $permissions = Permission::pluck('id','id')->all();
       
            $role->syncPermissions($permissions);
         
            $user->assignRole([$role->id]);

        }
    
    }
}