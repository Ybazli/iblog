<?php

namespace App\Console\Commands;

use App\User;
use http\Env;
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
        $this->setPrefixForBlog();
        $this->setPrefixForAdmin();
        $this->info('All set! Enjoy that ;)');
    }


    protected function setEnvironmentValue(array $values)
    {

        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);

        if (count($values) > 0) {
            foreach ($values as $envKey => $envValue) {

                $str .= "\n";
                $keyPosition = strpos($str, "{$envKey}=");
                $endOfLinePosition = strpos($str, "\n", $keyPosition);
                $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);

                // If key does not exist, add it
                if (!$keyPosition || !$endOfLinePosition || !$oldLine) {
                    $str .= "{$envKey}={$envValue}\n";
                } else {
                    $str = str_replace($oldLine, "{$envKey}={$envValue}", $str);
                }

            }
        }

        $str = substr($str, 0, -1);
        if (!file_put_contents($envFile, $str)) return false;
        return true;

    }

    protected function setPrefixForBlog()
    {
        $answer = $this->ask('Enter your blog prefix' , 'blog');
        $this->setEnvironmentValue(['URL_BLOG_PREFIX' => $answer]);

    }

    protected function setPrefixForAdmin()
    {
        $answer = $this->ask('Enter your admin side prefix' , 'admin');
        $this->setEnvironmentValue(['URL_ADMIN_PREFIX' => $answer]);

    }

    protected function seedDataBase()
    {
        $answer = $this->ask('Do you want to seed some dummy data in DB ? if not leave blank.' , 'no');
        if($answer != 'no'){
            
        }
    }
}
