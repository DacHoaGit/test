<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function list(Request $request){
        try {
            return response()->json([
                'message' => '',
                'success' => true,
                'data' => Product::all(),
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
                'success' => false,
            ]);
        }
        
    }

    public function update(Request $request, Product $product){
        try {
            $data = $request->all();

            if ($request->file('image')) {
    
                if ($product->image) {
                    $path_old = public_path('images/' . $product->image);
                    if (file_exists($path_old)) {
                        unlink($path_old);
                    }
                }
    
                $path = public_path('images/');
    
                $file_name = time() . '.' . $request->image->extension();
                $request->image->move($path, $file_name);
                $data['image'] = "$file_name";
            } 
            $product->update($data);

            return response()->json([
                'message' => '',
                'success' => true,
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
                'success' => false,
            ]);
        }
    }

    public function destroy(Product $product)
    {

        try {
            $product->delete();
            return response()->json([
                'message' => '',
                'success' => true,
            ]);
            
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
                'success' => false,
            ]);
        }

    }

}
