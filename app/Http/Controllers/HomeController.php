<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category; 
use App\Models\StockProduct;
use App\Http\Requests\ProductFormValidator;
use App\Http\Requests\ProductFormUpdateValidator;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function create(Request $request){
        
        $categories = Category::all();
        $data = [
            'estate' => 0,
            'category'=>$categories
        ];
        return view('formulario', ['data'=> $data]);
    }

    public function save_create(Request $request, ProductFormValidator $validator){
        if (empty($request)) {
            return back()->with('success','Datos vacios!');
        }

        Product::create([
            'nombre' => $request->input('nombre'),
            'referencia' => $request->input('referencia'),
            'precio' => $request->input('precio'),
            'peso' => $request->input('peso'),
            'categoria' => $request->input('categoria'),
            'stock' => $request->input('stock'),
            'category_id' => $request->input('categoria'),
            'created_at' => time(),
            'updated_at' => time()
        ]);


        #En este caso cuando se crea el usuario, seguido dispara el metodo create_rol cpn los datos del usuario creado
        return back()->with('success','Guardado con exito!');
    }

    public function read(){
        $products = Product::all();
        $categories = Category::select('id')->get();
        $num = count($categories);
        if($num <= 0){
            $this->init();
        }
        $data = [
            'products' => $products,
            'categories' =>  $categories
        ];
        return view('tabla', ['data' => $data]);
    }
    function init(){
        Category::create([
            'nombre' => 'Cafe',
            'created_at' => time(),
            'updated_at' => time()
        ]);
    }
    public function update($id){
        $product = Product::where('id', $id)->first();
        $categories = Category::all();

        $data = [
            'estate' => 1,
            'info'=>$product,
            'category'=>$categories
        ];
        #dd($data['info']->rol->rol_id);
        return view('formulario', ['data' => $data]);
    }

    public function save_update(Request $request, ProductFormUpdateValidator $validator){
        if ($request->input('id')) {
            $producto = Product::find($request->input('id'));
            $producto->nombre = $request->input('nombre');
            $producto->referencia = $request->input('referencia');
            $producto->precio = $request->input('precio');
            $producto->peso = $request->input('peso');
            $producto->categoria = $request->input('categoria');
            $producto->stock = $request->input('stock');
            $producto->category_id = $request->input('categoria');
            $producto->save();


            return back()->with('success','Actualizado con exito!');
        }
    }

    public function delete($id){
        $user = Product::where('id', $id)->first();
        $user->delete();
        return back()->with('success','Producto eliminado con exito!');
    }
    public function update_stock($request){
        #dd($request->id);
        $rol = StockProduct::where('product_id', $request->input('id'))->first();
        $rol->rol_id = (int)$request->input('categoria');
        $rol->save();
    }

    function comprar(){
        $products = Product::all();
        return view('buy.buy', ['data' => $products]);
    }

    function transaccion($id){
        $products = Product::where('id', $id)->first();

        if ($products->stock == 0) {
            return back()->with('success','No disponemos de stock!');
        }else{
            $products->stock = $products->stock-1;
            $products->num_ventas = $products->num_ventas+1;
            $products->save();
            
        }
        return back()->with('success','Vendido con exito!');
    }

    function category_create(){
        return view('categoria.formulario_categoria');
    }
    function category_save(Request $request){
        Category::create([
            'nombre' => $request->input('nombre'),
            'created_at' => time(),
            'updated_at' => time()
        ]);
        return back()->with('success','Categoria creada con exito!');
    }
}
