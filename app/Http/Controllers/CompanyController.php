<?php

namespace App\Http\Controllers;

use App\Models\Company;
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
    }
}
