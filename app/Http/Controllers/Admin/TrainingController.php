<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Training;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $trainings = Training::when($request->filled('title'), fn ($query) => $query->whereTitle($request->title, true))
            ->latest('started_at')->paginate(10);

        return view('dashboard.training.index', compact('trainings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.training.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datas = $request->validate([
            'title' => 'required',
            'started_at' => 'required|date_format:d-m-Y',
        ]);

        Training::create($datas);

        return to_route('training.index')->with('success', 'Pelatihan berhasilar ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Training $training)
    {
        return view('dashboard.training.edit', compact('training'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Training $training)
    {
        $datas = $request->validate([
            'title' => 'required',
            'started_at' => 'required|date_format:d-m-Y',
        ]);

        $training->update($datas);

        return to_route('training.index')->with('success', 'Pelatihan berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Training $training)
    {
        $training->delete();

        return to_route('training.index')->with('success', 'Pelatihan berhasil di hapus');
    }
}
