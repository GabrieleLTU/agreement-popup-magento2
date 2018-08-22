<?php
namespace Visma\AgreementPopup\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class afterConfigChange implements ObserverInterface
{
    protected $_scopeConfig;
    protected $_moduleConfig;

    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Config\Model\ResourceModel\Config $moduleConfig
    ) {
        $this->_scopeConfig = $scopeConfig;
        $this->_moduleConfig = $moduleConfig;
    }

    public function execute(Observer $observer)
    {
        $this->setEnableConfig();
    }

    private function setEnableConfig()
    {
        $isModuleEnable = $this->_scopeConfig->getValue('clientagreement/general/enable', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        $outputPath = "advanced/modules_disable_output/Visma_AgreementPopup";

        if ($isModuleEnable)
        {
           $this->_moduleConfig->saveConfig($outputPath, false, 'default', 0);
        } else {
            $this->_moduleConfig->saveConfig($outputPath, true, 'default', 0);
        }
    }
}