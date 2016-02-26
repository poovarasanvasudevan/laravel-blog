<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class GetPermission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'phoenix:getpermission';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List Permission Available to the User';

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
        $user = User::where("email",$this->ask("Enter the Email ?"))->first();
        $permission = $this->ask("Enter the Pemission ?");



            $this->info($user->can($permission));

    }
}
