<?php


namespace App\GraphQL\Mutations\Products;


use App\Models\Products;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class UpdateProductsMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateProducts',
        'description' => 'Updates a Products'
    ];

    public function type(): Type
    {
        return GraphQL::type('Products');
    }

    public function args(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'name' => 'id'
            ],
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
        $products = Products::findOrFail($args['id']);
        $products->fill($args);
        $products->save();

        return $products;
    }
}
