<?php

namespace Visma\AgreementPopup\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Stdlib\Cookie\CookieMetadataFactory;
use Magento\Framework\Stdlib\CookieManagerInterface;
use Magento\Framework\Session\SessionManagerInterface;


class CookieHelper extends AbstractHelper
{

    CONST COOKIE_NAME = 'agreement';
    CONST COOKIE_LIFE = 604800;
    protected $cookieManager;
    protected $cookieMetadataFactory;
    private $scopeConfigInterface;
    protected $sessionManager;


    public function __construct(
        ScopeConfigInterface $scopeConfigInterface,
        CookieManagerInterface $cookieManager,
        CookieMetadataFactory $cookieMetadataFactory,
        SessionManagerInterface $sessionManager
    ){
        $this->scopeConfigInterface = $scopeConfigInterface;
        $this->cookieManager = $cookieManager;
        $this->cookieMetadataFactory = $cookieMetadataFactory;
        $this->sessionManager = $sessionManager;
    }

    public function getCookie()
    {
        return $this->cookieManager->getCookie(self::COOKIE_NAME);
    }

    public function setCookie($value)
    {
        $metadata = $this->cookieMetadataFactory
            ->createPublicCookieMetadata()
            ->setDuration(self::COOKIE_LIFE)
            ->setPath($this->sessionManager->getCookiePath())
            ->setDomain($this->sessionManager->getCookieDomain());

        $this->cookieManager->setPublicCookie(self::COOKIE_NAME, $value, $metadata);

    }

    public function delete()
    {
        $this->cookieManager->deleteCookie(
            self::COOKIE_NAME,
            $this->cookieMetadataFactory
                ->createCookieMetadata()
                ->setPath($this->sessionManager->getCookiePath())
                ->setDomain($this->sessionManager->getCookieDomain())
        );
    }

    public function getCookielifetime()
    {
        return self::COOKIE_LIFE;
    }
}