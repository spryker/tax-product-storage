<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\TaxProductStorage\Persistence;

use Orm\Zed\Product\Persistence\SpyProductAbstractQuery;
use Orm\Zed\TaxProductStorage\Persistence\SpyTaxProductStorageQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;
use Spryker\Zed\TaxProductStorage\Persistence\Propel\Mapper\TaxProductStorageMapper;
use Spryker\Zed\TaxProductStorage\TaxProductStorageDependencyProvider;

/**
 * @method \Spryker\Zed\TaxProductStorage\TaxProductStorageConfig getConfig()
 * @method \Spryker\Zed\TaxProductStorage\Persistence\TaxProductStorageEntityManagerInterface getEntityManager()
 * @method \Spryker\Zed\TaxProductStorage\Persistence\TaxProductStorageRepositoryInterface getRepository()
 */
class TaxProductStoragePersistenceFactory extends AbstractPersistenceFactory
{
    public function createTaxProductStorageQuery(): SpyTaxProductStorageQuery
    {
        return SpyTaxProductStorageQuery::create();
    }

    public function getProductAbstractQuery(): SpyProductAbstractQuery
    {
        return $this->getProvidedDependency(TaxProductStorageDependencyProvider::PROPEL_QUERY_PRODUCT_ABSTRACT);
    }

    public function createTaxProductStorageMapper(): TaxProductStorageMapper
    {
        return new TaxProductStorageMapper();
    }
}
