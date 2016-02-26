<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class AssignPermissionToUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'phoenix:assignupermission';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign s Permission to the User';

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
        $userEmail = $this->ask("Enter The User email ? ");

        $role = User::where("email", $userEmail)->first();
        if ($role) {
            $permission = $this->ask("Enter The Permission id ? ");
            if ($role->assignPermission($permission)) {
                $this->info("Permission Assigned Succesfully");
            } else {
                $this->error("Failed To assign Permission ");
            }
        } else {
            $this->error("Invalid User");
        }
    }
}
