<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function index()
    {
        $districts = District::all();
        return view('pages.districts.index', compact('districts'));
    }

    public function create()
    {
        return view('pages.districts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255'
        ]);

        District::create($request->all());
        if(auth()->user()->role == 1)
        {
            return redirect()->route('admin.districts.index')->with('success', 'District created successfully');
        }
        else
        {
            return redirect()->route('system.districts.index')->with('success', 'District created successfully');
        }
    }

    public function show($id)
    {
        $district = District::findOrFail($id);
        return view('pages.districts.show', compact('district'));
    }

    public function edit($id)
    {
        $district = District::findOrFail($id);
        return view('pages.districts.edit', compact('district'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255'
        ]);

        $district = District::findOrFail($id);
        $district->update($request->all());
        if(auth()->user()->role == 1)
        {
            return redirect()->route('admin.districts.index')->with('success', 'District updated successfully');
        }
        else
        {
            return redirect()->route('system.districts.index')->with('success', 'District updated successfully');
        }
    }

    public function destroy($id)
    {
        $district = District::findOrFail($id);
        $district->delete();
        if(auth()->user()->role == 1)
        {
            return redirect()->route('admin.districts.index')->with('success', 'District deleted successfully');
        }
        else
        {
            return redirect()->route('system.districts.index')->with('success', 'District deleted successfully');
        }
    }
}
