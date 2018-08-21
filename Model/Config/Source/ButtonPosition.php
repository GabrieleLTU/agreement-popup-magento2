<?php
/**
 * Created by PhpStorm.
 * User: gabriele
 * Date: 8/21/18
 * Time: 11:17 AM
 */

namespace Visma\AgreementPopup\Model\Config\Source;


class ButtonPosition
{
    /**
     * Return array of options as value-label pairs, eg. value => label
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            'right' => 'On the right',
            'left' => 'On the left'
        ];
    }
}