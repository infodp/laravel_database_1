<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        //Método select
        //$products = DB::select('SELECT * FROM products'); //mostrar todos
        
        $products = DB::select('SELECT * FROM products WHERE id = ?', [2]); // forma 1 - mostrar pasando parametros
        //$products = DB::select('SELECT * FROM products WHERE id = :id', ['id' => 2]); // forma 2 - mostrar pasando parametros
         
        return response()->json(["response" => $products]);

        //como select() siempre devuelve un array, podemos recorrerlo y mostrarlo
        /* foreach ($products as $product) {
            echo $product->description."<br>" ;
        } */


        //Método scalar
        /* $products = DB::scalar("SELECT count(CASE WHEN  description = 'Mouse' THEN 1 END) AS mouses FROM products");                
        return response()->json(["result :" => $products]); */


        //Método insert
        // insertar un registro a la vez
        //DB::insert('INSERT INTO products (description, stock) VALUES (?, ?)', ["Microphone", 50]);        


        // insertar varios registros
        /* $data = [
            ['description' => "Monitor", 'stock' =>  31],
            ['description' => "Cable", 'stock' => 33],
            ['description' => "Desktop", 'stock' => 35],
        ];

        DB::table('products')->insert($data); */
                
        //Método update()
        //$product = DB::update('UPDATE products SET stock = 200 WHERE description = ?',['Desktop']);
        //return response()->json(["result: " => $product]); //devuelve la cantidad de filas afectadas

        //Método delete()
        //$product = DB::delete('DELETE FROM products WHERE id = ?',[11]);
        //return response()->json(["result: " => $product]); //devuelve la cantidad de filas afectadas

        //Método statement()
        //DB::statement('DROP TABLE prueba');

        //Método unprepared()
        //DB::unprepared('UPDATE products SET stock = 1000 WHERE description = "Monitor"');
    }
}
