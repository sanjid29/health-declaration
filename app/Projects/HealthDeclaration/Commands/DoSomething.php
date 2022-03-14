<?php

namespace App\Projects\HealthDeclaration\Commands;

use Illuminate\Console\Command;

class DoSomething extends Command
{
    // Todo : Register this command in \App\Projects\HealthDeclaration\Providers\AppServiceProvider::$commands
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'health-declaration:do-something';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is a dummy command';

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
     * Invoice invoice
     *
     * @return mixed
     */
    public function handle()
    {
        // Execute some code
    }
}