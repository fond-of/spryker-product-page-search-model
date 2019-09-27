<?php

namespace FondOfSpryker\Zed\ProductPageSearchModel\Communication\Plugin\PageDataExpander;

use FondOfSpryker\Shared\ProductPageSearchModel\ProductPageSearchModelConstants;
use Generated\Shared\Search\PageIndexMap;
use Generated\Shared\Transfer\ProductPageSearchTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\ProductPageSearch\Dependency\Plugin\ProductPageDataExpanderInterface;

class ModelDataExpanderPlugin extends AbstractPlugin implements ProductPageDataExpanderInterface
{
    public const PLUGIN_NAME = 'ModelDataExpanderPlugin';

    /**
     * @param array $productData
     * @param \Generated\Shared\Transfer\ProductPageSearchTransfer $productAbstractPageSearchTransfer
     *
     * @return void
     */
    public function expandProductPageData(array $productData, ProductPageSearchTransfer $productAbstractPageSearchTransfer): void
    {
        if (!array_key_exists(ProductPageSearchModelConstants::ATTRIBUTES, $productData)) {
            return;
        }

        $attributesData = \json_decode($productData[ProductPageSearchModelConstants::ATTRIBUTES], true);

        if (!array_key_exists(PageIndexMap::MODEL, $attributesData)) {
            return;
        }

        if (!method_exists($productAbstractPageSearchTransfer, 'setModel')) {
            return;
        }

        $productAbstractPageSearchTransfer->setModel($attributesData[PageIndexMap::MODEL]);
    }
}
