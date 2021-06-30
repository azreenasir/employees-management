<?php

namespace App\Http\Controllers\Backend;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CountryRequest;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        $countries = Country::all();
        if($request->has('search')){
            $countries = Country::where('country_code', 'like', "%{$request->search}%")->orWhere('name', 'like', "%{$request->search}%")->get();
        }
        return view('countries.index', compact('countries'));
    }

    public function create()
    {
        return view('countries.create');
    }

    public function store(CountryRequest $request)
    {
        Country::create([
            'country_code' => $request->country_code,
            'name' => $request->name
        ]);

        return redirect()->route('countries.index')->with('message', 'Country has been Added Successfully');
    }

    public function edit(Country $country)
    {
        return view('countries.edit', compact('country'));
    }

    public function update(CountryRequest $request, Country $country)
    {
        $country->update([
            'country_code' => $request->country_code,
            'name' => $request->name
        ]);

        return redirect()->route('countries.index')->with('message', 'Country has been Updated Successfully');
    }

    public function destroy(Country $country)
    {
        $country->delete();
        return redirect()->route('countries.index')->with('message', 'Country has been Deleted Successfully');
    }
}
