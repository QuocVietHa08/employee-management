<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountryStoreRequest;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(){
        $countries = Country::all();
        return view('countries.index', compact('countries'));
    }
    public function create(){
        return view('countries.create');
    }

    public function store(CountryStoreRequest $request )
    {
        Country::create($request->validated());

        return redirect()->route('countries.index')->with('message','Country create successfully');
    }
    public function edit(Country $country){
        return view('countries.edit', compact('country'));
    }

    public function update(CountryStoreRequest $request, Country $country){
        $country->update([
            'country_code' => $request->country_code,
            'name' => $request->name,
        ]);

        return redirect()->route('countries.index')->with('message','Update country successfully');

    }

    public function destroy(Country $country){
        $country->delete();

        return redirect()->route('countries.index')->with('message','Delete country successfully');
    }
}
