<?php
/**
 *
 */
namespace Delivery\View\Helper\Delivery;

use Delivery\AvailabilityHelper;
use Delivery\ConfigurationManager;
use VuFind\Config\PluginManager as ConfigManager;

class AvailabilityChecker extends \Laminas\View\Helper\AbstractHelper
{

    protected $configManager;

    public function __construct(ConfigManager $configManager)
    {
        $this->configManager = $configManager;
    }

    /**
     *
     */
    public function check($driver, $deliveryDomain = 'main')
    {
        $configurationManager = new ConfigurationManager($this->configManager, $deliveryDomain);
        $availabilityConfig = $configurationManager->getAvailabilityConfig();
        $mainConfig = $configurationManager->getMainConfig();
        $availabilityHelper = new AvailabilityHelper($availabilityConfig['default']);
        $availabilityHelper->setSolrDriver($driver, $mainConfig['delivery_marc_yaml']);
        return ($availabilityHelper->checkSignature()) ? 'available' : 'not available'; 
    }

    /**
     *
     */
    public function getHierarchyTopID($driver)
    {
        $hierarchyTopIDs = $driver->getHierarchyTopID();
        return $hierarchyTopIDs[0];
//        $deliveryArticleData = $driver->getMarcData('DeliveryDataArticle');
//        return $deliveryArticleData[3]['ppn']['data'][0] ?? '';
    }
}
