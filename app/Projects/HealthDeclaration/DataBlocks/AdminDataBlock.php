<?php

namespace App\Projects\HealthDeclaration\DataBlocks;

use App\Projects\HealthDeclaration\Features\DataBlocks\DataBlock;
use App\Projects\HealthDeclaration\Modules\Declarations\Declaration;
use Carbon\Carbon;

class AdminDataBlock extends DataBlock
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

        $total = Declaration::count();
        $archivedTotal = Declaration::where('is_archived', 1)->count();
        $today = Carbon::today()->format('Y-m-d H:i:s');
        $yesterday = Carbon::yesterday()->format('Y-m-d H:i:s');
        $totalToday = Declaration::whereBetween('created_at', [$yesterday, $today])->count();

        $this->data = [
            'declarations' => $total,
            'archived-declarations' =>$archivedTotal,
            'today-declarations' =>$totalToday,
        ];
    }

    // Write Additional helper for data calculation if needed.

}