<?php

class Eataly_CreditmemoWorkflow_Block_Order_Creditmemo_View extends Mage_Adminhtml_Block_Sales_Order_Creditmemo_View
{

    /**
     * Add & remove control buttons
     *
     */
    public function __construct()
    {

        parent::__construct();

        if ($this->getCreditmemo()->canConfirmRefund()) {
            $this->_addButton('confirm_refund', array(
                'label'     => Mage::helper('eataly_creditmemoworkflow')->__('Confirm refund'),
                'class'     => 'save',
                'onclick'   => 'setLocation(\''.$this->getConfirmRefundUrl().'\')'
                )
            );
        }

        if ($this->getCreditmemo()->canCancel()) {
            $this->_addButton('edit', array(
                    'label'     => Mage::helper('sales')->__('Edit'),
                    'class'     => '',
                    'onclick'   => 'setLocation(\''.$this->getEditUrl().'\')'
                )
            );
        }
    }

    /**
     * Retrieve confirm refund url
     *
     * @return string
     */
    public function getConfirmRefundUrl()
    {
        return $this->getUrl('*/*/confirmRefund', array('creditmemo_id'=>$this->getCreditmemo()->getId()));
    }

    /**
     * Retrieve edit creditmemo url
     *
     * @return string
     */
    public function getEditUrl()
    {
        return $this->getUrl('*/*/edit', array('creditmemo_id'=>$this->getCreditmemo()->getId()));
    }
}
