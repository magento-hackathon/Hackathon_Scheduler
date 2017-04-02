<?php
namespace Hackathon\Scheduler\Ui\Component\Listing\DataProviders\Cron\Job;

class Listing extends \Magento\Framework\View\Element\UiComponent\DataProvider\DataProvider
{
    /**
     * @todo Replace use of Object Manager with DI
     * @todo Handle pagination and filtering
     */
    public function getData()
    {
        $cronConfig = \Magento\Framework\App\ObjectManager::getInstance()->create('Magento\Cron\Model\Config');
        $cronJobs = $cronConfig->getJobs();
        $items = [];

        foreach ($cronJobs as $group => $jobs) {
            foreach ($jobs as $job) {
                $items[] = array_merge($job, ['group' => $group]);
            }
        }

        return [
            'totalRecords' => count($items),
            'items' => $items
        ];
    }
}
