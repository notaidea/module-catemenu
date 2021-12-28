<?php

namespace Notaidea\Catemenu\Controller\Adminhtml\Catemenu;

use Magento\Backend\App\Action;

class Delete extends Action
{
    protected $model = false;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Notaidea\Catemenu\Model\Catemenu $model
    )
    {
        parent::__construct($context);

        $this->model = $model;
    }

    /*
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('RH_UiExample::index_delete');
    }
    */

    public function execute()
    {
        $id = $this->getRequest()->getParam('cat_id');

        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id) {
            try {
                $model = $this->model;
                $model->load($id);
                $model->delete();
                $this->messageManager->addSuccess(__('Record deleted successfully.'));

                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());

                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            }
        }

        $this->messageManager->addError(__('Record does not exist.'));
        return $resultRedirect->setPath('*/*/');
    }
}
