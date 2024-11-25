<?php

namespace App\Http\Controllers;

use App\Models\FundDonation;
use Illuminate\Http\Request;

class FundDonationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allFundDonations = FundDonation::paginate(6, ['*'], 'allFundDonations');
        $disasterDonations = FundDonation::where('category_id', 1)->paginate(6, ['*'], 'disasterDonations');
        $educationDonations = FundDonation::where('category_id', 2)->paginate(6, ['*'], 'educationDonations');
        $healthDonations = FundDonation::where('category_id', 3)->paginate(6, ['*'], 'healthDonations');

        return view('fund-donation.index', compact('allFundDonations', 'disasterDonations', 'educationDonations', 'healthDonations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(FundDonation $fundDonation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FundDonation $fundDonation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FundDonation $fundDonation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FundDonation $fundDonation)
    {
        //
    }
}
