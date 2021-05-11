<?php

class Ccc_Item_Block_Adminhtml_Item_Edit_Form  extends Mage_Adminhtml_Block_Widget_Form
{

    protected function _prepareForm()
    {
        $form = new Varien_Data_Form(
            [
                'id' => 'edit_form',
                'action' => $this->getUrl('*/*/save', ['id' => $this->getRequest()->getParam('id')]),
                'method' => 'post'
            ]
        );

        $form->setUseContainer(true);
        $this->setForm($form);

        $fieldset = $form->addFieldset('item_form', ['legend' => Mage::helper('item')->__('Item Information')]);
        $fieldset->addField('sku', 'text', [
            'label' => Mage::helper('item')->__('SKU'),
            'name' => 'sku'
        ]);
        $fieldset->addField('item_name', 'text', [
            'label' => Mage::helper('item')->__('Item Name'),
            'name' => 'item_name'
        ]);

        if (Mage::getSingleton('adminhtml/session')->getUserData()) {
            $form->setValues(Mage::getSingleton('adminhtml/session')->getUserData());
            Mage::getSingleton('adminhtml/session')->setUserData(null);
        } elseif (Mage::registry('item_data')) {
            $form->setValues(Mage::registry('item_data')->getData());
        }
        return parent::_prepareForm();
    }
}
