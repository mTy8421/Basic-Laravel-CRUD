<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Company;

class CompanyCRUDController extends Controller
{
    //  create Index
    public function index(){
        $data['companies'] = Company::orderBy('id', 'desc')->paginate(5);
        return view('companies.index', $data);
    }

    // create resource
    public function create(){
        return view('companies.create');
    }

    // store resource
    
    
}
