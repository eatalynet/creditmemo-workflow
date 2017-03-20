<?php

/** @var Mage_Sales_Model_Mysql4_Setup $installer */
$installer = $this;
$installer->startSetup();

$installer->addAttribute('creditmemo', 'gift_cards_amount', array('type'=>'decimal', 'grid'=>true));

$installer->endSetup();
