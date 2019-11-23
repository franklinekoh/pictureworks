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
