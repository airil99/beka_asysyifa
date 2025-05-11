<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    // Display all packages
    public function index()
    {
        $packages = Package::all();  // Retrieve all packages from the database
        return view('manager.packages.index', compact('packages'));
    }

    // Show the form to create a new package
    public function create()
    {
        return view('manager.packages.create');
    }

    // Store a new package
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        // Create a new package in the database
        Package::create([
            'name' => $request->name,
            'type' => $request->type,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return redirect()->route('packages.index')->with('success', 'Package created successfully!');
    }

    // Show the form to edit an existing package
    public function edit($id)
    {
        $package = Package::findOrFail($id);
        return view('manager.packages.edit', compact('package'));
    }

    // Update an existing package
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        $package = Package::findOrFail($id);
        $package->update([
            'name' => $request->name,
            'type' => $request->type,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return redirect()->route('packages.index')->with('success', 'Package updated successfully!');
    }

    // Delete a package
    public function destroy($id)
    {
        $package = Package::findOrFail($id);
        $package->delete();

        return redirect()->route('packages.index')->with('success', 'Package deleted successfully!');
    }
}




