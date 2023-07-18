<?php
declare(strict_types=1);

namespace Lendiel\SiteReview\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface SiteReviewInterface extends ExtensibleDataInterface
{
    /**
     * String constants for property names
     */
    public const REVIEW_ID = "review_id";
    public const CREATED_AT = "created_at";
    public const REVIEW_TITLE = "review_title";
    public const REVIEW_TEXT = "review_text";
    public const PROS = "pros";
    public const CONS = "cons";

    /**
     * Get site review id
     *
     * @return int|null
     */
    public function getReviewId(): ?int;

    /**
     * Set site review id
     *
     * @param int|null $reviewId
     *
     * @return void
     */
    public function setReviewId(?int $reviewId): void;

    /**
     * Get site review creation time
     *
     * @return string|null
     */
    public function getCreatedAt(): ?string;

    /**
     * Set site review creation time
     *
     * @param string|null $createdAt
     *
     * @return void
     */
    public function setCreatedAt(?string $createdAt): void;

    /**
     * Get site review title
     *
     * @return string|null
     */
    public function getReviewTitle(): ?string;

    /**
     * Set site review title
     *
     * @param string|null $reviewTitle
     *
     * @return void
     */
    public function setReviewTitle(?string $reviewTitle): void;

    /**
     * Get site review text
     *
     * @return string|null
     */
    public function getReviewText(): ?string;

    /**
     * Set site review text
     *
     * @param string|null $reviewText
     *
     * @return void
     */
    public function setReviewText(?string $reviewText): void;

    /**
     * Get site review pros
     *
     * @return string|null
     */
    public function getPros(): ?string;

    /**
     * Set site review pros
     *
     * @param string|null $pros
     *
     * @return void
     */
    public function setPros(?string $pros): void;

    /**
     * Get site review cons
     *
     * @return string|null
     */
    public function getCons(): ?string;

    /**
     * Set site review cons
     *
     * @param string|null $cons
     *
     * @return void
     */
    public function setCons(?string $cons): void;

    /**
     * Retrieve existing extension attributes object.
     *
     * @return \Lendiel\SiteReview\Api\Data\SiteReviewExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     *
     * @param \Lendiel\SiteReview\Api\Data\SiteReviewExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Lendiel\SiteReview\Api\Data\SiteReviewExtensionInterface $extensionAttributes
    );
}
