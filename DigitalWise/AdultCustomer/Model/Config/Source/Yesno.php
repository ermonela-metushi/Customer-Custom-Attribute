<?php 
namespace DigitalWise\AdultCustomer\Model\Config\Source;

class Yesno extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    /**
     * to option array
     *
     * @return array
     */
     public function getAllOptions()
    {
        $options[] =[
                'value' => '',
                'label' => __('-- Please Select --')
            ];
        $options[] =[
                'value' => 1,
                'label' => __('Yes')
            ];
        $options[] =[
                'value' => 0,
                'label' => __('No')
            ];
        return $options;

    }

    public function toOptionArray()
    {
        $options[] =[
                'value' => '',
                'label' => __('-- Please Select --')
            ];
        $options[] =[
                'value' => 1,
                'label' => __('Yes')
            ];
        $options[] =[
                'value' => 0,
                'label' => __('No')
            ];
       
        return $options;
    }
}