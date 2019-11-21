<?php
namespace App\Http\Controllers;

use App\Http\Requests\ShowUser;
use App\User;


class UserController extends Controller
{
    //
    public function showUser(ShowUser $request, User $user) {

        $userId = $request['id'];
        $user = $user->find($userId);
//        return $user;
        return view('view', ['user' => $user]);

    }
}
