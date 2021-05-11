<?php

class Ccc_Item_Model_Resource_Item extends  Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('item/item', 'item_id');
    }
}
