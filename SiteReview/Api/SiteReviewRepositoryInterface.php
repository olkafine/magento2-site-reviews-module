<?php
declare(strict_types=1);

namespace Lendiel\SiteReview\Api;

use Lendiel\SiteReview\Api\Data\SiteReviewInterface;
use Lendiel\SiteReview\Api\Data\SiteReviewSearchResultsInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;

interface SiteReviewRepositoryInterface
{
    /**
     * Save site review.
     *
     * @param SiteReviewInterface $review
     * @return SiteReviewInterface
     * @throws LocalizedException
     */
    public function save(SiteReviewInterface $review): SiteReviewInterface;

    /**
     * Retrieve site review by ID.
     *
     * @param int $reviewId
     * @return SiteReviewInterface
     * @throws LocalizedException
     */
    public function getById(int $reviewId): SiteReviewInterface;

    /**
     * Retrieve site reviews matching the specified criteria.
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return SiteReviewSearchResultsInterface
     * @throws LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria): SiteReviewSearchResultsInterface;

    /**
     * Delete site review.
     *
     * @param SiteReviewInterface $review
     * @return bool true on success
     * @throws LocalizedException
     */
    public function delete(SiteReviewInterface $review): bool;

    /**
     * Delete site review by ID.
     *
     * @param int $reviewId
     * @return bool true on success
     * @throws NoSuchEntityException
     * @throws LocalizedException
     */
    public function deleteById(int $reviewId): bool;
}
