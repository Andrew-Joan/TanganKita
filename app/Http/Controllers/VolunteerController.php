<?php

namespace App\Http\Controllers;

use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Volunteer\CreateVolunteerRequest;
use App\Http\Requests\Volunteer\UpdateVolunteerRequest;

class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Volunteer::where('end_date', '<', now())->update(['status_id' => 5]);

        $volunteers = Volunteer::where([
                ['status_id', 4],
                ['end_date', '>=', now()]
            ])
            ->paginate(3)
            ->fragment('volunteerSection');

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
     * Update the specified resource in storage.
     */
    public function update(UpdateVolunteerRequest $request, Volunteer $volunteer)
    {
        $validatedData = $request->validated();
        $validatedData['image'] = $request->storeImage();

        if (!$validatedData['image'])
            unset($validatedData['image']);
        $volunteer->update($validatedData);

        return back()->with('success', 'Kegiatan relawan berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Volunteer $volunteer)
    {
        if ($volunteer->image) Storage::delete($volunteer->image);
        
        Volunteer::destroy($volunteer->id);

        return back()->with('success', 'Kegiatan relawan berhasil dihapus');
    }
}
