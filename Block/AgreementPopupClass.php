<?php

namespace Visma\AgreementPopup\Block;

use Visma\AgreementPopup\Helper\CookieHelper;

class AgreementPopupClass extends \Magento\Framework\View\Element\Template
{

    protected $_cookieManager;
    protected $_cookieHelper;
    protected $_scopeConfig;

    public function __construct(
       \Magento\Framework\View\Element\Template\Context $context,
       \Magento\Framework\Stdlib\CookieManagerInterface $cookieManager,
       CookieHelper $cookieHelper,
       \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
       array $data = []
   )
   {
       $this->_cookieManager = $cookieManager;
       $this->_cookieHelper = $cookieHelper;
       $this->_scopeConfig = $scopeConfig;
       parent::__construct($context, $data);
       $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/cron.log');
       $logger = new \Zend\Log\Logger();
       $logger->addWriter($writer);
       $logger->info( __METHOD__ );
   }

   public function getCookie()
   {
       $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/cron.log');
       $logger = new \Zend\Log\Logger();
       $logger->addWriter($writer);
       $logger->info( __METHOD__ );
       if(!isset($_COOKIE['agreement'])) {

//           setcookie('agreement', false);
//           $_COOKIE['lg'] = 'ro';
           $this->_cookieHelper->setCookie("false");
           $logger->info( "false" );
       }

       //$cookieValue = $this->_cookieManager->getCookie(\Visma\AgreementPopup\Controller\Cookie\AddCookie::COOKIE_NAME);
       //return($cookieValue);
       return($this->_cookieHelper->getCookie());
   }

    public function setCookieAgree()
    {
        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/cron.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $logger->info( __METHOD__ );
        $this->_cookieHelper->setCookie("true");
    }

    public function getConfigInfo() //: array
    {
        $agreementText = $this->_scopeConfig->getValue('clientagreement/general/display_agreement_text', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        $agreementUrlText = $this->_scopeConfig->getValue('clientagreement/general/agreement_url_text', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        $agreementUrl = $this->_scopeConfig->getValue('clientagreement/general/agreement_url', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

        return array (
            "agreement_text" => $agreementText,
            "agreement_url_text" => $agreementUrlText,
            "agreement_url" => $agreementUrl
        );
    }
    public function getContent() //: string
    {
        return 'Dummy content';
    }


}