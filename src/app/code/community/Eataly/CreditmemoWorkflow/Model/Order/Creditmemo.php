<?php

class Eataly_CreditmemoWorkflow_Model_Order_Creditmemo extends Mage_Sales_Model_Order_Creditmemo
{

    /**
     * Check creditmemo confirmRefund action availability
     *
     * @return bool
     */
    public function canConfirmRefund()
    {

        return $this->getState() == self::STATE_OPEN;

    }

    public function confirmRefund(){

        $this->setState(self::STATE_REFUNDED);

        Mage::dispatchEvent('sales_order_creditmemo_refund_confirmed', array($this->_eventObject=>$this));
        return $this;

    }

}
