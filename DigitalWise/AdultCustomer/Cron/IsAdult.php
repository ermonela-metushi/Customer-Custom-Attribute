<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace DigitalWise\AdultCustomer\Cron;

class IsAdult
{

    protected $logger;

    /**
     * Constructor
     *
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(
        \Psr\Log\LoggerInterface $logger,
        \Magento\Customer\Model\ResourceModel\CustomerFactory $customerResourceFactory,
        \Magento\Customer\Model\CustomerFactory $customerFactory
    )
    {
        $this->_customerFactory = $customerFactory;
        $this->_customerResourceFactory = $customerResourceFactory;
        $this->logger = $logger;
    }

    /**
     * Execute the cron
     *
     * @return void
     */
    public function execute()
    {

        try{
            $time = strtotime("-18 years", time());
            $date = date("Y-m-d", $time);
            $customers = $this->_customerFactory->create()->getCollection()
                            ->addAttributeToSelect('*')
                            ->addAttributeToFilter("dob", ['lteq' => $date])
                            ->addAttributeToFilter("is_adult", ['neq' => '1']);
            if ($customers->count()) {
                foreach ($customers as $key => $customer) {
                    $customerModel = $this->_customerFactory->create()->load($customer->getId());
                    $customerData = $customerModel->getDataModel();
                    $customerData->setCustomAttribute('is_adult',1);
                    $customerModel->updateData($customerData);
                    $customerResource = $this->_customerResourceFactory->create();
                    $customerResource->saveAttribute($customerModel, 'is_adult');
                    $customerModel->save();
                }
            }
        }catch (\Exception $e){
            $this->logger->critical($e->getMessage());
            return false;
        }catch (\Throwable $t){
            $this->logger->critical($t->getMessage());
            return false;
        }

        $this->logger->info("Cronjob IsAdult is executed.");
    }
}
