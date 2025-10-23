<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);
        
        

        $product = Product::create($data);
       

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Producto creado',
            'text' => 'El producto ha sido creado exitosamente.',
        ]);
         


        return redirect()->route('admin.products.index');
    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product->update($data);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Producto actualizado',
            'text' => 'El producto ha sido actualizado exitosamente.',
        ]);

        return redirect()->route('admin.products.edit', $product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    { 
        if ($product->inventories()->exists()) {
            session()->flash('swal', [
                'icon' => 'error',
                'title' => 'No se puede eliminar',
                'text' => 'El producto está asociado a órdenes y no puede ser eliminado.',
            ]);

            
        }
        if ($product->purchase_orders()->exists() || $product->quotes()->exists()) {
            session()->flash('swal', [
                'icon' => 'error',
                'title' => 'No se puede eliminar',
                'text' => 'El producto está asociado a órdenes y no puede ser eliminado.',
            ]);

            return redirect()->route('admin.products.index');
        }



        $product->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Producto eliminado',
            'text' => 'El producto ha sido eliminado exitosamente.',
        ]);

        return redirect()->route('admin.products.index');
    }

    public function dropzone(Request $request, Product $product)
    {
        $path = Storage::put('/images', $request->file('file'));

        $image = $product->images()->create([
            'path' =>  Storage::put('/images', $request->file('file')),
            'size' => $request->file('file')->getSize(),
            
        ]);

        return response()->json([
            'id' => $image->id,
            'path' => $image->path,
        ]);
      
    }
}