<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //
    public function create($abyasiId, $email, $address = null, $password)
    {
        $user = new User();
        $user->email = $email;
        $user->abyasiid = $abyasiId;
        $user->password = $password;
        $user->address = $address;

        if ($user->save()) {
            return true;
        } else {
            return false;
        }
    }

    public function authUser($email, $password)
    {
        if(!Auth::check()) {
            if (Auth::attempt(array('email' => $email, 'password' => $password), true)) {
                return true;
            } else {
                return false;
            }
        }

    }
}
