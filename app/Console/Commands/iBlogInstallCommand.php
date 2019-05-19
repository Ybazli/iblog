<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class iBlogInstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'iblog:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'install enviroment for iblog blog system.';

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
        //ask database details for create .env file
        $env = file_get_contents('.env.example');
        dd(explode(' ' , $env));
        $database['name'] = $this->ask('Database Name ?');
        $database['username'] = $this->ask('Database User ?');
        $database['password'] = $this->secret('Database Password ?');

        \Artisan::call('migrate:fresh');

        $this->info('The Database was migrated successfully.');

        $data['first_name'] = $this->ask('What is your first name?');
        $data['last_name'] = $this->ask('What is your last name?');
        $data['email'] = $this->ask('What is your email?');
        $data['username'] = $this->ask('What is your username?');
        $data['password'] = $this->secret('What is your password?');

        $user = factory(User::class)->create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
        $this->info('Your user was created!');
        //most the user added to admin list

    }


    protected function createEnvFile(array $databse)
    {

    }
}
