<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\VolunteerTransaction;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Http\FormRequest;
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
        $categories = Category::all();

        $isUserRegistered = VolunteerTransaction::where([
            ['volunteer_id', $volunteer->id],
            ['user_id', auth()->id()]
        ])->exists();

        $isUserAccepted = VolunteerTransaction::where([
            ['volunteer_id', $volunteer->id],
            ['user_id', auth()->id()],
            ['status_id', 2]
        ])->exists();

        $isUserRejected = VolunteerTransaction::where([
            ['volunteer_id', $volunteer->id],
            ['user_id', auth()->id()],
            ['status_id', 3]
        ])->exists();

        $statusRegister = null;

        if ($isUserAccepted) {
            $statusRegister = 1;
        } else if ($isUserRejected) {
            $statusRegister = 2;
        } else if ($isUserRegistered) {
            $statusRegister = 3;
        }

        return view('volunteer.show', compact('volunteer', 'categories', 'statusRegister'));
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

        return to_route('profile.index')->with('success', 'Kegiatan relawan berhasil dihapus');
    }

    public function applyVolunteer(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'volunteer_id' => 'required',
            'status_id' => 'required'
        ]);

        $volunteer = Volunteer::find($validatedData['volunteer_id']);
        $volunteer->amount += 1;
        $volunteer->updated_at = now();
        if ($volunteer->amount == $volunteer->target)
            $volunteer->status_id = 5;
        $volunteer->save();

        VolunteerTransaction::create($validatedData);

        return back()->with('success', 'Anda berhasil mendaftar untuk kegiatan relawan ini, silakan tunggu verifikasi dari pengusul kegiatan!');
    }

    public function listVolunteerApplicants(Volunteer $volunteer)
    {
        if (!request()->ajax()) abort(404);

        $volunteerApplicants = VolunteerTransaction::with('user')
            ->where([
                ['volunteer_id', $volunteer->id],
                ['status_id', 1]
            ])
            ->latest()
            ->get();

        return DataTables::of($volunteerApplicants)
            ->addIndexColumn()
            ->addColumn('createdTime', function ($data) {
                return $data->created_at->format('d F Y');
            })
            ->addColumn('birthDate', function ($data) {
                return $data->user->date_of_birth->format('d F Y');
            })
            ->addColumn('action', function ($data) {
                return view('volunteer.action.__action', compact('data'))->render();
            })
            ->make();
    }

    public function verifyApplicant(Request $request, VolunteerTransaction $volunteerTransaction)
    {
        $validatedData = $request->validate([
            'decision' => 'required|integer|in:2,3'
        ]);

        try {
            $message = 'menolak';

            if ($validatedData['decision'] == 2) {
                $message = 'menerima';
                $volunteerTransaction->update([
                    'status_id' => 2,
                    'start_date' => now()
                ]);
            } else {
                $volunteerTransaction->update([
                    'status_id' => 3,
                ]);
            }

            return back()->with('success', 'Anda berhasil ' . $message . ' relawan ' . $volunteerTransaction->user->name);
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat memproses keputusan.');
        }
    }
}
