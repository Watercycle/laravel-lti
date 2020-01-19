<?php

namespace RobertBoes\LaravelLti\ToolProvider;

use IMSGlobal\LTI\ToolProvider\ToolProvider as LTIToolProvider;
use RobertBoes\LaravelLti\Exceptions\ToolProviderNotSetException;
use RobertBoes\LaravelLti\Services\LtiService;

class ToolProvider extends ToolBase
{
    /**
     * @var \RobertBoes\LaravelLti\ToolProvider\ToolProviderBase
     */
    private $provider;

    public function __construct(LtiService $lti)
    {
        parent::__construct($lti);
        $this->provider = new ToolProviderBase($this->dataConnector());
    }

    private function checkToolProvider()
    {
        if (!($this->provider instanceof ToolProviderBase)) {
            throw new ToolProviderNotSetException();
        }
    }

    public function handleRequest() {
        $this->checkToolProvider();
        $this->provider->handleRequest();
    }

    public function getToolProvider() {
        return $this->provider;
    }
}
