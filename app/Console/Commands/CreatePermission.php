<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Kodeine\Acl\Models\Eloquent\Permission;

class CreatePermission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'phoenix:createpermission';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates New Permissions';


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

        $permission = new Permission();
        $permission->name = $this->ask("Enter The name of Permission ?");

        $slug = $this->ask("Enter The name of Slug ?");

        $permission->slug = [
            $slug => true
        ];
        $permission->description = $this->ask("Enter The Description ?");

        if ($permission->save()) {
            $this->info("Permission Created Succesfully..");
        } else {
            $this->error("Failed to Create Permission...");
        }
    }
}
