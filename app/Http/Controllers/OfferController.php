<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\OfferLetter;
use Illuminate\Http\Request;

class OfferController extends Controller
{

    // VIEW PAGE
    public function companyView()
    {
        $companies = Company::orderBy('id', 'DESC')->get();
        return view('company', compact('companies'));
    }

    // ADD COMPANY
    public function addCompany(Request $request)
    {
        $request->validate([
            'c_name' => 'required',
            'c_email' => 'required|email',
            'cin_number' => 'required',
            'c_logo' => 'nullable|image',
        ]);

        $logo = null;
        if ($request->hasFile('c_logo')) {
            $logo = $request->file('c_logo')->store('company_logos', 'public');
        }

        Company::create([
            'c_name' => $request->c_name,
            'c_email' => $request->c_email,
            'cin_number' => $request->cin_number,
            'c_logo' => $logo,
            'c_website' => $request->c_website,
            'c_address' => $request->c_address,
        ]);

        return redirect()->route('company')->with('success', 'Company added successfully!');
    }

    // EDIT COMPANY
    public function editCompany(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        $request->validate([
            'c_name' => 'required',
            'c_email' => 'required|email',
            'cin_number' => 'required',
            'c_logo' => 'nullable|image',
        ]);

        $logo = $company->c_logo;
        if ($request->hasFile('c_logo')) {
            $logo = $request->file('c_logo')->store('company_logos', 'public');
        }

        $company->update([
            'c_name' => $request->c_name,
            'c_email' => $request->c_email,
            'cin_number' => $request->cin_number,
            'c_logo' => $logo,
            'c_website' => $request->c_website,
            'c_address' => $request->c_address,
        ]);

        return redirect()->route('company')->with('success', 'Company updated successfully!');
    }

    // DELETE COMPANY
    public function deleteCompany($id)
    {
        Company::findOrFail($id)->delete();
        return redirect()->route('company')->with('success', 'Company deleted successfully!');
    }



    public function addOfferView()
    {
        $companies = Company::orderBy('id', 'DESC')->get();
        return view('addoffer', compact('companies'));
    }

    // AJAX → return JSON company data
    public function getCompany($id)
    {
        $company = Company::findOrFail($id);
        return response()->json($company);
    }

    // Store Offer Letter
    public function addOfferLetterStore(Request $request)
    {
        $validated = $request->validate([
            'date' => 'nullable|date',
            'appointed_at' => 'nullable|string',
            'company_address' => 'nullable|string',
            'cin_number' => 'nullable|string',
            'primary_contact' => 'nullable|string',
            'company_email' => 'nullable|email',
            'md_contact' => 'nullable|string',
            'website' => 'nullable|string',

            'candidate_name' => 'nullable|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'adhar' => 'nullable|string',
            'position' => 'nullable|string',
            'responsibility' => 'nullable|string',

            'joining_date' => 'nullable|date',
            'job_location' => 'nullable|string',
            'working_hour' => 'nullable|string',
            'salary' => 'nullable|string',
            'payment_duration' => 'nullable|string',

            'attendence_present_in' => 'nullable|string',
            'notice_period' => 'nullable|string',
        ]);

        // Convert comma separated responsibility to JSON
        if (!empty($validated['responsibility'])) {
            $validated['responsibility'] = explode(',', $validated['responsibility']);
        }

        // Allowances
        $validated['travelling'] = $request->has('travelling');
        $validated['lunch']      = $request->has('lunch');
        $validated['tiffin']     = $request->has('tiffin');
        $validated['dinner']     = $request->has('dinner');
        $validated['lodging']    = $request->has('lodging');

        // Store Into DB
        OfferLetter::create($validated);

        return redirect()->route('dashboard')->with('success', 'Offer Letter Saved Successfully!');
    }

    public function dashboard(Request $request)
    {
        $search = $request->search;

        $offers = OfferLetter::when($search, function ($q) use ($search) {
            $q->where('candidate_name', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%")
                ->orWhere('phone', 'like', "%$search%");
        })
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return view('dashboard', compact('offers', 'search'));
    }

    public function getOfferLetter($id)
    {
        $offer = OfferLetter::findOrFail($id);
        return response()->json($offer);
    }

    public function editOfferView($id)
    {
        $companies = Company::orderBy('id', 'DESC')->get();
        $offer = OfferLetter::findOrFail($id);
        return view('editoffer', compact('offer', 'companies'));
    }


    public function editOfferLetter(Request $request, $id)
    {
        $offer = OfferLetter::findOrFail($id);

        $data = $request->all();

        if (!empty($data['responsibility'])) {
            $data['responsibility'] = explode(',', $data['responsibility']);
        }

        $data['travelling'] = $request->has('travelling');
        $data['lunch'] = $request->has('lunch');
        $data['tiffin'] = $request->has('tiffin');
        $data['dinner'] = $request->has('dinner');
        $data['lodging'] = $request->has('lodging');

        $offer->update($data);

        return redirect()->route('dashboard')->with('success', 'Offer Letter Updated!');
    }

    public function deleteOfferLetter($id)
    {
        OfferLetter::findOrFail($id)->delete();
        return redirect()->route('dashboard')->with('success', 'Offer Letter Deleted!');
    }


    public function showOfferLetterView($id)
    {
        $offer = OfferLetter::findOrFail($id);

        $company = Company::where('c_name', $offer->appointed_at)->first();

        $offer->responsibility = is_array($offer->responsibility)
            ? $offer->responsibility
            : json_decode($offer->responsibility, true);

        return view('viewoffer', compact('offer', 'company'));
    }
}
