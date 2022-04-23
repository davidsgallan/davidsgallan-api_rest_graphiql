<?php

return [

    'schemas' => [
        'default' => [
            'query' => [
               
                'product' => \App\GraphQL\Queries\Products\ProductQuery::class,
                'products' => \App\GraphQL\Queries\Products\ProductsQuery::class,
            ],
            'mutation' => [
                'createProducts' => \App\GraphQL\Mutations\Products\CreateProductsMutation::class,
                'updateProducts' => \App\GraphQL\Mutations\Products\UpdateProductsMutation::class,
                'deleteProducts' => \App\GraphQL\Mutations\Products\DeleteProductsMutation::class,
            ],
            'middleware' => [],
            'method' => ['get', 'post'],
        ],
    ],

    'types' => [
       'Products' => \App\GraphQL\Types\ProductsType::class,
    ],

];