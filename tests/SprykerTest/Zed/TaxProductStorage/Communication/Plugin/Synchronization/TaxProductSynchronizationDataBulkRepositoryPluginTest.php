<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerTest\Zed\TaxProductStorage\Communication\Plugin\Synchronization;

use Codeception\Test\Unit;
use Spryker\Client\Kernel\Container;
use Spryker\Client\Queue\QueueDependencyProvider;
use Spryker\Zed\TaxProductStorage\Communication\Plugin\Synchronization\TaxProductSynchronizationDataBulkRepositoryPlugin;
use SprykerTest\Zed\TaxProductStorage\TaxProductStorageCommunicationTester;

/**
 * Auto-generated group annotations
 *
 * @group SprykerTest
 * @group Zed
 * @group TaxProductStorage
 * @group Communication
 * @group Plugin
 * @group Synchronization
 * @group TaxProductSynchronizationDataBulkRepositoryPluginTest
 * Add your own group annotations below this line
 */
class TaxProductSynchronizationDataBulkRepositoryPluginTest extends Unit
{
    /**
     * @var \SprykerTest\Zed\TaxProductStorage\TaxProductStorageCommunicationTester
     */
    protected TaxProductStorageCommunicationTester $tester;

    protected function setUp(): void
    {
        parent::setUp();

        $this->tester->setDependency(QueueDependencyProvider::QUEUE_ADAPTERS, function (Container $container) {
            return [
                $container->getLocator()->rabbitMq()->client()->createQueueAdapter(),
                $container->getLocator()->symfonyMessenger()->client()->createQueueAdapter(),
            ];
        });
    }

    public function testGetDataReturnsEmptyArrayWithInvalidIds(): void
    {
        // Act
        $synchronizationDataTransfers = (new TaxProductSynchronizationDataBulkRepositoryPlugin())->getData(
            0,
            1,
            [TaxProductStorageCommunicationTester::TEST_INVALID_ID],
        );

        // Assert
        $this->assertEmpty($synchronizationDataTransfers);
    }

    public function testGetDataReturnsDataWithoutIds(): void
    {
        // Arrange
        $this->tester->assertStorageDatabaseTableIsEmpty();
        $this->tester->haveProductAbstractTaxStorage();

        // Act
        $synchronizationDataTransfers = (new TaxProductSynchronizationDataBulkRepositoryPlugin())->getData(0, 10);

        // Assert
        $this->assertNotEmpty($synchronizationDataTransfers);
    }
}
