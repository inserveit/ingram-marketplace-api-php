<?php

namespace Inserve\IngramMarketplaceAPI\Tests;

use Inserve\IngramMarketplaceAPI\Client\APIClient;
use Inserve\IngramMarketplaceAPI\Exception\IngramMarketplaceAPIException;
use Inserve\IngramMarketplaceAPI\IngramMarketplaceAPIClient;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 *
 */
final class IngramMarketplaceAPIClientTest extends TestCase
{
    /** @psalm-suppress PropertyNotSetInConstructor */
    protected MockObject $apiClient;

    /** @psalm-suppress PropertyNotSetInConstructor */
    protected IngramMarketplaceAPIClient $ingramClient;

    /**
     * @return void
     *
     * @throws Exception
     */
    public function setUp(): void
    {
        $this->apiClient = $this->createMock(APIClient::class);
        $this->ingramClient = new IngramMarketplaceAPIClient($this->apiClient);
    }

    /**
     * @return void
     *
     * @throws IngramMarketplaceAPIException
     */
    public function testAuthenticate(): void
    {
        $this->apiClient->expects(static::once())
            ->method('call')
            ->with(
                'POST',
                'token',
                ['Authorization' => 'Basic dXNlcjpwYXNzd29yZA=='],
                '{"marketplace":"nl"}'
            )->willReturn(['token' => 'access.token']);

        $this->apiClient->expects(self::once())
            ->method('setBearerToken')
            ->with('access.token');

        self::assertSame(
            'access.token',
            $this->ingramClient->authenticate('user', 'password', '12345', 'nl')
        );
    }
}
