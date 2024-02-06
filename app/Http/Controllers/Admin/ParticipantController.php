<?php

namespace App\Http\Controllers\Admin;

use App\Models\Training;
use App\Models\Participant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ParticipantRequest;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $trainings = Training::all();
        $participants = Participant::when($request->filled('nama'), fn ($query) => $query->whereName($request->nama, true))
            ->when($request->filled('pelatihan'), fn ($query) => $query->whereTraining($request->pelatihan))
            ->with('training')
            ->paginate(1);

        return view('dashboard.participant.index', compact('participants', 'trainings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $trainings = Training::all();

        return view('dashboard.participant.create', compact('trainings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ParticipantRequest $request)
    {
        $datas = $request->validated();

        $participant = Participant::create($datas);
        $participant->certificate()->create(['type' => $datas['type']]);

        return to_route('participant.index')->with('success', 'Sukses menambah peserta baru');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Participant $participant)
    {
        $participant->load('certificate');
        $trainings = Training::all();

        return view('dashboard.participant.edit', compact('participant', 'trainings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ParticipantRequest $request, Participant $participant)
    {
        $datas = $request->validated();

        $participant->update($datas);
        $participant->certificate()->update(['type' => $datas['type']]);

        return to_route('participant.index')->with('success', 'Sukses mengedit peserta');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Participant $participant)
    {
        $participant->delete();

        return to_route('participant.index')->with('success', 'Sukses menghapus peserta');
    }
}
