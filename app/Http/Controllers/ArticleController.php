<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ControllerTableDistributor extends Controller
{
    public function index()
    {
        $data = Article::all();
        return view('layouts.articel', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Distributor_Name' => 'required',
            'State_region' => 'required',
            'Country' => 'required',
            'Phone' => 'required',
            'Email' => 'required|email',
        ]);

        Article::create([
            'distributor_Name' => $request->Distributor_Name,
            'state_region' => $request->State_region,
            'country' => $request->Country,
            'phone' => $request->Phone,
            'email' => $request->Email,
        ]);

        return redirect()->back()->with('success', 'Distributor berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $distributor = Article::findOrFail($id);
        return view('edit_distributor', compact('distributor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Distributor_Name' => 'required',
            'State_region' => 'required',
            'Country' => 'required',
            'Phone' => 'required',
            'Email' => 'required|email',
        ]);

        $distributor = Article::findOrFail($id);

        $distributor->update([
            'distributor_name' => $request->Distributor_Name,
            'state_region' => $request->State_region,
            'country' => $request->Country,
            'phone' => $request->Phone,
            'email' => $request->Email,
        ]);

        return redirect()->route('distributor')->with('success', 'Distributor berhasil diperbarui.');
    }
}
