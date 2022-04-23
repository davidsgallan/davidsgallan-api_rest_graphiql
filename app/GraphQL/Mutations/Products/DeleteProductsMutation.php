<?php

namespace App\GraphQL\Mutations\Products;

use App\Models\Products;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;

class DeleteProductsMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteProducts',
        'description' => 'deletes a Products'
    ];

    public function type(): Type
    {
        return Type::boolean();
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
                'rules' => ['required']
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $products = Products::findOrFail($args['id']);

        return  $products->delete() ? true : false;
    }
}

