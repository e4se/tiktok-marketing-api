<?php

declare(strict_types=1);

namespace Promopult\TikTokMarketingApi\Service;

final class Pages extends \Promopult\TikTokMarketingApi\AbstractService
{
    /**
     * After an instant page is created, you can get the page ID and then use it in your lead ads or collection ads.
     *
     * @param int $advertiserId         Advertiser ID
     * @param ?string $status           Form status, optional values: EDITED, PUBLISHED
     * @param ?string $title            Instant Form title, will filter the form that **contains** the words in the
     *                                  title.
     * @param ?array $updateTimeRange   Filter for Instant Forms updated in time range.
     *                                  ['start' => (unix timestamp), 'end' => (unix timestamp)]
     * @param ?string $businessType     Instant page type，optional values:
     *                                  LEAD_GEN(InstantForm), STORE_FRONT(Storefront Page). Default: LEAD_GEN
     * @param ?int $page                Current number of pages, default: 1, range: ≥ 1
     * @param ?int $pageSize            Pagination size, default: 10, range: 1-100
     * @return array
     *
     * @throws \Throwable
     *
     * @see https://ads.tiktok.com/marketing_api/docs?id=1701890945985537
     */
    public function get(
        int $advertiserId,
        ?string $status = null,
        ?string $title = null,
        ?array $updateTimeRange = null,
        ?string $businessType = null,
        ?int $page = null,
        ?int $pageSize = null
    ): array {
        return $this->requestApi(
            'GET',
            '/open_api/v1.3/page/get/',
            [
                'advertiser_id' => $advertiserId,
                'page' => $page,
                'page_size' => $pageSize,
                'status' => $status,
                'title' => $title,
                'update_time_range' => $updateTimeRange,
                'business_type' => $businessType
            ]
        );
    }

    /**
     * Getting instant pages.
     *
     * @param int $advertiserId     # Advertiser ID
     * @param array $params     # Additional params
     * @return array
     * @throws \Throwable
     */
    public function pages(int $advertiserId, array $params): array
    {
        return $this->requestApi(
            'GET',
            '/open_api/v1.3/page/get/',
            array_merge($params, [
                'advertiser_id' => $advertiserId
            ])
        );
    }

    /**
     * Create page test lead.
     *
     * @param int $advertiserId     # Advertiser ID
     * @param int $pageId     # Page ID
     * @return array
     * @throws \Throwable
     */
    public function createMock(int $advertiserId, int $pageId): array
    {
        return $this->requestApi(
            'POST',
            '/open_api/v1.3/page/lead/mock/create/',
            [
                'advertiser_id' => (string)$advertiserId,
                'page_id' => (string)$pageId
            ]
        );
    }

    /**
     * Get page test lead.
     *
     * @param int $advertiserId     # Advertiser ID
     * @param int $pageId     # Page ID
     * @return array
     * @throws \Throwable
     */
    public function getMock(int $advertiserId, int $pageId): array
    {
        return $this->requestApi(
            'GET',
            '/open_api/v1.3/page/lead/mock/get/',
            [
                'advertiser_id' => (string)$advertiserId,
                'page_id' => (string)$pageId
            ]
        );
    }

    /**
     * Delete page test lead.
     *
     * @param int $advertiserId     # Advertiser ID
     * @param int $leadId     # Lead ID
     * @return array
     * @throws \Throwable
     */
    public function deleteMock(int $advertiserId, int $leadId): array
    {
        return $this->requestApi(
            'POST',
            '/open_api/v1.3/page/lead/mock/delete/',
            [
                'advertiser_id' => (string)$advertiserId,
                'lead_id' => (string)$leadId
            ]
        );
    }
}
