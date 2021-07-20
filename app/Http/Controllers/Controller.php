<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\User;
use App\Dealer;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function acl()
    {
    	// To create role
    	// $role = Role::create(['name' => 'user']);

    	// To create user
    	// $user = new User();
    	// $user->name = 'romie';
    	// $user->email = 'admin@gmail.com';
    	// $user->password = \Hash::make('123456');
    	// $user->status = '1';
    	// $user->created_at = date('Y-m-d H:i:s');
    	// $user->updated_at = date('Y-m-d H:i:s');
    	// $user->save();

    	// To assign user role
    	// $user = User::find(1);
    	// $user->assignRole('admin');

        // $user = Dealer::find(1);
        // $user->assignRole('dealer');

        // $user = Dealer::find(1);
        // var_dump( $user->hasRole('dealer') );
    }
}
