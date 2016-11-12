<?php

namespace App\Console\Commands;
use App\CronController;
use Illuminate\Console\Command;

class UpdateTutorGrade extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Tutor Status Update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Tutor Status';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(CronController $cron)
    {
        parent::__construct();
        $this->cron = $cron;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->cron->update();
    }
}
