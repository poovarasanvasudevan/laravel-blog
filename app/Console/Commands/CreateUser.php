<?php

namespace App\Console\Commands;

use App\User;
use Hash;
use Illuminate\Console\Command;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'phoenix:createuser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates New User';

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

        $name = $this->ask("Enter Your Name ?");
        $abyasiid = $this->ask("Enter Your abyasi Id ?");
        $email = $this->ask("Enter Your Email ?");
        $password = $this->secret("Enter Password ?");
        if (User::create(array(
            'name' => $name,
            'abyasiid' => $abyasiid,
            'email' => $email,
            'password' => Hash::make($password),
        ))) {
          $this->info("User Created Succesfully..");
        } else {
            $this->error("Failed to Create User..");
        }
    }
}
