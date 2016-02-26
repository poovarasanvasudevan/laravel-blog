<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Kodeine\Acl\Models\Eloquent\Role;

class AssignPermissionToRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'phoenix:assignrpermission';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assigns Permission to The Role';

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
        $slug = $this->ask("Enter The Role Slug ? ");

        $role = Role::where("slug", $slug)->first();
        if ($role) {
            $permission = $this->ask("Enter The Permission id ? ");
            if ($role->assignPermission($permission)) {
                $this->info("Permission Assigned Succesfully");
            } else {
                $this->error("Failed To assign Permission ");
            }
        } else {
            $this->error("Invalid Role");
        }

    }
}
