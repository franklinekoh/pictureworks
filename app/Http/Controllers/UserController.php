<?php
namespace App\Http\Controllers;

use App\Http\Requests\ShowUser;
use App\User;


class UserController extends BaseController
{

    /**
     * Displays a specific user
     * @param ShowUser $request
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showUser(ShowUser $request, User $user) {

        $userId = $request['id'];
        $user = $user->find($userId)->with(['comments'])->first();

        return view('view', ['user' => $user]);

    }
}
