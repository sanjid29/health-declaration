<?php

namespace App\Projects\HealthDeclaration\DataBlocks;

use App\Projects\HealthDeclaration\Features\DataBlocks\DataBlock;
use App\Projects\HealthDeclaration\Modules\Declarations\Declaration;

class SampleDataBlock extends DataBlock
{
    /**
     * Load the result
     *
     * @var mixed
     */
    public $data;

    /**
     * Cache Seconds
     *
     * @var int
     */
    public $cache = 6;

    /**
     * Process the result
     */
    public function process()
    {

        // Todo: Prepare and load data

        $total = Declaration::count();

        $this->data = [
            'declarations' => $total,
        ];
    }

    // Write Additional helper for data calculation if needed.

}