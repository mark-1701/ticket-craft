<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class CreateDatabaseReinstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:reinstall';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command reinstalls the database. migrate:reset, migrate and db:seed';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Artisan::call('migrate:reset');
        Artisan::call('migrate');
        Artisan::call('db:seed');
    }
}
