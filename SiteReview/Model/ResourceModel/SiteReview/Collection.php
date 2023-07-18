<?php
declare(strict_types=1);

namespace Lendiel\SiteReview\Model\ResourceModel\SiteReview;

use Lendiel\SiteReview\Model\ResourceModel\SiteReview as SiteReviewResourceModel;
use Lendiel\SiteReview\Model\SiteReview as SiteReviewModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'site_review_collection';

    /**
     * Initialize collection model.
     */
    protected function _construct(): void
    {
        $this->_init(SiteReviewModel::class, SiteReviewResourceModel::class);
    }
}
