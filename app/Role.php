<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function is_admin($id)
    {
    	$role = App\User::find($id);
    	if ($role->role = 'admin') {
    		return 1;
    	} else {
    		return 0;
    	}
    }
}
