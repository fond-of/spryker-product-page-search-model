<?php

namespace FondOfSpryker\Client\ProductPageSearchModel;

use Spryker\Client\Kernel\AbstractPlugin;
use Spryker\Client\Search\Model\Elasticsearch\Query\QueryBuilder;
use Spryker\Client\Search\Model\Elasticsearch\Query\QueryBuilderInterface;

class ProductPageSearchModelFactory extends AbstractPlugin
{
    /**
     * @return \Spryker\Client\Search\Model\Elasticsearch\Query\QueryBuilderInterface
     */
    public function createQueryBuilder(): QueryBuilderInterface
    {
        return new QueryBuilder();
    }
}
