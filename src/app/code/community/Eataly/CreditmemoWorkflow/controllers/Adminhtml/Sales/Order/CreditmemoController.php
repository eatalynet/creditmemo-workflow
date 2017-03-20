<?php

require_once 'Mage/Adminhtml/controllers/Sales/Order/CreditmemoController.php';
class Eataly_CreditmemoWorkflow_Adminhtml_Sales_Order_CreditmemoController extends Mage_Adminhtml_Sales_Order_CreditmemoController
{

    public function confirmRefundAction(){

        $creditmemo = $this->_initCreditmemo();
        if ($creditmemo) {
            try {
                $creditmemo->confirmRefund();
                $this->_saveCreditmemo($creditmemo);
                $this->_getSession()->addSuccess($this->__('The credit memo refund has been confirmed.'));
            } catch (Mage_Core_Exception $e) {
                $this->_getSession()->addError($e->getMessage());
            } catch (Exception $e) {
                $this->_getSession()->addError($this->__('Unable to confirm the refund.'));
            }
            $this->_redirect('*/*/view', array('creditmemo_id'=>$creditmemo->getId()));
        } else {
            $this->_forward('noRoute');
        }

    }

    public function editAction(){
        $creditmemo = $this->_initCreditmemo();
        if ($creditmemo) {
            try {
                $creditmemo->cancel();
                $this->_saveCreditmemo($creditmemo);
                $this->_getSession()->addSuccess($this->__('The credit memo has been canceled and a new one has been prepared.'));
            } catch (Mage_Core_Exception $e) {
                $this->_getSession()->addError($e->getMessage());
            } catch (Exception $e) {
                $this->_getSession()->addError($this->__('Unable to cancel the credit memo.'));
            }
            $this->_redirect('*/sales_order_creditmemo/start', array('order_id'=>$creditmemo->getOrderId()));
        } else {
            $this->_forward('noRoute');
        }
    }
}
