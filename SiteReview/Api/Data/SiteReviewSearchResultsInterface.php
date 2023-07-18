<?php
declare(strict_types=1);

namespace Lendiel\SiteReview\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface SiteReviewSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get site review list.
     *
     * @return \Lendiel\SiteReview\Api\Data\SiteReviewInterface[]
     */
    public function getItems();

    /**
     * Set site review list.
     *
     * @param \Lendiel\SiteReview\Api\Data\SiteReviewInterface[] $items
     * @return SiteReviewSearchResultsInterface
     */
    public function setItems(array $items);
}
