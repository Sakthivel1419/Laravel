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
                            ->where( 'maps.user_id',Auth::user()->id)
                            ->get();
            return view('Products.product',['product' => $product]);

        } else {
            $product = Product::all();
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

    public function update(Request $request,$id) {

        // $request->validate([
        //     'name' => 'required',
        //     'price' => 'required',
        //     'quantity' => 'required',
        //     'company_id' => 'required'
        // ]);
        // $company = Company::all();
        // $company->name = $request->name;
        // $company->save();

        // $product_id = $request->id;
        // dd($product_id);
 
        $product = Product::find($id);
        // dd($request);
        $product->company_id = $request->company_id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;

        $product->update();

        return redirect('/products');

    }
}
