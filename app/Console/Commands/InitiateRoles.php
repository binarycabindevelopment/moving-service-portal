<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

class InitiateRoles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'init:roles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create default roles';

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
        foreach(\App\Options\Role::get() as $roleKey => $roleLabel){
            $role = Role::where('name',$roleKey)->first();
            if(!$role){
                $role = Role::create(['name' => $roleKey]);
            }
        }
    }
}
