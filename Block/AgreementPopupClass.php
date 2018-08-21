<?php

namespace Visma\AgreementPopup\Block;

use Visma\AgreementPopup\Controller\AgreementCookieController;

class AgreementPopupClass extends \Magento\Framework\View\Element\Template
{
    protected $_cookieController;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        AgreementCookieController $agreementCookieController,
        array $data = []
   )
   {
        $this->_cookieController = $agreementCookieController;
        parent::__construct($context, $data);
   }

   public function getCookie()
   {
       if(!isset($_COOKIE['agreement'])) {

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
        return $this->_cookieController->getConfigInfo();
    }
}