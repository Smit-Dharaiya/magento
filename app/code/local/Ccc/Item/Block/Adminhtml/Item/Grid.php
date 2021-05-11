<?php

class Ccc_Item_Block_Adminhtml_Item_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('itemGrid');
    }

    public function _prepareCollection()
    {
        $collection = Mage::getModel('item/item')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    public function _prepareColumns()
    {
        $this->addColumn('item_id', [
            'header' => Mage::helper('item')->__('Item Id'),
            'index' => 'item_id'
        ]);

        $this->addColumn('sku', [
            'header' => Mage::helper('item')->__('SKU'),
            'index' => 'sku'
        ]);

        $this->addColumn('item_name', [
            'header' => Mage::helper('item')->__('Item Name'),
            'index' => 'item_name'
        ]);

        $this->addColumn('created_date', [
            'header' => Mage::helper('item')->__('Created Date'),
            'index' => 'created_date'
        ]);

        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', ['id' => $row->getId()]);
    }
}
