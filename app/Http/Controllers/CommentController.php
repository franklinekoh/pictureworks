<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComment;
use App\Utilities\AuthUtility;
use App\User;

class CommentController extends BaseController
{

    /**
     * Post request for appending comments for a user
     *
     * @param StoreComment $request
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     *
     * * @OA\Post(
     *     path="/comment",
     *     tags={"comment"},
     *     summary="Append user comment",
     *      @OA\Parameter(
     *     name="id",
     *     description="user id",
     *      required=true,
     *     in="query",
     *     @OA\Schema(
     *     type="integer"
     * ),
     *     @OA\Parameter(
     *     name="password",
     *     description="user password",
     *     required=true,
     *     in="query",
     *     @OA\Schema(
     *     type="string"
     * ),
     *     @OA\Parameter(
     *     name="comments",
     *     description="User comment",
     *     required=true,
     *     in="query",
     *     @OA\Schema(
     *     type="string"
     * )
     * )
     * )
     * ),
     *     @OA\Response(response="200", description="Comment successfully appended"),
     *      @OA\Response(response="422", description="Unprocessed entity. (validation errors)")
     * )
     */

    public function store(StoreComment $request, User $user){

        if (!AuthUtility::check($request->input('password')))
            return $this->respondUnauthorized();

        $updated = $user->findOrFail($request->input('id'))
            ->appendUserComment($request->input('comments'));

        if (!$updated)
            return $this->respond('Could not update database', 500);

        return $this->respondSuccess();
    }
}
