<?php

namespace RobertBoes\LaravelLti\ToolProvider;

use RobertBoes\LaravelLti\Services\LtiService;

class ToolBase
{
    /**
     * @var \RobertBoes\LaravelLti\Services\LtiService
     */
    private $lti;

    public function __construct(LtiService $lti)
    {
        $this->lti = $lti;
    }

    /**
     * Get the DataConnector
     * @return \IMSGlobal\LTI\ToolProvider\DataConnector\DataConnector
     */
    protected function dataConnector() {
        return $this->lti->getDataConnector();
    }
}
