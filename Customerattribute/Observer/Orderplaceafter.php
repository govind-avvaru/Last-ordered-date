<?php
namespace I95dev\Customerattribute\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Customer\Model\Customer;

class Orderplaceafter implements ObserverInterface
{
  
    protected $_customerRepositoryInterface;
  

    public function __construct(\Magento\Customer\Api\CustomerRepositoryInterface $customerRepositoryInterface
    )
    {
        $this->_customerRepositoryInterface = $customerRepositoryInterface;
        
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $customer = $observer->getEvent()->getCustomer();
        $customerData = $customer->getDataModel();
        $customerData->setCustomAttribute('Last_ordered_date', (new \DateTime())->format(\Magento\Framework\Stdlib\DateTime::DATETIME_PHP_FORMAT));
        $customer->updateData($customerData);
        $customer->save();

    }
}
