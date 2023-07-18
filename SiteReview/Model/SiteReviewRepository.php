<?php
declare(strict_types=1);

namespace Lendiel\SiteReview\Model;

use Exception;
use Lendiel\SiteReview\Api\Data\SiteReviewInterface;
use Lendiel\SiteReview\Api\Data\SiteReviewInterfaceFactory as SiteReviewFactory;
use Lendiel\SiteReview\Api\Data\SiteReviewSearchResultsInterface;
use Lendiel\SiteReview\Api\Data\SiteReviewSearchResultsInterfaceFactory as SiteReviewSearchResultsFactory;
use Lendiel\SiteReview\Api\SiteReviewRepositoryInterface;
use Lendiel\SiteReview\Model\ResourceModel\SiteReview as SiteReviewResource;
use Lendiel\SiteReview\Model\ResourceModel\SiteReview\CollectionFactory as SiteReviewCollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class SiteReviewRepository implements SiteReviewRepositoryInterface
{
    /**
     * @var SiteReviewResource
     */
    private SiteReviewResource $resource;

    /**
     * @var SiteReviewFactory
     */
    private SiteReviewFactory $siteReviewFactory;

    /**
     * @var SiteReviewCollectionFactory
     */
    private SiteReviewCollectionFactory $siteReviewCollectionFactory;

    /**
     * @var CollectionProcessorInterface
     */
    private CollectionProcessorInterface $collectionProcessor;

    /**
     * @var SiteReviewSearchResultsFactory
     */
    private SiteReviewSearchResultsFactory $siteReviewSearchResultsFactory;

    /**
     * @param SiteReviewResource $resource
     * @param SiteReviewFactory $siteReviewFactory
     * @param SiteReviewCollectionFactory $siteReviewCollectionFactory
     * @param CollectionProcessorInterface $collectionProcessor
     * @param SiteReviewSearchResultsFactory $siteReviewSearchResultsFactory
     */
    public function __construct(
        SiteReviewResource $resource,
        SiteReviewFactory $siteReviewFactory,
        SiteReviewCollectionFactory $siteReviewCollectionFactory,
        CollectionProcessorInterface $collectionProcessor,
        SiteReviewSearchResultsFactory $siteReviewSearchResultsFactory
    ) {
        $this->resource = $resource;
        $this->siteReviewFactory = $siteReviewFactory;
        $this->siteReviewCollectionFactory = $siteReviewCollectionFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->siteReviewSearchResultsFactory = $siteReviewSearchResultsFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function save(SiteReviewInterface $review): SiteReviewInterface
    {
        try {
            $this->resource->save($review);
        } catch (Exception $exception) {
            throw new CouldNotSaveException(
                __('Could not save the site review: %1', $exception->getMessage()),
                $exception
            );
        }
        return $review;
    }

    /**
     * {@inheritdoc}
     */
    public function getById(int $reviewId): SiteReviewInterface
    {
        $review = $this->siteReviewFactory->create();
        $this->resource->load($review, $reviewId);
        if (!$review->getId()) {
            throw new NoSuchEntityException(__('Site review with id "%1" does not exist.', $reviewId));
        }
        return $review;
    }

    /**
     * {@inheritdoc}
     */
    public function getList(SearchCriteriaInterface $searchCriteria): SiteReviewSearchResultsInterface
    {
        $collection = $this->siteReviewCollectionFactory->create();
        $this->collectionProcessor->process($searchCriteria, $collection);

        $searchResults = $this->siteReviewSearchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(SiteReviewInterface $review): bool
    {
        try {
            $this->resource->delete($review);
        } catch (Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the site review: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById(int $reviewId): bool
    {
        return $this->delete($this->getById($reviewId));
    }
}
