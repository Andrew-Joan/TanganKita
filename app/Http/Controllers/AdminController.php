<?php

namespace App\Http\Controllers;

use App\Models\Volunteer;
use App\Models\FundDonation;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function listDonationVerification()
    {
        if (!request()->ajax()) abort(404);

        $fundDonations = FundDonation::with('user', 'category')
            ->where('status_id', 1)
            ->latest()
            ->get();

        return DataTables::of($fundDonations)
        ->addIndexColumn()
        ->addColumn('createdTime', function ($data) {
            return $data->created_at->format('d F Y');
        })
        ->addColumn('target', function ($data) {
            return 'Rp. ' . number_format($data->target, 0, ',', '.');
        })
        ->addColumn('action', function ($data) {
            return view('admin.component.action.fund-donation.__action', compact('data'))->render();
        })
        ->make();
    }

    public function listVolunteerVerification()
    {
        if (!request()->ajax()) abort(404);

        $volunteers = Volunteer::with('user', 'category')
            ->where('status_id', 1)
            ->latest()
            ->get();

        return DataTables::of($volunteers)
        ->addIndexColumn()
        ->addColumn('createdTime', function ($data) {
            return $data->created_at->format('d F Y');
        })
        ->addColumn('target', function ($data) {
            return $data->target . ' Relawan';
        })
        ->addColumn('action', function ($data) {
            return view('admin.component.action.volunteer.__action', compact('data'))->render();
        })
        ->make();
    }

    public function verifyDonation(Request $request, FundDonation $fundDonation)
    {
        $validatedData = $request->validate([
            'decision' => 'required|integer|in:4,3'
        ]);

        try {
            $message = 'menolak';

            if ($validatedData['decision'] == 4) {
                $message = 'menerima';
                $fundDonation->update([
                    'status_id' => 4,
                    'start_date' => now()
                ]);
            } else {
                $fundDonation->update([
                    'status_id' => 3,
                ]);
            }

            return back()->with('success', 'Anda berhasil ' . $message . ' proposal kampanye donasi uang ' . $fundDonation->title);
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat memproses keputusan.');
        }
    }


    public function verifyVolunteer(Request $request, Volunteer $volunteer)
    {
        $validatedData = $request->validate([
            'decision' => 'required|integer|in:4,3'
        ]);

        try {
            $message = 'menolak';

            if ($validatedData['decision'] == 4) {
                $message = 'menerima';
                $volunteer->update([
                    'status_id' => 4,
                    'start_date' => now()
                ]);
            } else {
                $volunteer->update([
                    'status_id' => 3,
                ]);
            }

            return back()->with('success', 'Anda berhasil ' . $message . ' proposal kampanye donasi uang ' . $volunteer->title);
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat memproses keputusan.');
        }
    }
}
