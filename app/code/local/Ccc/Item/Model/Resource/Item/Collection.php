<?php

class Ccc_Item_Model_Resource_Item_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    protected function _construct()
    {
        $this->_init('item/item');
    }
}
