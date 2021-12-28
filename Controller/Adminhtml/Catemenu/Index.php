<?php

namespace Notaidea\Catemenu\Controller\Adminhtml\Catemenu;

use Magento\Backend\App\Action;

class Index extends Action
{
    protected $resultPageFactory = false;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    )
    {
        parent::__construct($context);

        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();

        $resultPage->getConfig()->getTitle()->prepend(__('huang UI Posts'));

        return $resultPage;
    }
}