<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\Product;

use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \Spryker\Client\Product\ProductFactory getFactory()
 */
class ProductClient extends AbstractClient implements ProductClientInterface
{

    /**
     * Specification:
     * - Read abstract product data from yves storage, based on current shop selected locale
     *
     * @api
     *
     * @param int $idProductAbstract
     *
     * @return array
     */
    public function getProductAbstractFromStorageByIdForCurrentLocale($idProductAbstract)
    {
        $locale = $this->getFactory()->getLocaleClient()->getCurrentLocale();
        $productStorage = $this->getFactory()->createProductAbstractStorage($locale);
        $product = $productStorage->getProductAbstractFromStorageById($idProductAbstract);

        return $product;
    }

    /**
     * Specification:
     * - Read abstract product data from yves storage, based on provided
     *
     * @api
     *
     * @param int $idProductAbstract
     * @param string $locale
     *
     * @return array
     */
    public function getProductAbstractFromStorageById($idProductAbstract, $locale)
    {
        $productStorage = $this->getFactory()->createProductAbstractStorage($locale);
        $product = $productStorage->getProductAbstractFromStorageById($idProductAbstract);

        return $product;
    }

    /**
     * Specification:
     * - Read concrete product data from yves storage, based on current shop selected locale
     *
     * @api
     *
     * @param int $idProductConcrete
     *
     * @return array
     */
    public function getProductConcreteByIdForCurrentLocale($idProductConcrete)
    {
        $locale = $this->getFactory()->getLocaleClient()->getCurrentLocale();
        $productConcreteStorage = $this->getFactory()->createProductConcreteStorage($locale);
        $productConcrete = $productConcreteStorage->getProductConcreteById($idProductConcrete);

        return $productConcrete;
    }

    /**
     * Specification:
     * - Read concrete product data from yves storage, based on provided locale
     *
     * @api
     *
     * @param int $idProductConcrete
     * @param string $locale
     *
     * @return array
     */
    public function getProductConcreteByIdAndLocale($idProductConcrete, $locale)
    {
        $productConcreteStorage = $this->getFactory()->createProductConcreteStorage($locale);
        $productConcrete = $productConcreteStorage->getProductConcreteById($idProductConcrete);

        return $productConcrete;
    }

    /**
     * Specification:
     * - Read attribute map from storage, based on current shop selected locale
     *
     * @api
     *
     * @param int $idProductAbstract
     *
     * @return array
     */
    public function getAttributeMapByIdProductAbstractForCurrectLocale($idProductAbstract)
    {
        $locale = $this->getFactory()->getLocaleClient()->getCurrentLocale();
        $attributeMapStorage = $this->getFactory()->createAttributeMapStorage($locale);
        $attributeMap = $attributeMapStorage->getAttributeMapByIdProductAbstract($idProductAbstract);

        return $attributeMap;
    }

    /**
     * Specification:
     * - Read attribute map from storage, based on provided
     *
     * @api
     *
     * @param int $idProductAbstract
     * @param string $locale
     *
     * @return array
     */
    public function getAttributeMapByIdAndLocale($idProductAbstract, $locale)
    {
        $attributeMapStorage = $this->getFactory()->createAttributeMapStorage($locale);
        $attributeMap = $attributeMapStorage->getAttributeMapByIdProductAbstract($idProductAbstract);

        return $attributeMap;
    }

    /**
     * Specification:
     * - Read product concrete information based on product concrete id collection
     *
     * @api
     *
     * @param array $idProductConcreteCollection
     *
     * @return array
     */
    public function getProductConcreteCollection(array $idProductConcreteCollection)
    {
        $locale = $this->getFactory()->getLocaleClient()->getCurrentLocale();
        $productStorage = $this->getFactory()->createProductConcreteStorage($locale);

        $jsonData = $productStorage->getProductConcreteCollection($idProductConcreteCollection);

        $result = [];
        foreach ($jsonData as $key => $json) {
            $result[] = json_decode($json, true); //TODO util
        }

        return $result;
    }

}
