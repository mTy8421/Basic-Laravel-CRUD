<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Company;

use function PHPSTORM_META\map;

class CompanyCRUDController extends Controller
{
    //  create Index
    public function index()
    {
        $data['companies'] = Company::orderBy('id', 'desc')->paginate(5);
        return view('companies.index', $data);
    }

    // create resource
    public function create()
    {
        return view('companies.create');
    }

    // store resource
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required'
        ]);

        $company = new Company();
        $company->name = $request->name;
        $company->email = $request->email;
        $company->address = $request->address;
        $company->save();

        return redirect()->route('company.index')->with('success', 'company is success');
    }
}
