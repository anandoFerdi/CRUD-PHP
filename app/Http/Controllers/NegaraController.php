<?php

namespace App\Http\Controllers;

use App\Models\Negara;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Pagination\LengthAwarePaginatorImage;
use Illuminate\Support\Facades\Storage;

class NegaraController extends Controller
{

    public function index(Request $request)
    {
        $negara = Negara::latest()->paginate(5);

        return view('negara.index',compact('negara'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('negara.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'benua' => 'required',
            'presiden' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:6144',
        ]);
        $image = $request->file('image');
        $image->storeAs('public/negara', $image->hashName());

        Negara::create([
            'nama' => $request->nama,
            'benua' => $request->benua,
            'presiden' => $request->presiden,
            'image' => $image->hashName()
        ]);

        return redirect()->route('negara.index')
                        ->with('success','Negara created successfully.');
    }

    public function show(Negara $negara)
    {
        return view('negara.show',compact('negara'));
    }

    public function edit(Negara $negara)
    {
        return view('negara.edit',compact('negara'));
    }

    public function update(Request $request, Negara $negara)
    {
        $request->validate([
            'nama' => 'required',
            'benua' => 'required',
            'presiden' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:6144',
        ]);

        if($request->hasFile('image')){

            $image = $request->file('image');
        $image->storeAs('public/negara', $image->hashName());

        Storage::delete('public/negara/'.$negara->image);

        $negara->update([
            'image' => $image->hashName(),
            'nama' => $request->nama,
            'benua' => $request->benua,
            'presiden' => $request->presiden,
        ]);
        }else{
            $negara->update([
                'nama' => $request->nama,
                'benua' => $request->benua,
                'presiden' => $request->presiden
            ]);
        }

        return redirect()->route('negara.index')
                        ->with('success','Negara updated successfully');
    }

    public function destroy(Negara $negara)
    {
        $negara->delete();

        return redirect()->route('negara.index')
                        ->with('success','Student deleted successfully');
    }
}
