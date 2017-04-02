<?php
namespace Hackathon\Scheduler\Controller\Adminhtml\Jobs;

class Index extends \Magento\Backend\App\Action
{
    protected $resultPageFactory = false;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        parent::__construct($context);

        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();

        $resultPage->setActiveMenu('Hackathon_Scheduler::system_cron_jobs');
        $resultPage->getConfig()->getTitle()->prepend((__('Cron Jobs')));
        $resultPage->addBreadcrumb(__('Cron Management'), __('Cron Management'));
        $resultPage->addBreadcrumb(__('Jobs'), __('Jobs'));

        return $resultPage;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Hackathon_Scheduler::jobs');
    }
}