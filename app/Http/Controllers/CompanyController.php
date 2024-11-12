<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCompanyRequest;
use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $companies = Company::paginate(10);

        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddCompanyRequest $request)
    {

        $company = new Company($request->all());

        if ($request->hasFile('logo')) {
            $filename = $request->file('logo')->getClientOriginalName();
            $path = $request->file('logo')->store('logos', 'public');
            $company->logo = basename($path);
        }

        $company->save();

        return redirect()->route('companies.index')->with('success', 'Company created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $company = Company::find($id);

        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $company = Company::find($id);

        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddCompanyRequest $request, string $id)
    {
        $company = Company::find($id);
        $company->fill($request->all());

        if ($request->hasFile('logo')) {
            $filename = $request->file('logo')->getClientOriginalName();
            $path = $request->file('logo')->store('logos', 'public');
            $company->logo = basename($path);
        }

        $company->save();

        return redirect()->route('companies.index')->with('success', 'Company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Company::find($id);
        $company->delete();

        return redirect()->route('companies.index')->with('success', 'Company deleted successfully');
    }
}
