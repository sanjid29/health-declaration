<?php
/** @noinspection DuplicatedCode */

use App\Module;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Str;
use Symfony\Component\Console\Output\ConsoleOutput;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // Note: Skip if the table exists
        if (Schema::hasTable('districts')) {
            return;
        }

        /*---------------------------------
        | Create the table
        |---------------------------------*/
        Schema::create('districts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid', 64)->nullable()->default(null);
            $table->unsignedInteger('project_id')->nullable()->default(null);
            $table->unsignedInteger('tenant_id')->nullable()->default(null);
            $table->string('name', 512)->nullable()->default(null);

            /******* Custom columns **********/
            // Todo: Add module specific fields and denormalized fields. In computing, denormalization is the process of
            //  improving the read performance of a database, at the expense of losing some write performance,
            //  by adding redundant copies of data or by grouping it.
            $table->string('name_BN', 255);
            $table->string('combinedcode', 100);
            $table->double('latitude');
            $table->double('longitude');
            $table->string('code', 100);
            $table->unsignedInteger('division_id')->nullable()->default(null);
            $table->string('division_code', 100)->nullable()->default(null);
            $table->string('division_name', 512)->nullable()->default(null);
            //$table->string('title', 100)->nullable()->default(null);
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
        $name = 'districts';

        $module = Module::firstOrNew(['name' => $name]);

        $module->title = str_replace('-', ' ', ucfirst($name));        // Todo: Give a human friendly name
        $module->module_group_id = 1;                                                 // Todo: Are you sure you want to put this in default module-group
        $module->description = 'Manage '.Str::plural($module->title); // Todo: human friendly name.
        $module->module_table = 'districts';
        $module->route_path = 'districts';
        $module->route_name = 'districts';
        $module->class_directory = 'app/Projects/HealthDeclaration/Modules/Districts';
        $module->namespace = '\App\Projects\HealthDeclaration\Modules\Districts';
        $module->model = '\App\Projects\HealthDeclaration\Modules\Districts\District';
        $module->policy = '\App\Projects\HealthDeclaration\Modules\Districts\DistrictPolicy';
        $module->processor = '\App\Projects\HealthDeclaration\Modules\Districts\DistrictProcessor';
        $module->controller = '\App\Projects\HealthDeclaration\Modules\Districts\DistrictController';
        $module->view_directory = 'projects.health-declaration.modules.districts';
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
        Schema::dropIfExists('districts');
    }
}
