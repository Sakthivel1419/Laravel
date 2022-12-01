<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {
        if(Auth::user()->role == 2) {
            $product_data = Product::join('maps','maps.company_id', '=', 'products.company_id')
                                    ->join('companies','companies.id', '=', 'maps.company_id')
                                    ->select('products.*','companies.id as company_id','companies.name as company_name','companies.deleted_at as deleted_at')
                                    ->where('maps.user_id',Auth::user()->id)
                                    ->get();

            $max_price =  DB::table('products')
                        ->select(DB::raw('max(products.price) as max_price'))
                        ->get();

            $timestamps_x_axis = [];
            $rssi_y_axis = [];

            foreach ( $product_data as  $row) {
                $timestamps_x_axis[] = $row->name;
                $rssi_y_axis[] = $row->price;
            }
            
        } else {

            $product_data  = DB::table('products')
                        ->join('companies', 'companies.id', '=', 'products.company_id')
                        ->select('products.*','companies.id as company_id','companies.name as company_name','companies.deleted_at as deleted_at')
                        ->get();

            $max_price =  DB::table('products')
                        ->select(DB::raw('max(products.price) as max_price'))
                        ->get();
            
            $timestamps_x_axis = [];
            $rssi_y_axis = [];

                foreach ( $product_data as  $row) {
                    $timestamps_x_axis[] = $row->name;
                    $rssi_y_axis[] = $row->price;
                }
        }


        

        return view('Dashboard.dash',['product_data' => $product_data])
                    ->with('labels', $timestamps_x_axis)
                    ->with('data', $rssi_y_axis)
                    ->with('max_price',  $max_price);

    }


}