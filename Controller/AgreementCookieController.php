<?php

namespace Visma\AgreementPopup\Controller;

use Magento\Framework\View\Element\Template\Context;
use Visma\AgreementPopup\Helper\CookieHelper;
use Magento\Framework\View\Element\Template;

class AgreementCookieController extends Template
{
    protected $_cookieManager;
    protected $_cookieHelper;

    public function __construct(
        Context $context,
        CookieHelper $cookieHelper,
        \Magento\Framework\Stdlib\CookieManagerInterface $cookieManager,
        array $data = []
    )
    {
        $this->_cookieManager = $cookieManager;
        $this->_cookieHelper = $cookieHelper;
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
}