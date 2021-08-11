<?php

declare(strict_types=1);

namespace Promopult\TikTokMarketingApi\Service;

final class Tools extends \Promopult\TikTokMarketingApi\AbstractService
{
    /**
     * Getting Language enumeration values.
     *
     * @param int $advertiserId     # Advertiser ID
     *
     * @return array
     *
     * @throws \Throwable
     */
    public function language(int $advertiserId): array
    {
        return $this->requestApi(
            'GET',
            '/open_api/v1.2/tools/language/',
            [
                'advertiser_id' => $advertiserId
            ]
        );
    }

    /**
     * Getting Behavior Category enumeration values.
     *
     * @param int $advertiserId     # Advertiser ID
     *
     * @return array
     *
     * @throws \Throwable
     */
    public function actionCategory(int $advertiserId): array
    {
        return $this->requestApi(
            'GET',
            '/open_api/v1.2/tools/action_category/',
            [
                'advertiser_id' => $advertiserId
            ]
        );
    }

    /**
     * Geting Carriers enumeration values.
     *
     * @param int $advertiserId     # Advertiser ID
     * @return array
     * @throws \Throwable
     */
    public function carrier(int $advertiserId): array
    {
        return $this->requestApi(
            'GET',
            '/open_api/v1.2/tools/carrier/',
            [
                'advertiser_id' => $advertiserId
            ]
        );
    }

    /**
     * Getting OS Version enumeration values.
     *
     * @param int $advertiserId     # Advertiser ID
     * @param string $osType        # OStype, optional values include: ANDROID,IOS
     * @return array
     * @throws \Throwable
     */
    public function osVersion(int $advertiserId, string $osType): array
    {
        return $this->requestApi(
            'GET',
            '/open_api/v1.2/tools/os_version/',
            [
                'advertiser_id' => $advertiserId,
                'os_type' => $osType
            ]
        );
    }

    /**
     * @param int $advertiserId     # Advertiser ID
     * @param ?int $version          # Version of interest category，optional values include:
     *                                1 (interest_category), 2 (interest_category_v2). Default: 2.
     * @param ?array $placement
     * @return array
     * @throws \Throwable
     */
    public function interestCategory(
        int $advertiserId,
        ?int $version = null,
        ?array $placement = null
    ): array {
        return $this->requestApi(
            'GET',
            '/open_api/v1.2/tools/interest_category/',
            [
                'advertiser_id' => $advertiserId,
                'version' => $version,
                'placement' => $placement
            ]
        );
    }

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
