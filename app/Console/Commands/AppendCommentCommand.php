<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Validator;

class AppendCommentCommand extends Command
{


    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'comment:append';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Append comment to a specified user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $id = $this->ask('Enter User Id');
        $comment = $this->ask('Enter Comment');

        $validatorData = [
            'id' => $id,
            'comments' => $comment
        ];

        $validatorRule = [
            'id' => 'required|numeric|exists:users,id',
            'comments' => 'required',
        ];

        $validatorMessage = [
            'id.required' => 'Missing key/value for :attribute',
            'comments.required' => 'Missing key/value for :attribute',
            'id.numeric' => 'Invalid id',
            'id.exists' => 'No such user (1)'
        ];

        $validator = Validator::make($validatorData, $validatorRule, $validatorMessage);

        if ($validator->fails()) {
            $this->info('Error');

            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }
            return 1;
        }

        $updated = User::findOrFail($id)->appendUserComment($comment);

        if (!$updated)
            $this->error('Could not update database');

        $this->info("Ok");
    }

}
