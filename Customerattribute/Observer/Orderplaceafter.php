<?php 
namespace I95Dev\Customerattribute\Observer; 
use Magento\Framework\Event\ObserverInterface; 

class Orderplaceafter implements ObserverInterface 

{ 

   protected $customerRepository; 

  

    public function __construct( 

        \Magento\Customer\Api\CustomerRepositoryInterfaceFactory $customerRepositoryFactory)
    {         

        $this->customerRepository = $customerRepositoryFactory->create(); 

    } 

    public function execute(\Magento\Framework\Event\Observer $observer) 

    {    

      $orderdata = $observer->getEvent()->getOrder(); 

      $customerdata = $this->customerRepository->getById($ orderdata ->getData('customer_id')); 

      $value= '09/03/2022'; 

      $customerdata->setCustomAttribute('last_order_date', $value); 

    $this->customerRepository->save($customerdata);  

   } 

} 
