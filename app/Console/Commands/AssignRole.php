<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class AssignRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'phoenix:assignrole';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assigns Role to the user';

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
        $user = User::find($this->ask("Enter The User Id : "));

        if ($user) {
            $role = $this->ask("Enter The role id or slug : ");

            if ($user->assignRole($role)) {
                $this->info("Role Assigned Succesfully...");
            } else {
                $this->error("Failed TO assign Role..");
            }
        } else {
            $this->error("Invalid User..");
        }
    }
}
