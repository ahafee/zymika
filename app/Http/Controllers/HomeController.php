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
        $services = Service::where('is_active', true)->get();
        $doctor = Doctor::with('user')->where('is_active', true)->first();
        $featuredProducts = Product::where('is_active', true)->take(4)->get();

        return view('pages.home', compact('services', 'doctor', 'featuredProducts'));
    }

    public function about()
    {
        $doctor = Doctor::with('user')->where('is_active', true)->first();

        return view('pages.about', compact('doctor'));
    }

    public function howItWorks()
    {
        $services = Service::where('is_active', true)->get();

        return view('pages.how-it-works', compact('services'));
    }

    public function services()
    {
        $services = Service::where('is_active', true)->get();
        $doctor = Doctor::with('user')->where('is_active', true)->first();

        return view('pages.services', compact('services', 'doctor'));
    }

    public function faqs()
    {
        return $this->contact();
    }

    public function contact()
    {
        $clinicInfo = [
            'name' => Setting::get('clinic_name', 'ZOVI LEAF / Zovi Health Pty Ltd'),
            'doctor' => Setting::get('clinic_doctor_lead', 'Dr. Suneetha Batthala'),
            'phone' => Setting::get('clinic_phone', '02 58385365'),
            'email' => Setting::get('clinic_email', 'hello@zovi.com.au'),
            'address' => Setting::get('clinic_address', 'Level 1, 63-73 Ann street Surry hills NSW 2010'),
            'hours' => Setting::get('clinic_hours', 'Mon - Fri: 8:30am - 6:00pm, Sat: 9:00am - 2:00pm'),
        ];

        return view('pages.contact', compact('clinicInfo'));
    }

    public function submitContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        return redirect()->back()->with('success', 'Thank you for reaching out to ZOVI LEAF. Our Surry Hills clinical team will contact you within 1 business day.');
    }

    public function telehealthRoom($room_code)
    {
        $appointment = Appointment::with(['patient', 'doctor.user', 'service', 'preConsultForm'])
            ->where('video_meeting_url', 'LIKE', '%'.$room_code.'%')
            ->latest()
            ->first();

        $doctor = $appointment?->doctor ?: Doctor::with('user')->first();

        return view('pages.telehealth-room', compact('room_code', 'appointment', 'doctor'));
    }
}
