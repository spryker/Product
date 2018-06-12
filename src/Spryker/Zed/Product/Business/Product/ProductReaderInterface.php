<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\Product\Business\Product;

interface ProductReaderInterface
{
    /**
     * @param string $sku
     * @param null|int $limit
     *
     * @return array
     */
    public function filterProductAbstractBySku(string $sku, ?int $limit = null): array;

    /**
     * @param string $localizedName
     * @param null|int $limit
     *
     * @return array
     */
    public function filterProductAbstractByLocalizedName(string $localizedName, ?int $limit = null): array;

    /**
     * @param string $sku
     * @param null|int $limit
     *
     * @return array
     */
    public function filterProductConcreteBySku(string $sku, ?int $limit = null): array;

    /**
     * @param string $localizedName
     * @param null|int $limit
     *
     * @return array
     */
    public function filterProductConcreteByLocalizedName(string $localizedName, ?int $limit = null): array;
}