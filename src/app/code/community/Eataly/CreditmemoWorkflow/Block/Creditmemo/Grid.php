<?php
/**
 * Magento Enterprise Edition
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Magento Enterprise Edition End User License Agreement
 * that is bundled with this package in the file LICENSE_EE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.magento.com/license/enterprise-edition
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magento.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magento.com for more information.
 *
 * @category    Mage
 * @package     Mage_Adminhtml
 * @copyright Copyright (c) 2006-2016 X.commerce, Inc. and affiliates (http://www.magento.com)
 * @license http://www.magento.com/license/enterprise-edition
 */

/**
 * Adminhtml sales orders grid
 *
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Eataly_CreditmemoWorkflow_Block_Creditmemo_Grid extends Mage_Adminhtml_Block_Sales_Creditmemo_Grid
{

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('eataly_creditmemoworkflow/creditmemo/grid.phtml');
        $this->setId('sales_creditmemo_grid');
        $this->setDefaultSort('created_at');
        $this->setDefaultDir('DESC');
    }

    protected function _prepareCollection()
    {
        /** @var Mage_Sales_Model_Resource_Order_Creditmemo_Grid_Collection $collection */
        $collection = Mage::getResourceModel($this->_getCollectionClass());
        $collection->addExpressionFieldToSelect('refund_value',
            new Zend_Db_Expr('COALESCE(gift_cards_amount,0)+COALESCE(grand_total,0)'), array());
        $this->setCollection($collection);

        return Mage_Adminhtml_Block_Widget_Grid::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumnAfter('refund_value', array(
            'header' => Mage::helper('sales')->__('Value'),
            'index' => 'refund_value',
            'type'      => 'currency',
            'align'     => 'right',
            'currency'  => 'order_currency_code'
        ), 'state');

        return parent::_prepareColumns();
    }
}
