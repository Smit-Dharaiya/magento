<?php

class Ccc_Item_Model_Item extends  Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        parent::_construct();
        $this->_init('item/item');
    }
}
