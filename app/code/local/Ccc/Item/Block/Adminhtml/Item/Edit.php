<?php

class Ccc_Item_Block_Adminhtml_Item_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
        $this->_controller = 'adminhtml_item';
        $this->_objectId = 'id';
        $this->_blockGroup = 'item';
    }

    public function getHeaderText()
    {
        if (Mage::registry('item_data') && Mage::registry('item_data')->getId()) {
            return Mage::helper('item')->__("Edit item '%s'", $this->htmlEscape(Mage::registry('item_data')->getItemName()));
        } else {
            return Mage::helper('item')->__('Add Item');
        }
    }
}
