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
        } else {
            $product = Product::all();
            $company = Company::all();
            return view('Products.product',['product' => $product,'company' => $company]);
        }
        
        return view('Products.product',['product' => $product]);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);

        // $company = Company::all();
        $product = Product::create([
            'company_id' =>$request->input('company_id'),
            'name' => $request->input('name'),
            'price' => $request->input('price')
        ]);

        $product->save();

        return redirect('/products');
    }
}
