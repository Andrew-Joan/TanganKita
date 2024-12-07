<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\FundDonation;
use App\Http\Requests\Donation\DonateFundRequest;
use Illuminate\Foundation\Http\FormRequest as Request;
use App\Http\Requests\FundDonation\CreateFundDonationRequest;
use App\Models\FundTransaction;

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

        $categories = Category::all();

        return view('fund-donation.index', compact(
            'allFundDonations',
            'disasterDonations',
            'educationDonations',
            'healthDonations',
            'categories'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateFundDonationRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['image'] = $request->storeImage();

        FundDonation::create($validatedData);

        return back()->with('success', 'Kampanye Donasi Uang berhasil ditambahkan, menunggu verifikasi dari admin');
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

    public function donateFund(DonateFundRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['fund_donation_id'] = $validatedData['donation_id'];
        unset($validatedData['donation_id']);

        $donation = FundDonation::find($validatedData['fund_donation_id']);
        $donation->amount += $validatedData['amount'];
        $donation->updated_at = now();
        if ($donation->amount >= $donation->target)
            $donation->status = 2;
        $donation->save();

        FundTransaction::create($validatedData);

        return back()->with('success', 'Donasi Uang sebesar Rp. ' . number_format($validatedData['amount'], 0, ',', '.') . ' berhasil dilakukan, kami berterima kasih atas bantuan yang anda berikan.');
    }
}
