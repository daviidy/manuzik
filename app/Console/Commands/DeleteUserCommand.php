<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class DeleteUserCommand extends Command
{

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    protected $signature = 'user:delete {email}';

    protected $description = 'Delete a user';

    public function handle()
    {
        $id = $this->argument('email');

        $user = User::find($id);

        if (!$user) {
            $this->error('User not found!');
            return;
        }

        $user->delete();

        $this->info('User deleted successfully!');
    }
}
