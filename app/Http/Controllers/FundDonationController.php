<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\FundDonation;
use App\Models\FundTransaction;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Donation\DonateFundRequest;
use Illuminate\Foundation\Http\FormRequest as Request;
use App\Http\Requests\FundDonation\CreateFundDonationRequest;
use App\Http\Requests\FundDonation\UpdateFundDonationRequest;

class FundDonationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        FundDonation::where('end_date', '<', now())->update(['status_id' => 5]);

        $commonRules = [
            ['status_id', 4],
            ['end_date', '>=', now()]
        ];

        $allFundDonations = FundDonation::where($commonRules)
            ->paginate(6, ['*'], 'allFundDonations')->fragment('categoryHeading');

        $disasterDonations = FundDonation::where([
                ['category_id', 1],
                ...$commonRules
            ])->paginate(6, ['*'], 'disasterDonations')->fragment('categoryHeading');

        $educationDonations = FundDonation::where([
                ['category_id', 2],
                ...$commonRules
            ])->paginate(6, ['*'], 'educationDonations')->fragment('categoryHeading');

        $healthDonations = FundDonation::where([
                ['category_id', 3],
                ...$commonRules
            ])->paginate(6, ['*'], 'healthDonations')->fragment('categoryHeading');

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

        return back()->with('success', 'Proposal Kampanye Donasi Uang berhasil ditambahkan, menunggu verifikasi dari admin');
    }

    /**
     * Display the specified resource.
     */
    public function show(FundDonation $fundDonation)
    {
        $categories = Category::all();
        return view('fund-donation.show', compact('fundDonation', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFundDonationRequest $request, FundDonation $fundDonation)
    {
        $validatedData = $request->validated();
        $validatedData['image'] = $request->storeImage();

        if (!$validatedData['image'])
            unset($validatedData['image']);
        $fundDonation->update($validatedData);

        return back()->with('success', 'Kampanye Donasi Uang berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FundDonation $fundDonation)
    {
        if ($fundDonation->image) Storage::delete($fundDonation->image);
        
        FundDonation::destroy($fundDonation->id);

        return to_route('profile.index')->with('success', 'Kegiatan donasi uang berhasil dihapus');
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
            $donation->status_id = 5;
        $donation->save();

        FundTransaction::create($validatedData);

        return back()->with('success', 'Donasi Uang sebesar Rp. ' . number_format($validatedData['amount'], 0, ',', '.') . ' berhasil dilakukan, kami berterima kasih atas bantuan yang anda berikan.');
    }
}
