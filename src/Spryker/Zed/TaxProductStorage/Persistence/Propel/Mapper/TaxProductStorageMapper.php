<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\TaxProductStorage\Persistence\Propel\Mapper;

use Generated\Shared\Transfer\ProductAbstractCollectionTransfer;
use Generated\Shared\Transfer\ProductAbstractTransfer;
use Generated\Shared\Transfer\SynchronizationDataTransfer;
use Generated\Shared\Transfer\TaxProductStorageTransfer;
use Orm\Zed\Product\Persistence\SpyProductAbstract;
use Propel\Runtime\Collection\ObjectCollection;

class TaxProductStorageMapper
{
    /**
     * @param array<\Orm\Zed\Product\Persistence\SpyProductAbstract> $spyProductAbstracts
     *
     * @return array<\Generated\Shared\Transfer\TaxProductStorageTransfer>
     */
    public function mapSpyProductAbstractsToTaxProductStorageTransfers(array $spyProductAbstracts): array
    {
        $taxProductStorageTransfers = [];
        foreach ($spyProductAbstracts as $spyProductAbstract) {
            $taxProductStorageTransfers[] = $this->mapSpyProductAbstractToTaxProductStorageTransfer(
                $spyProductAbstract,
                new TaxProductStorageTransfer(),
            );
        }

        return $taxProductStorageTransfers;
    }

    /**
     * @param \Propel\Runtime\Collection\ObjectCollection<\Orm\Zed\Product\Persistence\SpyProductAbstract> $productAbstractEntities
     * @param \Generated\Shared\Transfer\ProductAbstractCollectionTransfer $productAbstractCollectionTransfer
     *
     * @return \Generated\Shared\Transfer\ProductAbstractCollectionTransfer
     */
    public function mapProductAbstractEntitiesToProductAbstractCollectionTransfer(
        ObjectCollection $productAbstractEntities,
        ProductAbstractCollectionTransfer $productAbstractCollectionTransfer
    ): ProductAbstractCollectionTransfer {
        foreach ($productAbstractEntities as $productAbstractEntity) {
            $productAbstractCollectionTransfer->addProductAbstract(
                (new ProductAbstractTransfer())->fromArray($productAbstractEntity->toArray(), true),
            );
        }

        return $productAbstractCollectionTransfer;
    }

    /**
     * @param array<\Orm\Zed\TaxProductStorage\Persistence\SpyTaxProductStorage> $taxProductStorageEntities
     *
     * @return array<\Generated\Shared\Transfer\SynchronizationDataTransfer>
     */
    public function mapSpyTaxProductStorageToSynchronizationDataTransfer(array $taxProductStorageEntities): array
    {
        $synchronizationDataTransfers = [];

        foreach ($taxProductStorageEntities as $taxProductStorageEntity) {
            /** @var string $data */
            $data = $taxProductStorageEntity->getData();
            $synchronizationDataTransfers[] = (new SynchronizationDataTransfer())
                ->setData($data)
                ->setKey($taxProductStorageEntity->getKey());
        }

        return $synchronizationDataTransfers;
    }

    /**
     * @param \Orm\Zed\Product\Persistence\SpyProductAbstract $spyProductAbstract
     * @param \Generated\Shared\Transfer\TaxProductStorageTransfer $taxProductStorageTransfer
     *
     * @return \Generated\Shared\Transfer\TaxProductStorageTransfer
     */
    protected function mapSpyProductAbstractToTaxProductStorageTransfer(
        SpyProductAbstract $spyProductAbstract,
        TaxProductStorageTransfer $taxProductStorageTransfer
    ): TaxProductStorageTransfer {
        return $taxProductStorageTransfer
            ->setSku($spyProductAbstract->getSku())
            ->setIdProductAbstract($spyProductAbstract->getIdProductAbstract())
            ->setIdTaxSet($spyProductAbstract->getFkTaxSet());
    }
}
