# Mage2 Module DigitalWise AdultCustomer

## Main Functionalities
AdultCustomer

### Type 1: Zip file

 - Unzip the zip file in `app/code/DigitalWise`
 - Enable the module by running `php bin/magento module:enable DigitalWise_AdultCustomer`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

## Specifications

 - Console Command
	- IsAdult

 - Cronjob
	- digitalwise_adultcustomer_isadult

 - Plugin
	- beforeSave - Magento\Customer\Model\ResourceModel\CustomerRepository > DigitalWise\AdultCustomer\Plugin\Magento\Customer\Model\ResourceModel\CustomerRepository


## Attributes
 - Customer - is_adult (is_adult)
