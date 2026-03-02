<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\TaxProductStorage;

use Spryker\Client\Kernel\AbstractFactory;
use Spryker\Client\TaxProductStorage\Dependency\Client\TaxProductStorageToStorageClientInterface;
use Spryker\Client\TaxProductStorage\Dependency\Service\TaxProductStorageToSynchronizationServiceInterface;
use Spryker\Client\TaxProductStorage\Storage\TaxProductStorageReader;
use Spryker\Client\TaxProductStorage\Storage\TaxProductStorageReaderInterface;

class TaxProductStorageFactory extends AbstractFactory
{
    public function createTaxProductStorageReader(): TaxProductStorageReaderInterface
    {
        return new TaxProductStorageReader(
            $this->getStorageClient(),
            $this->getSynchronizationService(),
        );
    }

    public function getStorageClient(): TaxProductStorageToStorageClientInterface
    {
        return $this->getProvidedDependency(TaxProductStorageDependencyProvider::CLIENT_STORAGE);
    }

    public function getSynchronizationService(): TaxProductStorageToSynchronizationServiceInterface
    {
        return $this->getProvidedDependency(TaxProductStorageDependencyProvider::SERVICE_SYNCHRONIZATION);
    }
}
