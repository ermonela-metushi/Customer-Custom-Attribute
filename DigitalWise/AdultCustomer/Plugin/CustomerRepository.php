<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace DigitalWise\AdultCustomer\Plugin;

class CustomerRepository
{

    public function beforeSave(
        \Magento\Customer\Model\ResourceModel\CustomerRepository $subject,
        $customer,
        $passwordHash = null
    ) {
        // var_dump($customer->getDob());die;
        if ($customer->getDob()) {
            $then = strtotime($customer->getDob());

            $min = strtotime('+18 years', $then);

            if (time() < $min) {
                $customer->setCustomAttribute('is_adult',0);
            }else{
                $customer->setCustomAttribute('is_adult',1);
            }
        }

        return [$customer, $passwordHash];
    }
}