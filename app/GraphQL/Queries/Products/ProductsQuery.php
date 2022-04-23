<?php


namespace App\GraphQL\Queries\Products;


use App\Models\Products;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class ProductsQuery extends Query
{
    protected $attributes = [
        'name' => 'products',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Products'));
    }

    public function resolve($root, $args)
    {
        return Products::all();
    }
}

