<?php

namespace Visma\AgreementPopup\Block;

use Visma\AgreementPopup\Controller\AgreementCookieController;

class AgreementPopupClass extends \Magento\Framework\View\Element\Template
{
    protected $_cookieController;
    protected $_scopeConfig;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        AgreementCookieController $agreementCookieController,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Framework\Module\Status $status,
        \Magento\Config\Model\ResourceModel\Config $moduleConfig,
        array $data = []
   )
   {
        $this->_cookieController = $agreementCookieController;
        $this->_scopeConfig = $scopeConfig;
        parent::__construct($context, $data);
   }

   public function getCookie()
   {
       if(!isset($_COOKIE[$this->_cookieController->getCookieName()])) {

           $this->_cookieController->setCookie("false");
       }

       return($this->_cookieController->getCookie());
   }

    public function setCookieAgree()
    {
        if(isset($_POST['agreeButton'])){
            $this->_cookieController->setCookie("true");
        }
    }

    public function getConfigInfo()
    {
        $agreementText = $this->_scopeConfig->getValue('clientagreement/display/display_agreement_text', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        $agreementUrlText = $this->_scopeConfig->getValue('clientagreement/display/agreement_url_text', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        $agreementUrl = $this->_scopeConfig->getValue('clientagreement/display/agreement_url', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        $popupPosition = $this->_scopeConfig->getValue('clientagreement/display/popup_position', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

        return array (
            "agreement_text" => $agreementText,
            "agreement_url_text" => $agreementUrlText,
            "agreement_url" => $agreementUrl,
            "popup_position" => $popupPosition
        );
    }
}