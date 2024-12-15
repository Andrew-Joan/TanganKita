<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Volunteer;
use App\Models\FundDonation;
use App\Models\FundTransaction;
use Yajra\DataTables\DataTables;
use App\Models\VolunteerTransaction;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $userFundDonationTransactions = FundTransaction::where('user_id', $user->id)->get();
        $amountDonated = $userFundDonationTransactions->reduce(function ($carry, $item) {
                return $carry + $item->amount;
            });
        $amountDonated = number_format($amountDonated, 0, ',', '.');

        $volunteerJoined = VolunteerTransaction::where([
                ['user_id', $user->id],
                ['status_id', 2]
            ])->count();

        $ownedFundDonations = FundDonation::with('status')->where('user_id', $user->id)->paginate(4, ['*'], 'ownedFundDonations');
        $ownedVolunteers = Volunteer::where('user_id', $user->id)->paginate(4, ['*'], 'ownedVolunteers');

        $ownedFundDonationsCount = FundDonation::where('user_id', $user->id)
            ->whereNotIn('status_id', [1, 3])
            ->count();

        $ownedVolunteersCount = Volunteer::where('user_id', $user->id)
            ->whereNotIn('status_id', [1, 3])
            ->count();

        $categories = Category::all();

        return view('profile.index', compact(
            'user',
            'amountDonated',
            'volunteerJoined',
            'ownedFundDonations',
            'ownedVolunteers',
            'ownedFundDonationsCount',
            'ownedVolunteersCount',
            'categories'
        ));
    }

    public function listDonationHistory()
    {
        if (!request()->ajax()) abort(404);

        $user = Auth::user();

        $fundDonation = FundTransaction::with('fundDonation.category')
            ->where('user_id', $user->id)
            ->latest()
            ->get();

            return DataTables::of($fundDonation)
            ->addIndexColumn()
            ->addColumn('transactionTime', function ($data) {
                return $data->created_at->format('d F Y');
            })
            ->addColumn('amount', function ($data) {
                return 'Rp. ' . number_format($data->amount, 0, ',', '.');
            })
            ->addColumn('action', function ($data) {
                return view('profile.component.fund-donation.__action', compact('data'))->render();
            })
            ->make();
    }

    public function listVolunteerHistory()
    {
        if (!request()->ajax()) abort(404);

        $user = Auth::user();

        $fundDonation = VolunteerTransaction::with('volunteer.category')
            ->where([
                ['user_id', $user->id],
                ['status_id', 2]    
            ])
            ->latest()
            ->get();

            return DataTables::of($fundDonation)
            ->addIndexColumn()
            ->addColumn('joinTime', function ($data) {
                return $data->created_at->format('d F Y');
            })
            ->addColumn('action', function ($data) {
                return view('profile.component.volunteer.__action', compact('data'))->render();
            })
            ->make();
    }
}
