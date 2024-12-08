<?php

namespace App\Http\Controllers;

use App\Http\Requests\Volunteer\CreateVolunteerRequest;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $volunteers = Volunteer::paginate(1)->fragment('volunteerSection');
        return view('volunteer.index', compact('volunteers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateVolunteerRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['image'] = $request->storeImage();

        Volunteer::create($validatedData);

        return back()->with('success', 'Proposal Kegiatan Relawan berhasil ditambahkan, menunggu verifikasi dari admin');
    }

    /**
     * Display the specified resource.
     */
    public function show(Volunteer $volunteer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Volunteer $volunteer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Volunteer $volunteer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Volunteer $volunteer)
    {
        //
    }
}
