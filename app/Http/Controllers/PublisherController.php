<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index()
    {
        $publishers = Publisher::all();
        return view('publishers.index', compact('publishers'));
    }

    public function create()
    {
        return view('publishers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'publisher' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        Publisher::create([
            'publisher_name'     => $request->publisher,
            'phone' => $request->phone,
            'address'   => $request->address,
        ]);

        return redirect()->route('publishers.index')->with('success', 'Author has been created successfully.');
    }

    public function show(Publisher $publisher)
    {
        return view('show', compact('publisher'));
    }

    public function edit(Publisher $publisher)
    {
        return view('publishers.edit', compact('publisher'));
    }

    public function update(Request $request, Publisher $publisher)
    {
        $request->validate([
            'publisher' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $publisher->update([
            'publisher_name'     => $request->publisher,
            'phone' => $request->phone,
            'address'   => $request->address,
        ]);

        $publisher->fill($request->post())->save();

        return redirect()->route('publishers.index')->with('success', 'Publisher Has Been updated successfully');
    }

    public function destroy(Publisher $publisher)
    {
        $publisher->delete();
        return redirect()->route('publishers.index')->with('success', 'Publisher has been deleted successfully');
    }
}
