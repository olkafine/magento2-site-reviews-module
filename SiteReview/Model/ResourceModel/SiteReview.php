<?php
declare(strict_types=1);

namespace Lendiel\SiteReview\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class SiteReview extends AbstractDb
{
    /**
     * Initialize resource model.
     */
    protected function _construct(): void
    {
        $this->_init('site_review', 'review_id');
        $this->_useIsObjectNew = true;
    }
}
