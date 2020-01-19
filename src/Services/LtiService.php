<?php

namespace RobertBoes\LaravelLti\Services;

use Illuminate\Support\Facades\DB;
use IMSGlobal\LTI\ToolProvider\DataConnector\DataConnector;
use RobertBoes\LaravelLti\ToolProvider\ToolConsumer;
use RobertBoes\LaravelLti\ToolProvider\ToolProvider;

/**
 */
class LtiService
{
    /**
     * @var \IMSGlobal\LTI\ToolProvider\DataConnector\DataConnector
     */
    protected $data_connector;

    /**
     * @var \RobertBoes\LaravelLti\ToolProvider\ToolProvider
     */
    private $toolProvider = null;

    /**
     * @var \RobertBoes\LaravelLti\ToolProvider\ToolConsumer
     */
    private $toolConsumer = null;

    /**
     */
    public function __construct()
    {
        $connection = 'database. ' . config('database.default');
        $db = DB::connection(config($connection))->getPdo();
        $this->data_connector = DataConnector::getDataConnector(config($connection . '.prefix'), $db, 'pdo');
    }

    /**
     */
    public function getDataConnector() {
        return $this->data_connector;
    }

    /**
     * @return \RobertBoes\LaravelLti\ToolProvider\ToolProvider
     */
    public function toolProvider()
    {
        if($this->toolProvider instanceof ToolProvider) {
            return $this->toolProvider;
        }
        return $this->toolProvider = (new ToolProvider($this));
    }

    /**
     * @return \RobertBoes\LaravelLti\ToolProvider\ToolConsumer
     */
    public function toolConsumer()
    {
        if($this->toolConsumer instanceof ToolConsumer) {
            return $this->toolConsumer;
        }
        return $this->toolConsumer = (new ToolConsumer($this));
    }


}
