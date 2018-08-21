<?php

namespace Visma\AgreementPopup\Controller;

use Magento\Framework\View\Element\Template\Context;
use Visma\AgreementPopup\Helper\CookieHelper;
use Magento\Framework\View\Element\Template;

class AgreementCookieController extends Template
{
    protected $_cookieManager;
    protected $_cookieHelper;
    CONST COOKIE_NAME = 'agreement';
    CONST COOKIE_LIFE = 604800;

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
        return($this->_cookieHelper->getCookie(self::COOKIE_NAME));
    }

    public function setCookie($value)
    {
        $this->_cookieHelper->setCookie(self::COOKIE_NAME, $value, self::COOKIE_LIFE);
    }

    public function getCookieLifetime()
    {
        return self::COOKIE_LIFE;
    }

    public function getCookieName()
    {
        return self::COOKIE_NAME;
    }
}