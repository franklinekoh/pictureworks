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
     *
     * @OA\Get(
     *     path="/user/{id}",
     *     tags={"user"},
     *     summary="Get user information",
     *      @OA\Parameter(
     *     name="id",
     *     description="user id",
     *      required=true,
     *     in="path",
     *     @OA\Schema(
     *     type="integer"
     * )
     * ),
     *     @OA\Response(response="200", description="Display user information alongside comments"),
     *      @OA\Response(response="422", description="Unprocessed entity. (validation errors)")
     * )
     */
    public function showUser(ShowUser $request, User $user) {

        $userId = $request['id'];
        $user = $user->find($userId)->with(['comments'])->first();

        return view('view', ['user' => $user]);

    }
}
