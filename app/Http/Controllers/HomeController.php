<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Product;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.home');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function howItWorks()
    {
        return view('pages.how-it-works');
    }

    public function doctors()
    {
        return view('pages.doctors');
    }

    public function services()
    {
        return view('pages.services');
    }

    public function generalGp()
    {
        return view('pages.services.general-gp');
    }

    public function prescriptions()
    {
        return view('pages.services.prescriptions-medical');
    }

    public function cannabis()
    {
        return view('pages.services.medicinal-cannabis');
    }

    public function mentalHealth()
    {
        return view('pages.services.mental-health');
    }

    public function urgentCare()
    {
        return view('pages.services.urgent-after-hours');
    }

    public function compounding()
    {
        return view('pages.services.cannabis-compounding');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function submitContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'nullable|string|max:2000',
        ]);

        return redirect()->back()->with('success', 'Thank you for reaching out to Zymika Health. Our clinical care team will contact you shortly.');
    }

    public function submitAppointment(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'reason' => 'required|string|max:255',
            'message' => 'nullable|string|max:2000',
        ]);

        return redirect()->back()->with('success', 'Thank you! Your appointment request has been received. Our team will contact you shortly to confirm your consultation time.');
    }

    public function bookAppointment(Request $request)
    {
        try {
            $services = Service::where('is_active', true)->get();
            $doctors = Doctor::with('user')->where('is_active', true)->get();
            $selectedServiceId = $request->get('service_id', $services->first()?->id);
            $selectedDoctorId = $request->get('doctor_id', $doctors->first()?->id);
            $assessment = null;

            return view('pages.booking', compact('services', 'doctors', 'selectedServiceId', 'selectedDoctorId', 'assessment'));
        } catch (\Throwable $e) {
            return view('pages.services');
        }
    }
}
