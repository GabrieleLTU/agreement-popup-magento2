<?php

namespace Visma\AgreementPopup\Model\Config\Source;

class PopupPosition implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * Return array of options as value-label pairs, eg. value => label
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            'top' => 'At the top',
            'bottom' => 'At the bottom'
        ];
    }
}