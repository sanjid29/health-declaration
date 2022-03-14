<?php

namespace App\Projects\HealthDeclaration\Http\Controllers;

use App\Mainframe\Features\DataBlocks\DataBlockControllerTrait;

class DataBlockController extends BaseController
{

    use DataBlockControllerTrait;

    /**
     * Directory where DataBlock classes are stored
     *
     * @var string
     */
    public $path;  //'\App\Projects\HealthDeclaration\DataBlocks';

    public function __construct()
    {
        parent::__construct();
        $this->path = projectNamespace().'\DataBlocks';

    }

}