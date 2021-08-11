<?php

declare(strict_types=1);

namespace Promopult\TikTokMarketingApi\Service;

final class Pages extends \Promopult\TikTokMarketingApi\AbstractService
{

    /**
     * Getting instant pages.
     *
     * @param int $advertiserId     # Advertiser ID
     * @param int $params     # Additional params
     * @return array
     * @throws \Throwable
     */
    public function pages(int $advertiserId, array $params): array
    {
        return $this->requestApi(
            'GET',
            '/open_api/v1.2/pages/get/',
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
            '/open_api/v1.2/pages/leads/mock/create/',
            [
                'advertiser_id' => $advertiserId,
                'page_id' => $pageId
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
            '/open_api/v1.2/pages/leads/mock/get/',
            [
                'advertiser_id' => $advertiserId,
                'page_id' => $pageId
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
            '/open_api/v1.2/pages/leads/mock/delete/',
            [
                'advertiser_id' => $advertiserId,
                'lead_id' => $leadId
            ]
        );
    }
}
