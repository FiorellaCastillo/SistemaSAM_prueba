<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = new Company;
        return view('companies.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'legal_company_id' => 'required',
            'string',
            'max:100',
            'logo' => 'required',
            'company_name' => 'required',
            'string',
            'max:50',
            'company_email' => 'required',
            'string',
            'email',
            'max:255',
            'unique:companies'

        ]);
        $company = new Company();

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $destinationPath = 'images/logos/';
            $fillename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('logo')->move($destinationPath, $fillename);
            $company->logo = $destinationPath . $fillename;
        }



        $company->legal_company_id = $request->legal_company_id;

        $company->company_name = $request->company_name;
        $company->company_email = $request->company_email;
        $company->save();

        return redirect()->route('companies.index', $company)->with('create_company', 'La empresa se creó correctamente!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {

        //$companies = Company::all();
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
       
        $company->legal_company_id = $request->legal_company_id;
        $company->company_name = $request->company_name;
        $company->company_email = $request->company_email;


        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $destinationPath = 'images/logos/';
            $fillename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('logo')->move($destinationPath, $fillename);
            $company->logo = $destinationPath . $fillename;
        }

        $company->save();
        return redirect()->route('companies.index', $company)->with('update_company', 'La empresa se ha actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index', $company)->with('delete_company', 'La empresa se ha eliminado correctamente!');
    }
}