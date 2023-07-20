<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateUserCommand extends Command
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

    protected $signature = 'user:create {name} {email} {password} {type}';

    protected $description = 'Create a new user';

    public function handle()
    {
        $name = $this->argument('name');
        $email = $this->argument('email');
        $password = Hash::make($this->argument('password'));
        $type = $this->argument('type');

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'type' => $type,
        ]);

        $this->info('User created successfully!');
    }
}
