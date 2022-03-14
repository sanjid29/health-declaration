<?php

namespace App\Projects\HealthDeclaration\Features\Report;

use App\Projects\HealthDeclaration\Features\Core\ViewProcessor;

class ReportViewProcessor extends ViewProcessor
{

    /**
     * ReportViewProcessor constructor.
     *
     * @param $reportBuilder
     */
    public function __construct($reportBuilder)
    {
        parent::__construct();
        $this->report = $reportBuilder;
    }

}