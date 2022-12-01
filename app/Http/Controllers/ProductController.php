<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index() {

        if(Auth::user()->role == 2) {


            $product = Product::join('maps','maps.company_id', '=', 'products.company_id')
                            ->join('companies','companies.id', '=', 'maps.company_id')
                            ->select('products.*','companies.id as company_id','companies.name as company_name','companies.deleted_at as deleted_at')
                            ->where( 'maps.user_id',Auth::user()->id)
                            ->get();
            return view('Products.product',['product' => $product]);

        } else {
            $product = Product::join('companies','companies.id', '=', 'products.company_id')
                                ->select('products.*','companies.deleted_at as deleted_at','companies.name as company_name')
                                ->orderBy('id','asc')
                                ->get();
            $company = Company::all();
            return view('Products.product',['product' => $product,'company' => $company]);
        }
        
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required'
        ]);

        // $company = Company::all();
        $product = Product::create([
            'company_id' =>$request->input('company_id'),
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity')
        ]);

        $product->save();

        return redirect('/products');
    }

    public function edit(Request $request) {
        $data['products'] = Product::where('id',$request->id)->first();
        return $data;
    }

    public function update(Request $request) {

        $product_id = $request->id;

        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'company_id' => 'required'
        ]);
        
 
        $product = Product::find($product_id);
        $product->company_id = $request->input('company_id');
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');

        $product->update();

        // return redirect('/products');

    }

    public function delete($id) {
        $prod = Product::find($id);

        $prod->delete();

    }

    public function restore($id) {
        $prod = Product::withTrashed()->find($id);
        $prod->restore();

        return redirect('/products');
    }
}
