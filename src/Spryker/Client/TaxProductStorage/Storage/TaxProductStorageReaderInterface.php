<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\TaxProductStorage\Storage;

use Generated\Shared\Transfer\TaxProductStorageTransfer;

interface TaxProductStorageReaderInterface
{
    public function findTaxProductStorageByProductAbstractSku(string $productAbstractSku): ?TaxProductStorageTransfer;
}
