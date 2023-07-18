<?php
declare(strict_types=1);

namespace Lendiel\SiteReview\Controller\Ajax;

use Exception;
use Lendiel\SiteReview\Api\Data\SiteReviewInterfaceFactory;
use Lendiel\SiteReview\Api\SiteReviewRepositoryInterface;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Message\ManagerInterface;
use Psr\Log\LoggerInterface;

class Save implements HttpPostActionInterface
{
    /**
     * @var JsonFactory
     */
    private JsonFactory $jsonFactory;

    /**
     * @var RequestInterface
     */
    private RequestInterface $request;

    /**
     * @var SiteReviewInterfaceFactory
     */
    private SiteReviewInterfaceFactory $siteReviewFactory;

    /**
     * @var SiteReviewRepositoryInterface
     */
    private SiteReviewRepositoryInterface $siteReviewRepository;

    /**
     * @var ManagerInterface
     */
    private ManagerInterface $messageManager;

    /**
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * @param JsonFactory $jsonFactory
     * @param RequestInterface $request
     * @param SiteReviewInterfaceFactory $siteReviewFactory
     * @param SiteReviewRepositoryInterface $siteReviewRepository
     * @param ManagerInterface $messageManager
     * @param LoggerInterface $logger
     */
    public function __construct(
        JsonFactory $jsonFactory,
        RequestInterface $request,
        SiteReviewInterfaceFactory $siteReviewFactory,
        SiteReviewRepositoryInterface $siteReviewRepository,
        ManagerInterface $messageManager,
        LoggerInterface $logger,
    ) {
        $this->jsonFactory = $jsonFactory;
        $this->request = $request;
        $this->siteReviewFactory = $siteReviewFactory;
        $this->siteReviewRepository = $siteReviewRepository;
        $this->messageManager = $messageManager;
        $this->logger = $logger;
    }

    /**
     * @return ResultInterface
     */
    public function execute(): ResultInterface
    {
        $result = $this->jsonFactory->create();

        try {
            $reviewData = $this->request->getParams();
            if (!empty($reviewData)) {
                $siteReview = $this->siteReviewFactory->create();
                $siteReview->setData($reviewData);
                $this->siteReviewRepository->save($siteReview);
                $this->messageManager->addSuccessMessage(__('Your review has been successfully submitted'));
            }
        } catch (Exception $exception) {
            $result->setHttpResponseCode(404);
            $this->messageManager->addErrorMessage(__('Sorry, something went wrong. Please try again later.'));
            $this->logger->error($exception->getMessage());
        }

        return $result;
    }
}
