<?php
declare(strict_types=1);

namespace Lendiel\SiteReview\Model;

use Lendiel\SiteReview\Api\Data\SiteReviewInterface;
use Lendiel\SiteReview\Model\ResourceModel\SiteReview as ResourceModel;
use Magento\Framework\Model\AbstractExtensibleModel;

class SiteReview extends AbstractExtensibleModel implements SiteReviewInterface
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'site_review';

    /**
     * {@inheritdoc}
     *
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init(ResourceModel::class);
    }

    /**
     * {@inheritdoc}
     */
    public function getReviewId(): ?int
    {
        return $this->getData(self::REVIEW_ID) === null ? null
            : (int)$this->getData(self::REVIEW_ID);
    }

    /**
     * {@inheritdoc}
     */
    public function setReviewId(?int $reviewId): void
    {
        $this->setData(self::REVIEW_ID, $reviewId);
    }

    /**
     * {@inheritdoc}
     */
    public function getCreatedAt(): ?string
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * {@inheritdoc}
     */
    public function setCreatedAt(?string $createdAt): void
    {
        $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * {@inheritdoc}
     */
    public function getReviewTitle(): ?string
    {
        return $this->getData(self::REVIEW_TITLE);
    }

    /**
     * {@inheritdoc}
     */
    public function setReviewTitle(?string $reviewTitle): void
    {
        $this->setData(self::REVIEW_TITLE, $reviewTitle);
    }

    /**
     * {@inheritdoc}
     */
    public function getReviewText(): ?string
    {
        return $this->getData(self::REVIEW_TEXT);
    }

    /**
     * {@inheritdoc}
     */
    public function setReviewText(?string $reviewText): void
    {
        $this->setData(self::REVIEW_TEXT, $reviewText);
    }

    /**
     * {@inheritdoc}
     */
    public function getPros(): ?string
    {
        return $this->getData(self::PROS);
    }

    /**
     * {@inheritdoc}
     */
    public function setPros(?string $pros): void
    {
        $this->setData(self::PROS, $pros);
    }

    /**
     * {@inheritdoc}
     */
    public function getCons(): ?string
    {
        return $this->getData(self::CONS);
    }

    /**
     * {@inheritdoc}
     */
    public function setCons(?string $cons): void
    {
        $this->setData(self::CONS, $cons);
    }

    /**
     * {@inheritdoc}
     *
     * @return \Lendiel\SiteReview\Api\Data\SiteReviewExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * {@inheritdoc}
     *
     * @param \Lendiel\SiteReview\Api\Data\SiteReviewExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Lendiel\SiteReview\Api\Data\SiteReviewExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }
}
