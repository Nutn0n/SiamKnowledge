<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Sentinel;
class makeadmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make {user} {role}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "make accept user's email, role name as argument";

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
        $credentials = [
            'login' => $this->argument('user'),
        ];
        $user = Sentinel::findByCredentials($credentials);
        Sentinel::findRoleByName('Student')->users()->detach($user);
        Sentinel::findRoleByName('Tutor')->users()->detach($user);
        Sentinel::findRoleByName('Admin')->users()->detach($user);
        Sentinel::findRoleByName('Reception')->users()->detach($user);
        Sentinel::findRoleByName('Support')->users()->detach($user);
        Sentinel::findRoleByName('Business')->users()->detach($user);
        Sentinel::findRoleByName($this->argument('role'))->users()->attach($user);
        $this->info("Make " . $this->argument('user') . " as " .  $this->argument('role'). " complete!");
    }
}
