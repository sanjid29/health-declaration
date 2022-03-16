<?php
/** @noinspection DuplicatedCode */

use App\Module;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Str;
use Symfony\Component\Console\Output\ConsoleOutput;

class CreateDeclarationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // Note: Skip if the table exists
        if (Schema::hasTable('declarations')) {
            return;
        }

        /*---------------------------------
        | Create the table
        |---------------------------------*/
        Schema::create('declarations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid', 64)->nullable()->default(null);
            $table->unsignedInteger('project_id')->nullable()->default(null);
            $table->unsignedInteger('tenant_id')->nullable()->default(null);
            $table->string('name', 512)->nullable()->default(null);

            /******* Custom columns **********/
            // Todo: Add module specific fields and denormalized fields. In computing, denormalization is the process of
            //  improving the read performance of a database, at the expense of losing some write performance,
            //  by adding redundant copies of data or by grouping it.

            $table->string('passenger_name', 255)->nullable()->default(null);
            $table->date('passenger_dob')->nullable()->default(null);
            $table->string('gender',100)->nullable()->default(null);
            $table->string('passport_no',100)->nullable()->default(null);
            $table->string('flight_no',100)->nullable()->default(null);
            $table->string('sit_no',100)->nullable()->default(null);
            $table->string('mobile_no',100)->nullable()->default(null);
            $table->date('arrival_date',100)->nullable()->default(null);
            $table->date('departure_date',100)->nullable()->default(null);
            $table->tinyInteger('destination_country_id')->nullable()->default(null);
            $table->string('destination_country_name',155)->nullable()->default(null);
            $table->text('visited_country_ids')->nullable()->default(null);
            $table->text('visited_country_names')->nullable()->default(null);
            $table->tinyInteger('division_id')->nullable()->default(null);
            $table->string('division_name',155)->nullable()->default(null);
            $table->tinyInteger('district_id')->nullable()->default(null);
            $table->string('district_name',155)->nullable()->default(null);
            $table->tinyInteger('upazila_id')->nullable()->default(null);
            $table->string('upazila_name',155)->nullable()->default(null);
            $table->string('village',255)->nullable()->default(null);
            $table->string('road',255)->nullable()->default(null);
            $table->string('house',255)->nullable()->default(null);

            $table->tinyInteger('has_sore_throat')->nullable()->default(null);
            $table->tinyInteger('has_fever')->nullable()->default(null);
            $table->tinyInteger('has_headache')->nullable()->default(null);
            $table->tinyInteger('has_tiredness')->nullable()->default(null);
            $table->tinyInteger('has_cough')->nullable()->default(null);
            $table->tinyInteger('has_shortness_of_breath')->nullable()->default(null);
            $table->tinyInteger('has_loss_of_taste_or_smell')->nullable()->default(null);
            $table->tinyInteger('has_covid')->nullable()->default(null);
            $table->date('first_vaccine_date')->nullable()->default(null);
            $table->date('second_vaccine_date')->nullable()->default(null);

            //$table->text('field')->nullable()->default(null);
            /*********************************/

            $table->tinyInteger('is_active')->nullable()->default(1);
            $table->unsignedInteger('created_by')->nullable()->default(null);
            $table->unsignedInteger('updated_by')->nullable()->default(null);
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedInteger('deleted_by')->nullable()->default(null);
        });

        /*---------------------------------
        | Update modules table
        |---------------------------------*/
        $name = 'declarations';

        $module = Module::firstOrNew(['name' => $name]);

        $module->title = str_replace('-', ' ', ucfirst($name));        // Todo: Give a human friendly name
        $module->module_group_id = 1;                                                 // Todo: Are you sure you want to put this in default module-group
        $module->description = 'Manage '.Str::plural($module->title); // Todo: human friendly name.
        $module->module_table = 'declarations';
        $module->route_path = 'declarations';
        $module->route_name = 'declarations';
        $module->class_directory = 'app/Projects/HealthDeclaration/Modules/Declarations';
        $module->namespace = '\App\Projects\HealthDeclaration\Modules\Declarations';
        $module->model = '\App\Projects\HealthDeclaration\Modules\Declarations\Declaration';
        $module->policy = '\App\Projects\HealthDeclaration\Modules\Declarations\DeclarationPolicy';
        $module->processor = '\App\Projects\HealthDeclaration\Modules\Declarations\DeclarationProcessor';
        $module->controller = '\App\Projects\HealthDeclaration\Modules\Declarations\DeclarationController';
        $module->view_directory = 'projects.health-declaration.modules.declarations';
        $module->icon_css = 'fa fa-ellipsis-v';
        $module->is_visible = 1;
        $module->is_active = 1;
        $module->created_by = 1;

        $module->save();

        /*---------------------------------
        | Run following set of artisan commands
        |---------------------------------*/
        $output = new ConsoleOutput();
        $commands = [
            'cache:clear',
            'route:clear',
            'mainframe:create-root-models',
            // 'ide-helper:model -W'
        ];
        foreach ($commands as $command) {
            $output->writeLn('php artisan '.$command);
            Artisan::call($command);
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('declarations');
    }
}
