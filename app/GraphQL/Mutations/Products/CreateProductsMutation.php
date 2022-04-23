<?php


namespace App\GraphQL\Mutations\Products;

use App\Models\Products;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CreateProductsMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createProducts',
        'description' => 'Creates a Products'
    ];

    public function type(): Type
    {
        return GraphQL::type('Products');
    }

    public function args(): array
    {
        return [
            'name' => [
                'type' => Type::string(),
                'name' => 'name'
            ],
            'description' => [
                'type' => Type::string(),
                'name' => 'description'
            ],
            'brand' => [
                'type' => Type::string(),
                'name' => 'brand'
            ],
            'category' => [
                'type' => Type::string(),
                'name' => 'category'
            ],
            'price' => [
                'type' => Type::string(),
                'name' => 'price'
            ],
            'color' => [
                'type' => Type::string(),
                'name' => 'color'
            ],
            'created_at' => [
                'type' => Type::string(),
                'name' => 'created_at'
            ],
            'updated_at' => [
                'type' => Type::string(),
                'name' => 'updated_at'
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $products = new Products();
        $products->fill($args);
        $products->save();

        return $products;
    }
}
