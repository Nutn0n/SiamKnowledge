<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Sentinel;

class init extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize Application';

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
        $this->call('key:generate');
        $this->call('migrate');
        Sentinel::getRoleRepository()->createModel()->create([
        'name' => 'Student',
        'slug' => 'student',
        'permissions'   => array(
            'Addcourse' => true,
        ),
    ]);
    Sentinel::getRoleRepository()->createModel()->create([
        'name' => 'Tutor',
        'slug' => 'Tutor',
        'permissions'   => array(
            'Interest' => true,

        ),
    ]);
    Sentinel::getRoleRepository()->createModel()->create([
        'name' => 'Admin',
        'slug' => 'Admin',
        'permissions'   => array(
            'dashboard.view.credit' => true,
            'dashboard.view.user' => true,
            'dashboard.view.course' => true,

        ),
    ]);
    Sentinel::getRoleRepository()->createModel()->create([
        'name' => 'Reception',
        'slug' => 'Reception',
        'permissions'   => array(
            'dashboard.view.user' => true,

        ),
    ]);
    Sentinel::getRoleRepository()->createModel()->create([
        'name' => 'Support',
        'slug' => 'Support',
        'permissions'   => array(
            'dashboard.view.user' => true,

        ),
    ]);
    Sentinel::getRoleRepository()->createModel()->create([
        'name' => 'Business',
        'slug' => 'Business',
        'permissions'   => array(
            'dashboard.view.credit' => true,
        ),
    ]);
    $this->info('Sentinel Create Role Complete');
    }

}
