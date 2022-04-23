<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Component;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function getProducts(){

        $products = Products::all();
        return response()->json($products);

    }

    public function getProduct(Request $request, string $id){

        if(Component::authenticator($request->bearerToken())){
            return SELF::productById($id);
        }
        
        return response()->json(["menssagem" => "Chave da API incorreta"]);

    }

    public static function productById($id){

        try {
            $products = Products::findOrFail($id);
            return response()->json($products);
        } catch (\Throwable $th) {
            return response()->json(["menssagem" => "Erro ao buscaro produto de Id: $id"]);
        }

    }

    public function postProduct(Request $request){

        if(Component::authenticator($request->bearerToken())){
            $input = file_get_contents('php://input');
            $jsonDecode = json_decode($input); 

            $parametros["created_at"] = date("Y-m-d");

            if(isset($jsonDecode->name) && !empty($jsonDecode->name)){
                $parametros["name"] = $jsonDecode->name;
            }else{
                return response()->json(["menssagem" => 'O campo "Nome" é obrigatório'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
            }

            if(isset($jsonDecode->description) && !empty($jsonDecode->description))
                $parametros["description"] = $jsonDecode->description;

            if(isset($jsonDecode->brand) && !empty($jsonDecode->brand))
                $parametros["brand"] = $jsonDecode->brand;

            if(isset($jsonDecode->category) && !empty($jsonDecode->category))
                $parametros["category"] = $jsonDecode->category;

            if(isset($jsonDecode->price) && !empty($jsonDecode->price))
                $parametros["price"] = $jsonDecode->price;

            if(isset($jsonDecode->color) && !empty($jsonDecode->color))
                $parametros["color"] = $jsonDecode->color;

            if(isset($jsonDecode->name) && !empty($jsonDecode->name))
                $parametros["name"] = $jsonDecode->name;
            
            $user = Products::create($parametros);

            return $user;
        }
        
        return response()->json(["menssagem" => "Chave da API incorreta"]);

    }

    public function putProduct(Request $request, string $id){

        if(Component::authenticator($request->bearerToken())){
            try {
            
                $input = file_get_contents('php://input');
                $jsonDecode = json_decode($input); 
    
                $parametros["updated_at"] = date("Y-m-d");
    
                if(isset($jsonDecode->name) && !empty($jsonDecode->name))
                    $parametros["name"] = $jsonDecode->name;
        
                if(isset($jsonDecode->description) && !empty($jsonDecode->description))
                    $parametros["description"] = $jsonDecode->description;
        
                if(isset($jsonDecode->brand) && !empty($jsonDecode->brand))
                    $parametros["brand"] = $jsonDecode->brand;
        
                if(isset($jsonDecode->category) && !empty($jsonDecode->category))
                    $parametros["category"] = $jsonDecode->category;
        
                if(isset($jsonDecode->price) && !empty($jsonDecode->price))
                    $parametros["price"] = $jsonDecode->price;
        
                if(isset($jsonDecode->color) && !empty($jsonDecode->color))
                    $parametros["color"] = $jsonDecode->color;
        
                if(isset($jsonDecode->name) && !empty($jsonDecode->name))
                    $parametros["name"] = $jsonDecode->name;
            
                Products::where('id',  $id)->update(['name' => $jsonDecode->name]);
    
                return response()->json(SELF::productById($id)->original);
    
            } catch (\Throwable $th) {
                return response()->json(["menssagem" => "Erro ao editar o produto de Id: $id"]);
            }
        }

        return response()->json(["menssagem" => "Chave da API incorreta"]);

    }

    public function deleteProduct(Request $request, string $id){

        if(Component::authenticator($request->bearerToken())){
            try {

                Products::findOrFail($id)->delete();
                return response()->json(["menssagem" => "Produto de Id: $id, Deletado com sucesso"]);
    
            } catch (\Throwable $th) {
                return response()->json(["menssagem" => "Erro ao deletar o produto de Id: $id"]);
            }
        }
        
        return response()->json(["menssagem" => "Chave da API incorreta"]);

    }
    
}
