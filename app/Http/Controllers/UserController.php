<?php

namespace App\Http\Controllers;

use App\Models\FundDonation;
use App\Models\FundTransaction;
use App\Models\Volunteer;
use App\Models\VolunteerTransaction;
use Illuminate\Http\Request;
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

        $ownedFundDonations = FundDonation::with('status')->where('user_id', $user->id)->get();
        $ownedVolunteers = Volunteer::where('user_id', $user->id)->get();

        return view('profile.index', compact('user', 'amountDonated', 'volunteerJoined', 'ownedFundDonations', 'ownedVolunteers'));
    }
}
