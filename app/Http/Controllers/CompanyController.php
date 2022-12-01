<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function index() {
        if(Auth::user()->role == 2) {
            $company = Company::join('maps','maps.company_id', '=', 'companies.id' )
                    ->where('maps.user_id',Auth::user()->id)
                    ->get();
                    // dd($company);
        }
        else {
            $company = Company::all();
        }

        return view('Company.company',['company' => $company]);

        
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'no_of_emp' => 'required'
        ]);

        $company = Company::create([
            'name' => $request->name,
            'no_of_emp' => $request->no_of_emp
        ]);
        $company->save();

        return redirect('/company');

        // $user       =       User::create($userArray);
        // if(!is_null($company)) { 
        //     return back()->with("success", "Registration completed successfully");
        // }

        // else {
        //     return back()->with("failed", "Registration failed. Try again.");
        // }
    }

    public function edit(Request $request) {
        $data['companies'] = Company::where('id',$request->id)->first();
        return $data;
    }

    public function update(Request $request) {
        $company_id = $request->id;

        $request->validate([
            'name' => 'required',
            'no_of_emp' => 'required'
        ]);
        
        $company = Company::find($company_id);
        $company->name = $request->input('name');
        $company->no_of_emp = $request->input('no_of_emp');
        $company->update();
    }

    public function delete($id) {
        $com = Company::find($id);
        // if(!empty($com)){
        //     $prod = Product::where('company_id',$id)->get();
        //     foreach($prod as $value) {
        //         $value->company_id = 0;
        //         $value->update();
        //     }

        // }
        $com->delete();
    }

    public function restore($id) {
        $com = Company::withTrashed()->find($id);
        $com->restore();

        return redirect('/company');
    }
}
