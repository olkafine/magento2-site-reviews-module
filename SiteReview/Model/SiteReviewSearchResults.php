<?php
declare(strict_types=1);

namespace Lendiel\SiteReview\Model;

use Magento\Framework\Api\SearchResults;
use Lendiel\SiteReview\Api\Data\SiteReviewSearchResultsInterface;

class SiteReviewSearchResults extends SearchResults implements SiteReviewSearchResultsInterface
{
}
