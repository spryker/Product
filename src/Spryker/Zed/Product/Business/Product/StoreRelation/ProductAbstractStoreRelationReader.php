<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\Product\Business\Product\StoreRelation;

use Generated\Shared\Transfer\StoreRelationTransfer;
use Spryker\Zed\Product\Persistence\ProductQueryContainerInterface;

class ProductAbstractStoreRelationReader implements ProductAbstractStoreRelationReaderInterface
{
    /**
     * @var \Spryker\Zed\Product\Persistence\ProductQueryContainerInterface
     */
    protected $productQueryContainer;

    /**
     * @param \Spryker\Zed\Product\Persistence\ProductQueryContainerInterface $productQueryContainer
     */
    public function __construct(ProductQueryContainerInterface $productQueryContainer)
    {
        $this->productQueryContainer = $productQueryContainer;
    }

    /**
     * @param \Generated\Shared\Transfer\StoreRelationTransfer $storeRelationTransfer
     *
     * @return \Generated\Shared\Transfer\StoreRelationTransfer
     */
    public function getStoreRelation(StoreRelationTransfer $storeRelationTransfer)
    {
        $storeRelationTransfer->setIdStores(
            $this->getIdStores($storeRelationTransfer->getIdEntity())
        );

        return $storeRelationTransfer;
    }

    /**
     * @param int $idProductAbstract
     *
     * @return int[]
     */
    protected function getIdStores($idProductAbstract)
    {
        $productAbstractStoreCollection = $this->productQueryContainer
            ->queryProductAbstractStoreByFkProductAbstract($idProductAbstract)
            ->find();

        $idStores = [];
        foreach ($productAbstractStoreCollection as $productAbstractStoreEntity) {
            $idStores[] = $productAbstractStoreEntity->getFkStore();
        }

        return $idStores;
    }
}
