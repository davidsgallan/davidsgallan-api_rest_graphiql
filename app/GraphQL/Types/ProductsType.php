<?php


namespace App\GraphQL\Types;

use App\Models\Products;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ProductsType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Products',
        'description' => 'Collection of Products',
        'model' => Products::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID of product'
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Name of the product'
            ],
            'description' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'description of the product'
            ],
            'brand' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'brand of the product'
            ],
            'category' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'category of the product'
            ],
            'price' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'price of the product'
            ],
            'color' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'color of the product'
            ],
            'created_at' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Date of the created product'
            ],
            'updated_at' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Date of updated the product'
            ],
            'products' => [
                'type' => Type::listOf(GraphQL::type('Products')),
                'description' => 'List of products'
            ]
        ];
    }
}
