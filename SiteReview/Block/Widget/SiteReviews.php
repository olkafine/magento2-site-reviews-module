<?php
declare(strict_types=1);

namespace Lendiel\SiteReview\Block\Widget;

use Exception;
use Lendiel\SiteReview\Api\SiteReviewRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;
use Psr\Log\LoggerInterface;

class SiteReviews extends Template implements BlockInterface
{
    /**
     * @var string
     */
    protected $_template = "widget/site-reviews.phtml";

    /**
     * @var SiteReviewRepositoryInterface
     */
    private SiteReviewRepositoryInterface $siteReviewRepository;

    /**
     * @var SearchCriteriaBuilder
     */
    private SearchCriteriaBuilder $searchCriteriaBuilder;

    /**
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * @param SiteReviewRepositoryInterface $siteReviewRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param LoggerInterface $logger
     * @param Template\Context $context
     * @param array $data
     */
    public function __construct(
        SiteReviewRepositoryInterface $siteReviewRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        LoggerInterface $logger,
        Template\Context $context,
        array $data = []
    ) {
        $this->siteReviewRepository = $siteReviewRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->logger = $logger;
        parent::__construct($context, $data);
    }

    /**
     * @return array
     */
    public function getSiteReviews(): array
    {
        $siteReviews = [];
        $searchCriteria = $this->searchCriteriaBuilder->create();

        try {
            $siteReviews = $this->siteReviewRepository->getList($searchCriteria)->getItems();
        } catch (Exception $exception) {
            $this->logger->error($exception->getMessage());
        }

        return $siteReviews;
    }
}
