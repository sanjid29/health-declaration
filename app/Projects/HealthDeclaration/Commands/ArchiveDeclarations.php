<?php

namespace App\Projects\HealthDeclaration\Commands;

use App\Declaration;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ArchiveDeclarations extends Command
{
    // Todo : Register this command in \App\Projects\HealthDeclaration\Providers\AppServiceProvider::$commands
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'health-declaration:archive-declaration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is a command to archive declarations';

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
        $today=Carbon::today();

       Declaration::where('is_archived','!=',1)
           ->where('created_at','<=',$today->subDays('30'))->chunk(100,function($declarations){
          foreach($declarations as $declaration){
              $declaration->update([
                  'is_archived'=>'1'
              ]);
          }
       });

    }

}