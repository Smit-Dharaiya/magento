<?php

class Ccc_Item_Block_Adminhtml_Item extends  Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_controller = 'adminhtml_item';
        $this->_blockGroup = 'item';
        $this->_headerText = Mage::helper('item')->__('Item Manager');
        $this->_addButtonLabel = Mage::helper('item')->__('Add Item');
        parent::__construct();
    }
}
