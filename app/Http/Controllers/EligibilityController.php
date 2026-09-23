<?php

namespace App\Http\Controllers;

use App\Models\EligibilityAssessment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EligibilityController extends Controller
{
    public function show()
    {
        return view('pages.eligibility');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'age_bracket' => 'required|string',
            'primary_conditions' => 'required|array|min:1',
            'condition_duration' => 'required|string',
            'previous_treatments' => 'nullable|array',
            'tried_standard_medications' => 'required|boolean',
            'is_pregnant_or_breastfeeding' => 'required|boolean',
            'has_psychosis_history' => 'required|boolean',
            'has_cardiovascular_issues' => 'required|boolean',
        ]);

        // Clinical assessment logic according to TGA SAS-B guidelines
        $isEligible = true;
        $rationale = [];

        if ($validated['is_pregnant_or_breastfeeding']) {
            $isEligible = false;
            $rationale[] = 'Medicinal cannabis is contraindicated during pregnancy and breastfeeding.';
        }

        if ($validated['has_psychosis_history']) {
            $isEligible = false;
            $rationale[] = 'High-THC formulations are contraindicated for patients with personal history of active psychosis or schizophrenia.';
        }

        if (! $validated['tried_standard_medications']) {
            $isEligible = false;
            $rationale[] = 'TGA guidelines require patients to have trialed conventional first-line treatments without adequate symptom relief.';
        }

        if ($validated['condition_duration'] === 'Less than 1 month') {
            $isEligible = false;
            $rationale[] = 'Medicinal cannabis in Australia is indicated for chronic conditions lasting greater than 3 months.';
        }

        if ($isEligible) {
            $rationaleText = 'Patient meets TGA guidelines for Special Access Scheme (SAS-B) / Authorised Prescriber plant-based treatments for chronic symptoms.';
        } else {
            $rationaleText = implode(' ', $rationale);
        }

        $assessment = EligibilityAssessment::create([
            'user_id' => Auth::id(),
            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'age_bracket' => $validated['age_bracket'],
            'primary_conditions' => $validated['primary_conditions'],
            'condition_duration' => $validated['condition_duration'],
            'previous_treatments' => $validated['previous_treatments'] ?? [],
            'tried_standard_medications' => $validated['tried_standard_medications'],
            'is_pregnant_or_breastfeeding' => $validated['is_pregnant_or_breastfeeding'],
            'has_psychosis_history' => $validated['has_psychosis_history'],
            'has_cardiovascular_issues' => $validated['has_cardiovascular_issues'],
            'is_eligible' => $isEligible,
            'clinical_rationale' => $rationaleText,
            'ip_address' => $request->ip(),
        ]);

        session(['assessment_id' => $assessment->id]);

        return response()->json([
            'success' => true,
            'is_eligible' => $isEligible,
            'assessment_id' => $assessment->id,
            'rationale' => $rationaleText,
            'redirect_url' => route('booking.index', ['assessment_id' => $assessment->id]),
        ]);
    }
}
