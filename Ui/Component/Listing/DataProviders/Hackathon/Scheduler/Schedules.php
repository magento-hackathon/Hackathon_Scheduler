<?php
namespace Hackathon\Scheduler\Ui\Component\Listing\DataProviders\Hackathon\Scheduler;

class Schedules extends \Magento\Ui\DataProvider\AbstractDataProvider
{    
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        \Magento\Cron\Model\ResourceModel\Schedule\CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collectionFactory->create();
    }
}
