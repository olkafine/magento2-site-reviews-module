<?php
declare(strict_types=1);

namespace Lendiel\SiteReview\Controller\Index;

use Magento\Authorization\Model\UserContextInterface;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\Router\Base;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;

class Index implements ActionInterface
{
    /**
     * @var UserContextInterface
     */
    private UserContextInterface $userContext;

    /**
     * @var ResultFactory
     */
    private ResultFactory $resultFactory;

    /**
     * @param UserContextInterface $userContext
     * @param ResultFactory $resultFactory
     */
    public function __construct(
        UserContextInterface $userContext,
        ResultFactory $resultFactory
    ) {
        $this->userContext = $userContext;
        $this->resultFactory = $resultFactory;
    }

    /**
     * @return ResultInterface
     */
    public function execute(): ResultInterface
    {
        if (
            $this->userContext->getUserType() == UserContextInterface::USER_TYPE_CUSTOMER
            && $this->userContext->getUserId()
        ) {
            return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        } else {
            return $this->resultFactory->create(ResultFactory::TYPE_FORWARD)->forward(Base::NO_ROUTE);
        }
    }
}
