<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * display all barang data
     */
    public function index()
    {
        // get all barang data
        $barangs = Barang::latest()->paginate(7);

        // render view
        return view('barangs.index',compact('barangs'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('barangs.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'condition' => 'required',
        ]);

        Barang::create($request->all());

        return redirect()->route('barangs.index')->with('success','Product created successfully.');
    }
    public function show(Barang $barang)
    {
        return view('barangs.show',compact('barang'));
    }
    public function edit(Barang $barang)
    {
        return view('barangs.edit',compact('barang'));
    }
    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'condition' => 'required',
        ]);

        $barang->update($request->all());

        return redirect()->route('barangs.index')->with('success','Product updated successfully');
    }
    public function destroy(Barang $barang)
    {
        $barang->delete();

        return redirect()->route('barangs.index')->with('success','Product deleted successfully');
    }
}


