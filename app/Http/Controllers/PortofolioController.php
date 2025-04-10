<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortofolioController extends Controller
{
    public function showPortofolio()
    {
        $portofolio = Portofolio::first();
        return view('portofolio.index', compact('portofolio'));
    }

    public function index()
    {
        $portofolios = Portofolio::all();
        return view('admin.index', compact('portofolios'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nim' => 'required|size:10',
            'birthday' => 'required|date',
            'city' => 'required',
            'study_program' => 'required',
            'email' => 'required|email',
            'resume' => 'required',
            'profile_photo' => 'image|nullable|max:1999',
        ]);

        $portofolio = new Portofolio($request->all());

        if ($request->hasFile('profile_photo')) {
            $filenameWithExt = $request->file('profile_photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('profile_photo')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('profile_photo')->storeAs('public/profile_photos', $fileNameToStore);
            $portofolio->profile_photo = $fileNameToStore;
        }

        $portofolio->save();
        return redirect()->route('portofolio.index')->with('success', 'Sukses ditambahkan');
    }

    public function edit(Portofolio $portofolio)
    {
        return view('admin.edit', compact('portofolio'));
    }

    public function update(Request $request, Portofolio $portofolio)
    {
        $request->validate([
            'name' => 'required',
            'nim' => 'required|size:10',
            'birthday' => 'required|date',
            'city' => 'required',
            'study_program' => 'required',
            'email' => 'required|email',
            'resume' => 'required',
            'profile_photo' => 'image|nullable|max:1999',
        ]);

        $portofolio->name = $request->name;
        $portofolio->nim = $request->nim;
        $portofolio->birthday = $request->birthday;
        $portofolio->city = $request->city;
        $portofolio->study_program = $request->study_program;
        $portofolio->email = $request->email;
        $portofolio->resume = $request->resume;

        if ($request->hasFile('profile_photo')) {
            if ($portofolio->profile_photo) {
                Storage::delete('public/profile_photos/' . $portofolio->profile_photo);
            }

            $filenameWithExt = $request->file('profile_photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('profile_photo')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('profile_photo')->storeAs('public/profile_photos', $fileNameToStore);
            $portofolio->profile_photo = $fileNameToStore;
        }

        $portofolio->save();
        return redirect()->route('admin.index')->with('success', 'Sukses diupdate');
    }

    public function destroy(Portofolio $portofolio)
    {
        if ($portofolio->profile_photo) {
            Storage::delete('public/profile_photos/' . $portofolio->profile_photo);
        }
        $portofolio->delete();

        return redirect()->route('admin.index')->with('success', 'Sukses dihapus');
    }

}
