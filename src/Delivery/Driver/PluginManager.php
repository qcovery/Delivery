<?php
/**
 * Delivery driver plugin manager
 *
 * PHP version 9
 *
 */
namespace Delivery\Driver;

/**
 * Delivery driver plugin manager
 *
 */
class PluginManager extends \VuFind\ServiceManager\AbstractPluginManager
{
    /**
     * Default plugin aliases.
     *
     * @var array
     */
    protected $aliases = [
        'dod' => 'Delivery\Driver\Dod',
        'mybib' => 'Delivery\Driver\MyBib',
    ];

    /**
     * Default plugin factories.
     *
     * @var array
     */
    protected $factories = [
        'Delivery\Driver\Dod' => 'Delivery\Driver\DriverFactory',
        'Delivery\Driver\MyBib' => 'Delivery\Driver\DriverFactory',
    ];

    /**
     * Constructor
     *
     * Make sure plugins are properly initialized.
     *
     * @param mixed $configOrContainerInstance Configuration or container instance
     * @param array $v3config                  If $configOrContainerInstance is a
     * container, this value will be passed to the parent constructor.
     */
    public function __construct($configOrContainerInstance = null) {
        parent::__construct($configOrContainerInstance);
    }

    /**
     * Return the name of the base class or interface that plug-ins must conform
     * to.
     *
     * @return string
     */
    protected function getExpectedInterface()
    {
        return 'Delivery\Driver\DriverInterface';
    }
}