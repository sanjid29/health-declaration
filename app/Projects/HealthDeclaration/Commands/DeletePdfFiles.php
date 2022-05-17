<?php

namespace App\Projects\HealthDeclaration\Commands;

use Illuminate\Console\Command;

class DeletePdfFiles extends Command
{
    // Todo : Register this command in \App\Projects\HealthDeclaration\Providers\AppServiceProvider::$commands
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'health-declaration:delete-pdf';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is a command to delete files';

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
        $files = glob('public/projects/health-declaration/pdfs/*'); // get all file names
        foreach ($files as $file) { // iterate files
            $today = date("Y-m-d");
            $time =date("Y-m-d",filemtime($file));
            if (is_file($file) && $time < $today) {
                echo $file;
                unlink($file); // delete file
            }
        }

    }

}