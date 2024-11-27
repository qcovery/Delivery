<?php
namespace Delivery\Module\Configuration;

$config = [
    'controllers' => [
        'factories' => [
            'Delivery\Controller\DeliveryController' => 'VuFind\Controller\AbstractBaseFactory',
        ],
        'aliases' => [
            'Delivery' => 'Delivery\Controller\DeliveryController',
            'delivery' => 'Delivery\Controller\DeliveryController',
            'VuFind\Controller\DeliveryController' => 'Delivery\Controller\DeliveryController',
        ],
    ],
    'service_manager' => [
        'allow_override' => true,
        'factories' => [
            'Delivery\Auth\DeliveryAuthenticator' => 'Delivery\Auth\DeliveryAuthenticatorFactory',
            'Delivery\AjaxHandler\CheckAvailability' => 'Delivery\AjaxHandler\CheckAvailabilityFactory',
            'Delivery\Db\Row\Delivery' => 'VuFind\Db\Row\RowGatewayFactory',
            'Delivery\Db\Row\UserDelivery' => 'VuFind\Db\Row\RowGatewayFactory',
            'Delivery\Db\Table\Delivery' => 'VuFind\Db\Table\GatewayFactory',
            'Delivery\Db\Table\UserDelivery' => 'VuFind\Db\Table\GatewayFactory',
            'Delivery\Driver\PluginManager' => 'VuFind\ServiceManager\AbstractPluginManagerFactory',
        ],
        'aliases' => [
            'VuFind\ILSAuthenticator' => 'Delivery\Auth\DeliveryAuthenticator',
            'checkAvailability' => 'Delivery\AjaxHandler\CheckAvailability',
            'Delivery\DriverPluginManager' => 'Delivery\Driver\PluginManager',
        ],
    ],
    'vufind' => [
        'plugin_managers' => [
            'db_row' => [
                'factories' => [
                    'Delivery\Db\Row\Delivery' => 'VuFind\Db\Row\RowGatewayFactory',
                    'Delivery\Db\Row\UserDelivery' => 'VuFind\Db\Row\RowGatewayFactory',
                ],
                'aliases' => [
                    'delivery' => 'Delivery\Db\Row\Delivery',
                    'userdelivery' => 'Delivery\Db\Row\UserDelivery',
                ],
            ],
            'db_table' => [
                'factories' => [
                    'Delivery\Db\Table\Delivery' => 'VuFind\Db\Table\GatewayFactory',
                    'Delivery\Db\Table\UserDelivery' => 'VuFind\Db\Table\GatewayFactory',
                ],
                'aliases' => [
                    'delivery' => 'Delivery\Db\Table\Delivery',
                    'userdelivery' => 'Delivery\Db\Table\UserDelivery',
                ],
            ],
        ],
    ],
];

// Define static routes -- Controller/Action strings
$staticRoutes = [
   'Delivery/Home', 'Delivery/Edit', 'Delivery/Order', 'Delivery/List'
];

$routeGenerator = new \VuFind\Route\RouteGenerator();
$routeGenerator->addStaticRoutes($config, $staticRoutes);

return $config;
