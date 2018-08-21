<?php

namespace Visma\AgreementPopup\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Stdlib\Cookie\CookieMetadataFactory;
use Magento\Framework\Stdlib\CookieManagerInterface;
use Magento\Framework\Session\SessionManagerInterface;


class CookieHelper extends AbstractHelper
{
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

    public function getCookie($cookieName)
    {
        return $this->cookieManager->getCookie($cookieName);
    }

    public function setCookie($cookieName, $value, $cookieLifeTime)
    {
        $metadata = $this->cookieMetadataFactory
            ->createPublicCookieMetadata()
            ->setDuration($cookieLifeTime)
            ->setPath($this->sessionManager->getCookiePath())
            ->setDomain($this->sessionManager->getCookieDomain());

        $this->cookieManager->setPublicCookie($cookieName, $value, $metadata);

    }

//    public function delete($cookieName)
//    {
//        $this->cookieManager->deleteCookie(
//            $cookieName,
//            $this->cookieMetadataFactory
//                ->createCookieMetadata()
//                ->setPath($this->sessionManager->getCookiePath())
//                ->setDomain($this->sessionManager->getCookieDomain())
//        );
//    }
}