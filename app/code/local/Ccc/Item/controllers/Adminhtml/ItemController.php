<?php

class Ccc_Item_Adminhtml_ItemController extends Mage_Adminhtml_Controller_Action
{

    public function _initAction()
    {
        $this->loadLayout();
        $this->_setActiveMenu('item/item');
        return $this;
    }

    public function indexAction()
    {
        $this->_initAction();
        $this->_addContent($this->getLayout()->createBlock('item/adminhtml_item'));
        $this->renderLayout();
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    public function editAction()
    {
        $id = $this->getRequest()->getParam('id');
        $itemModel = Mage::getModel('item/item')->load($id);
        if ($itemModel->getId()) {
            Mage::register('item_data', $itemModel);
        }
        $this->loadLayout();
        // $block = $this->getLayout()->createBlock('item/adminhtml_item_edit')->toHtml();
        // $this->getLayout()->getBlock('content')->insert($block);
        $this->_addContent($this->getLayout()->createBlock('item/adminhtml_item_edit'));
        $this->renderLayout();
    }

    public function saveAction()
    {
        if ($this->getRequest()->getPost()) {
            try {
                $id = $this->getRequest()->getParam('id');
                $model = Mage::getModel('item/item')->load($id);
                $postData = $this->getRequest()->getPost();
                if ($model->getId()) {
                    $model->addData($postData);
                } else {
                    $model->setData($postData);
                    $model->setCreatedDate(Mage::getModel('core/date')->date('Y-m-d H:i:s'));

                    // $model->createdDate = date('Y-m-d H:i:s');
                }
                $model->save();
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('item')->__('Item Created Successfully'));
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError(Mage::helper('item')->__($e->getMessage()));
            }
        }
        $this->_redirect('*/*/');
    }

    public function deleteAction()
    {
        if ($this->getRequest()->getParam('id')) {
            try {
                $id = $this->getRequest()->getParam('id');
                $model = Mage::getModel('item/item')->load($id)->delete();
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('item')->__('Item Deleted Successfully'));
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError(Mage::helper('item')->__($e->getMessage()));
            }
        }
        $this->_redirect('*/*/');
    }
}
