<?php

namespace FondOfSpryker\Zed\ProductAttributeExpander\Communication\Plugin\PageDataExpander;

use Generated\Shared\Transfer\ProductPageSearchTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\ProductPageSearch\Dependency\Plugin\ProductPageDataExpanderInterface;

class ProductAttributePageDataExpanderPlugin extends AbstractPlugin implements ProductPageDataExpanderInterface
{
    /**
     * @api
     *
     * @param array $productData
     * @param \Generated\Shared\Transfer\ProductPageSearchTransfer $productAbstractPageSearchTransfer
     *
     * @return void
     */
    public function expandProductPageData(array $productData, ProductPageSearchTransfer $productAbstractPageSearchTransfer)
    {
        $attributes = json_decode($productData['attributes'], true);
        $superAttributes = json_decode($productData['SpyProductAbstract']['attributes'], true);

        $productAbstractPageSearchTransfer->setAttributes(array_merge($attributes, $superAttributes));
    }
}
