<?php

class Eataly_CreditmemoWorkflow_Block_Order_Creditmemo_Totals extends Mage_Adminhtml_Block_Sales_Order_Creditmemo_Totals
{
    /**
     * Initialize creditmemo totals array
     *
     * @return Mage_Sales_Block_Order_Totals
     */
    protected function _initTotals()
    {
        $returnValue = parent::_initTotals();
        $this->addTotal(new Varien_Object(array(
            'code'      => 'refund_value',
            'value'     => $this->getSource()->getGrandTotal()+$this->getSource()->getGiftCardsAmount(),
            'base_value'=> $this->getSource()->getGrandTotal()+$this->getSource()->getGiftCardsAmount(),
            'label'     => $this->helper('sales')->__('(Value)'),
            'area'      => 'footer'
        )), 'grand_total');
        return $returnValue;
    }
}
