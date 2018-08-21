<?php

namespace Visma\AgreementPopup\Controller;

use Magento\Framework\View\Element\Template\Context;
use Visma\AgreementPopup\Helper\CookieHelper;
use Magento\Framework\View\Element\Template;

class AgreementCookieController extends Template
{
    protected $_cookieManager;
    protected $_cookieHelper;
    protected $_scopeConfig;

    public function __construct(
        Context $context,
        CookieHelper $cookieHelper,
        \Magento\Framework\Stdlib\CookieManagerInterface $cookieManager,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        array $data = []
    )
    {
        $this->_cookieManager = $cookieManager;
        $this->_cookieHelper = $cookieHelper;
        $this->_scopeConfig = $scopeConfig;
        parent::__construct($context, $data);
    }

    public function getCookie()
    {
        return($this->_cookieHelper->getCookie());
    }

    public function setCookie($value)
    {
        $this->_cookieHelper->setCookie($value);
    }

    public function getConfigInfo()
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
}