<?php

require_once 'Mage/Checkout/controllers/CartController.php';

class Excellence_Ajax_IndexController extends Mage_Checkout_CartController {

    

    public function deleteAction() {
        if ((int) $this->getRequest()->getParam('isAjax') == 1) {
            $id = (int) $this->getRequest()->getParam('id');
            if ($id) {
                try {
                    $this->_getCart()->removeItem($id)->save();
                    $message = $this->__('Item was removed from your shopping cart.');
                    $response['status'] = 'SUCCESS';
                    $response['message'] = $message;
                    $this->getResponse()->setBody(Mage::helper('core')->jsonEncode($response));
                    return;
                } catch (Exception $e) {
                    $response['status'] = 'ERROR';
                    $response['message'] = $this->__('Cannot remove the item from shopping cart.');
                    Mage::logException($e);
                }
            }
        } else {
            return parent::deleteAction();
        }
    }

  

}
