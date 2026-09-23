<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\DoctorAvailability;
use App\Models\EligibilityAssessment;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PreConsultForm;
use App\Models\Prescription;
use App\Models\Product;
use App\Models\Service;
use App\Models\Setting;
use App\Models\SyncLog;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Settings
        Setting::set('clinic_name', 'ZOVI LEAF / Zovi Health Pty Ltd', 'general');
        Setting::set('clinic_doctor_lead', 'Dr. Suneetha Batthala', 'general');
        Setting::set('clinic_phone', '02 58385365', 'general');
        Setting::set('clinic_email', 'care@zovihealth.com.au', 'general');
        Setting::set('clinic_address', 'Level 1, 63-73 Ann street, Surry Hills NSW 2010', 'general');
        Setting::set('clinic_hours', 'Monday - Friday: 8:30 AM - 6:00 PM | Saturday: 9:00 AM - 2:00 PM', 'general');
        Setting::set('primary_color', '#D16646', 'general');
        Setting::set('contrast_color', '#3D4130', 'general');
        Setting::set('medirecords_sandbox', '1', 'medirecords', 'boolean');
        Setting::set('medirecords_client_id', 'zovi_mr_live_client_8385365', 'medirecords');
        Setting::set('medirecords_client_secret', 'zovi_mr_secret_leaf_992147', 'medirecords');
        Setting::set('snapforms_form_id', 'snap_zovi_preconsult_2026', 'snapforms');

        // 2. Admin User
        $admin = User::create([
            'name' => 'Admin Manager',
            'email' => 'admin@zovihealth.com.au',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'phone' => '02 58385365',
            'city' => 'Surry Hills',
            'state' => 'NSW',
            'postcode' => '2010',
            'address_line1' => 'Level 1, 63-73 Ann street',
        ]);

        // 3. Doctor User (Dr. Suneetha Batthala)
        $doctorUser = User::create([
            'name' => 'Dr. Suneetha Batthala',
            'email' => 'dr.batthala@zovihealth.com.au',
            'password' => Hash::make('password'),
            'role' => 'doctor',
            'phone' => '02 58385365',
            'city' => 'Surry Hills',
            'state' => 'NSW',
            'postcode' => '2010',
            'address_line1' => 'Level 1, 63-73 Ann street',
            'medirecords_patient_id' => 'MR-DOC-BATTHALA',
        ]);

        $doctor = Doctor::create([
            'user_id' => $doctorUser->id,
            'title' => 'Dr.',
            'ahpra_number' => 'MED0001928472',
            'provider_number' => '2938472B',
            'prescriber_number' => 'PR-883921',
            'specialty' => 'Medicinal Cannabis Authorised Prescriber & Integrative Medicine',
            'bio' => 'Dr. Suneetha Batthala is a dedicated Australian General Practitioner and TGA Authorised Prescriber specializing in plant-based therapies, chronic pain management, anxiety disorders, and sleep medicine. Operating from Surry Hills NSW, she provides compassionate, evidence-based telehealth care to patients across Australia.',
            'consultation_fee' => 79.00,
            'medirecords_practitioner_id' => 'MR-PRAC-01823',
            'is_active' => true,
        ]);

        // 4. Doctor Weekly Availability
        for ($day = 1; $day <= 6; $day++) {
            DoctorAvailability::create([
                'doctor_id' => $doctor->id,
                'day_of_week' => $day,
                'start_time' => '09:00:00',
                'end_time' => $day === 6 ? '14:00:00' : '17:30:00',
                'slot_duration_minutes' => 20,
                'is_active' => true,
            ]);
        }

        // 5. Services
        $services = [
            [
                'name' => 'Initial Telehealth Consultation',
                'slug' => 'initial-telehealth-consultation',
                'description' => 'Comprehensive 20-minute video/phone consultation with Dr. Suneetha Batthala. Includes clinical assessment, personalized treatment plan, TGA Special Access Scheme / Authorised Prescriber submission, and digital e-script creation.',
                'duration_minutes' => 20,
                'price' => 79.00,
                'type' => 'initial',
            ],
            [
                'name' => 'Follow-Up & Dosage Review',
                'slug' => 'follow-up-review',
                'description' => '15-minute follow-up consultation to evaluate treatment efficacy, adjust cannabinoid titration dosages, manage any side effects, and renew prescription repeats.',
                'duration_minutes' => 15,
                'price' => 49.00,
                'type' => 'follow_up',
            ],
            [
                'name' => 'Express Repeat Prescription',
                'slug' => 'express-repeat-prescription',
                'description' => 'Quick review and repeat authorization for existing patients whose treatment regimen is stable and approved by Dr. Batthala.',
                'duration_minutes' => 10,
                'price' => 39.00,
                'type' => 'repeat_script',
            ],
        ];

        $serviceModels = [];
        foreach ($services as $srv) {
            $serviceModels[$srv['slug']] = Service::create($srv);
        }

        // 6. Patient Users
        $patient1 = User::create([
            'name' => 'John Miller',
            'email' => 'john.miller@example.com',
            'password' => Hash::make('password'),
            'role' => 'patient',
            'phone' => '0412 345 678',
            'date_of_birth' => '1985-04-12',
            'gender' => 'Male',
            'address_line1' => '42 Crown Street',
            'city' => 'Surry Hills',
            'state' => 'NSW',
            'postcode' => '2010',
            'medicare_number' => '2938 10293',
            'medicare_ref' => '1',
            'medicare_expiry' => '08/2028',
            'ihi_number' => '8003601234567890',
            'medirecords_patient_id' => 'MR-PAT-JM8841',
        ]);

        $patient2 = User::create([
            'name' => 'Sarah Jenkins',
            'email' => 'sarah.jenkins@example.com',
            'password' => Hash::make('password'),
            'role' => 'patient',
            'phone' => '0423 456 789',
            'date_of_birth' => '1992-09-24',
            'gender' => 'Female',
            'address_line1' => '18 Campbell Parade',
            'city' => 'Bondi Beach',
            'state' => 'NSW',
            'postcode' => '2026',
            'medicare_number' => '4920 39482',
            'medicare_ref' => '2',
            'medicare_expiry' => '11/2027',
            'ihi_number' => '8003609876543210',
            'medirecords_patient_id' => 'MR-PAT-SJ9210',
        ]);

        $patient3 = User::create([
            'name' => 'David Wilson',
            'email' => 'david.wilson@example.com',
            'password' => Hash::make('password'),
            'role' => 'patient',
            'phone' => '0434 567 890',
            'date_of_birth' => '1978-11-03',
            'gender' => 'Male',
            'address_line1' => '105 Glenmore Road',
            'city' => 'Paddington',
            'state' => 'NSW',
            'postcode' => '2021',
            'medicare_number' => '8829 19284',
            'medicare_ref' => '1',
            'medicare_expiry' => '03/2029',
            'ihi_number' => '8003604433221100',
            'medirecords_patient_id' => 'MR-PAT-DW3319',
        ]);

        // 7. Products (Dispensary Catalog)
        $productsData = [
            [
                'name' => 'ZOVI LEAF Balanced Oral Oil (10:10)',
                'slug' => 'zovi-leaf-balanced-oral-oil-10-10',
                'sku' => 'ZOV-OIL-BAL-1010',
                'category' => 'balanced_extract',
                'brand' => 'ZOVI LEAF',
                'short_description' => 'Harmonized 1:1 ratio tincture formulated for chronic nerve pain, fibromyalgia, and evening anxiety relief.',
                'description' => 'Our flagship formulation featuring equal parts 10mg/mL Delta-9-THC and 10mg/mL Cannabidiol (CBD) in pharmaceutical-grade organic MCT oil carrier. Extracted using supercritical CO2 technology with preserved natural beta-caryophyllene and linalool terpenes. Ideal for day or evening use for balanced symptom management.',
                'thc_potency' => '10 mg/mL THC',
                'cbd_potency' => '10 mg/mL CBD',
                'form_factor' => 'Oral Liquid Dropper (30mL)',
                'terpene_profile' => 'Beta-Caryophyllene, Linalool, Humulene',
                'tga_schedule' => 'Schedule 8 (Controlled Drug)',
                'price' => 95.00,
                'stock_quantity' => 120,
                'is_prescription_required' => true,
                'image' => 'images/products/balanced-oil.png',
            ],
            [
                'name' => 'ZOVI LEAF High-Potency CBD Isolink (100mg/mL)',
                'slug' => 'zovi-leaf-high-potency-cbd-100',
                'sku' => 'ZOV-OIL-CBD-100',
                'category' => 'cbd_oil',
                'brand' => 'ZOVI LEAF',
                'short_description' => 'Ultra-pure, non-intoxicating cannabidiol formulation designed for inflammatory disorders and daytime focus.',
                'description' => 'Concentrated pharmaceutical CBD oil delivering 100mg of active Cannabidiol per mL (<0.1mg/mL THC). Perfect for driving professionals, daytime anxiety management, and systemic anti-inflammatory support without psychoactive effects.',
                'thc_potency' => '< 1 mg/mL THC (Non-intoxicating)',
                'cbd_potency' => '100 mg/mL CBD',
                'form_factor' => 'Oral Liquid Dropper (30mL)',
                'terpene_profile' => 'Limonene, Alpha-Pinene',
                'tga_schedule' => 'Schedule 4 (Prescription Only)',
                'price' => 125.00,
                'stock_quantity' => 85,
                'is_prescription_required' => true,
                'image' => 'images/products/cbd-oil.png',
            ],
            [
                'name' => 'ZOVI LEAF Nightfall THC Night Tincture (25mg/mL)',
                'slug' => 'zovi-leaf-nightfall-thc-25',
                'sku' => 'ZOV-OIL-THC-25',
                'category' => 'thc_oil',
                'brand' => 'ZOVI LEAF',
                'short_description' => 'Potent nighttime formulation specifically prescribed for severe insomnia, neuropathic pain, and sleep latency.',
                'description' => 'High-THC full-extract cannabis oil delivering 25mg/mL THC infused with heavy myrcene and terpinolene terpenes. Induces rapid sleep onset, muscle relaxation, and restorative deep-stage sleep cycles.',
                'thc_potency' => '25 mg/mL THC',
                'cbd_potency' => '< 1 mg/mL CBD',
                'form_factor' => 'Oral Liquid Dropper (30mL)',
                'terpene_profile' => 'Myrcene, Nerolidol, Bisabolol',
                'tga_schedule' => 'Schedule 8 (Controlled Drug)',
                'price' => 110.00,
                'stock_quantity' => 65,
                'is_prescription_required' => true,
                'image' => 'images/products/thc-oil.png',
            ],
            [
                'name' => 'ZOVI LEAF Alpha Indica 10g Whole Flower',
                'slug' => 'zovi-leaf-alpha-indica-10g',
                'sku' => 'ZOV-FLW-IND-22',
                'category' => 'medicinal_flower',
                'brand' => 'ZOVI LEAF',
                'short_description' => 'Sun-grown Australian medical cannabis flower (22% THC) with rich earthy terpene profile for evening vaporization.',
                'description' => 'Premium hand-trimmed indica-dominant medical cannabis dried flower. Rigorously tested for heavy metals, pesticides, and microbial purity. Recommended exclusively for convection vaporization under physician prescription for breakthrough acute pain and severe sleep disruption.',
                'thc_potency' => '22.5% THC',
                'cbd_potency' => '< 0.5% CBD',
                'form_factor' => 'Dried Herb Flower Tub (10g)',
                'terpene_profile' => 'Beta-Caryophyllene, Myrcene, Humulene (3.2% Total)',
                'tga_schedule' => 'Schedule 8 (Controlled Drug)',
                'price' => 145.00,
                'stock_quantity' => 90,
                'is_prescription_required' => true,
                'image' => 'images/products/flower-indica.png',
            ],
            [
                'name' => 'ZOVI LEAF Daylight Sativa 10g Whole Flower',
                'slug' => 'zovi-leaf-daylight-sativa-10g',
                'sku' => 'ZOV-FLW-SAT-20',
                'category' => 'medicinal_flower',
                'brand' => 'ZOVI LEAF',
                'short_description' => 'Uplifting sativa cultivar (20% THC) delivering daytime mental clarity and functional chronic pain relief.',
                'description' => 'Grown in climate-controlled GMP facilities in NSW, Australia. Rich in citrus terpenes (Limonene, Terpinolene) providing energizing, clear-headed relief for mood elevation and arthritis mobility.',
                'thc_potency' => '20.0% THC',
                'cbd_potency' => '< 1.0% CBD',
                'form_factor' => 'Dried Herb Flower Tub (10g)',
                'terpene_profile' => 'Limonene, Terpinolene, Ocimene',
                'tga_schedule' => 'Schedule 8 (Controlled Drug)',
                'price' => 140.00,
                'stock_quantity' => 70,
                'is_prescription_required' => true,
                'image' => 'images/products/flower-sativa.png',
            ],
            [
                'name' => 'MedVape Pro TGA-Approved Dry Herb Vaporiser',
                'slug' => 'medvape-pro-medical-vaporiser',
                'sku' => 'ZOV-DEV-VAP-01',
                'category' => 'vaporiser',
                'brand' => 'MedVape Clinical',
                'short_description' => 'TGA-certified medical grade convection dry herb inhaler with precise temperature control.',
                'description' => 'Hospital-grade stainless steel heating chamber with ceramic mouthpiece. Certified medical device ARTG #332194 for combustion-free inhalation of prescribed medicinal cannabis flowers.',
                'thc_potency' => 'Hardware (0% THC)',
                'cbd_potency' => 'Hardware (0% CBD)',
                'form_factor' => 'Rechargeable Medical Vaporiser Device',
                'terpene_profile' => 'Precise 160°C - 220°C temperature regulation',
                'tga_schedule' => 'Unscheduled (Medical Device ARTG #332194)',
                'price' => 220.00,
                'stock_quantity' => 40,
                'is_prescription_required' => false,
                'image' => 'images/products/vaporiser.png',
            ],
            [
                'name' => 'ZOVI LEAF Botanical Relief Balm 50g (500mg CBD)',
                'slug' => 'zovi-leaf-botanical-relief-balm-50g',
                'sku' => 'ZOV-TOP-BLM-50',
                'category' => 'cbd_oil',
                'brand' => 'ZOVI LEAF',
                'short_description' => 'Soothing topical salve infused with full-spectrum CBD, arnica, and eucalyptus for localized joint pain.',
                'description' => 'Targeted topical relief infused with 500mg of active Cannabidiol, organic shea butter, arnica montana extract, and Australian blue gum eucalyptus oil. Non-greasy and fast absorbing.',
                'thc_potency' => '< 0.05% THC',
                'cbd_potency' => '500mg Active CBD per 50g tub',
                'form_factor' => 'Topical Balm (50g)',
                'terpene_profile' => 'Eucalyptol, Camphor, Menthol',
                'tga_schedule' => 'Schedule 4 (Prescription Only)',
                'price' => 75.00,
                'stock_quantity' => 110,
                'is_prescription_required' => true,
                'image' => 'images/products/topical-balm.png',
            ],
        ];

        $productModels = [];
        foreach ($productsData as $pData) {
            $productModels[$pData['slug']] = Product::create($pData);
        }

        // 8. Eligibility Assessments
        $eligibility1 = EligibilityAssessment::create([
            'user_id' => $patient1->id,
            'full_name' => $patient1->name,
            'email' => $patient1->email,
            'phone' => $patient1->phone,
            'age_bracket' => '35-44',
            'primary_conditions' => ['Chronic Back Pain', 'Insomnia'],
            'condition_duration' => 'More than 12 months',
            'previous_treatments' => ['NSAIDs (Ibuprofen)', 'Physiotherapy', 'Opioid Analgesics'],
            'tried_standard_medications' => true,
            'is_pregnant_or_breastfeeding' => false,
            'has_psychosis_history' => false,
            'has_cardiovascular_issues' => false,
            'is_eligible' => true,
            'clinical_rationale' => 'Patient meets TGA SAS-B criteria: chronic condition exceeding 3 months with inadequate symptom control from first-line pharmaceutical therapies.',
            'ip_address' => '127.0.0.1',
        ]);

        $eligibility2 = EligibilityAssessment::create([
            'user_id' => $patient2->id,
            'full_name' => $patient2->name,
            'email' => $patient2->email,
            'phone' => $patient2->phone,
            'age_bracket' => '25-34',
            'primary_conditions' => ['Generalized Anxiety', 'Sleep Latency Disorder'],
            'condition_duration' => '6-12 months',
            'previous_treatments' => ['SSRIs (Escitalopram)', 'Cognitive Behavioral Therapy (CBT)'],
            'tried_standard_medications' => true,
            'is_pregnant_or_breastfeeding' => false,
            'has_psychosis_history' => false,
            'has_cardiovascular_issues' => false,
            'is_eligible' => true,
            'clinical_rationale' => 'Eligible for daytime CBD isolate and evening balanced microdosing.',
            'ip_address' => '127.0.0.1',
        ]);

        // 9. Prescriptions
        $script1 = Prescription::create([
            'prescription_number' => 'RX-ZOV-2026-001',
            'patient_id' => $patient1->id,
            'doctor_id' => $doctor->id,
            'product_id' => $productModels['zovi-leaf-balanced-oral-oil-10-10']->id,
            'medication_name' => 'ZOVI LEAF Balanced Oral Oil (10:10 THC:CBD)',
            'dosage_instructions' => 'Commence with 0.25mL sublingually twice daily with meals. Titrate by 0.1mL every 3 days until optimal analgesia is achieved. Maximum daily dose 1.0mL.',
            'repeats_total' => 5,
            'repeats_left' => 4,
            'tga_sas_category' => 'Authorised Prescriber (AP)',
            'status' => 'active',
            'issued_date' => now()->subDays(10)->toDateString(),
            'expiry_date' => now()->addMonths(6)->toDateString(),
            'medirecords_script_id' => 'MR-RX-884910',
            'clinical_notes' => 'Patient responds well to sublingual cannabinoid ratio. No adverse sedation noted.',
        ]);

        $script2 = Prescription::create([
            'prescription_number' => 'RX-ZOV-2026-002',
            'patient_id' => $patient1->id,
            'doctor_id' => $doctor->id,
            'product_id' => $productModels['zovi-leaf-alpha-indica-10g']->id,
            'medication_name' => 'ZOVI LEAF Alpha Indica 10g Whole Flower (22% THC)',
            'dosage_instructions' => 'Inhale 0.1g using TGA-approved convection vaporiser (185°C) 30 minutes before sleep as needed for breakthrough pain and sleep onset.',
            'repeats_total' => 3,
            'repeats_left' => 3,
            'tga_sas_category' => 'Authorised Prescriber (AP)',
            'status' => 'active',
            'issued_date' => now()->subDays(10)->toDateString(),
            'expiry_date' => now()->addMonths(6)->toDateString(),
            'medirecords_script_id' => 'MR-RX-884911',
            'clinical_notes' => 'Prescribed for nighttime breakthrough analgesia.',
        ]);

        $script3 = Prescription::create([
            'prescription_number' => 'RX-ZOV-2026-003',
            'patient_id' => $patient2->id,
            'doctor_id' => $doctor->id,
            'product_id' => $productModels['zovi-leaf-high-potency-cbd-100']->id,
            'medication_name' => 'ZOVI LEAF High-Potency CBD Isolink (100mg/mL)',
            'dosage_instructions' => 'Take 0.5mL (50mg CBD) in the morning and 0.5mL at noon sublingually. Non-intoxicating formula.',
            'repeats_total' => 5,
            'repeats_left' => 5,
            'tga_sas_category' => 'Authorised Prescriber (AP)',
            'status' => 'active',
            'issued_date' => now()->subDays(5)->toDateString(),
            'expiry_date' => now()->addMonths(6)->toDateString(),
            'medirecords_script_id' => 'MR-RX-920194',
            'clinical_notes' => 'Daytime anxiolytic treatment.',
        ]);

        // 10. Appointments
        $appt1 = Appointment::create([
            'appointment_number' => 'APT-2026-081',
            'patient_id' => $patient1->id,
            'doctor_id' => $doctor->id,
            'service_id' => $serviceModels['initial-telehealth-consultation']->id,
            'eligibility_assessment_id' => $eligibility1->id,
            'appointment_date' => now()->subDays(10)->toDateString(),
            'start_time' => '10:00:00',
            'end_time' => '10:20:00',
            'status' => 'completed',
            'consult_type' => 'telehealth_video',
            'video_meeting_url' => 'https://telehealth.zovihealth.com.au/room/zovi-room-081',
            'patient_notes' => 'Chronic lower back pain after lumbar injury in 2021. Difficulty sleeping.',
            'clinical_summary' => 'Initial consultation completed. TGA criteria verified. Prescribed Balanced 10:10 oil and Alpha Indica flower with titration instructions.',
            'pre_consult_completed' => true,
            'payment_status' => 'paid',
            'amount_paid' => 79.00,
            'medirecords_appointment_id' => 'MR-APT-90182',
            'medirecords_sync_status' => 'synced',
            'last_synced_at' => now()->subDays(10),
        ]);

        $appt2 = Appointment::create([
            'appointment_number' => 'APT-2026-092',
            'patient_id' => $patient2->id,
            'doctor_id' => $doctor->id,
            'service_id' => $serviceModels['initial-telehealth-consultation']->id,
            'eligibility_assessment_id' => $eligibility2->id,
            'appointment_date' => now()->addDays(2)->toDateString(),
            'start_time' => '11:00:00',
            'end_time' => '11:20:00',
            'status' => 'confirmed',
            'consult_type' => 'telehealth_video',
            'video_meeting_url' => 'https://telehealth.zovihealth.com.au/room/zovi-room-092',
            'patient_notes' => 'Severe stress and sleep disruption affecting workday performance.',
            'pre_consult_completed' => true,
            'payment_status' => 'paid',
            'amount_paid' => 79.00,
            'medirecords_appointment_id' => 'MR-APT-90244',
            'medirecords_sync_status' => 'synced',
            'last_synced_at' => now(),
        ]);

        $appt3 = Appointment::create([
            'appointment_number' => 'APT-2026-098',
            'patient_id' => $patient3->id,
            'doctor_id' => $doctor->id,
            'service_id' => $serviceModels['initial-telehealth-consultation']->id,
            'appointment_date' => now()->addDays(4)->toDateString(),
            'start_time' => '14:30:00',
            'end_time' => '14:50:00',
            'status' => 'confirmed',
            'consult_type' => 'telehealth_video',
            'video_meeting_url' => 'https://telehealth.zovihealth.com.au/room/zovi-room-098',
            'patient_notes' => 'Osteoarthritis in knees and neck. Referred by friend.',
            'pre_consult_completed' => false,
            'payment_status' => 'paid',
            'amount_paid' => 79.00,
            'medirecords_appointment_id' => 'MR-APT-90299',
            'medirecords_sync_status' => 'synced',
            'last_synced_at' => now(),
        ]);

        // 11. Pre-Consult Forms (Snapforms)
        PreConsultForm::create([
            'appointment_id' => $appt1->id,
            'patient_id' => $patient1->id,
            'snapform_submission_id' => 'SNAP-SUB-88192',
            'form_data' => [
                'full_name' => 'John Miller',
                'dob' => '1985-04-12',
                'regular_gp' => 'Dr. Andrew Clarke',
                'regular_gp_clinic' => 'Surry Hills Family Practice, NSW',
                'pain_score' => 7,
                'conditions' => 'Chronic lower back pain',
                'medications' => 'Paracetamol 500mg prn, Meloxicam 7.5mg',
                'allergies' => 'Penicillin (mild rash)',
                'cannabis_history' => 'Previous beneficial experience with CBD topical',
            ],
            'regular_gp_name' => 'Dr. Andrew Clarke',
            'regular_gp_clinic' => 'Surry Hills Family Practice, NSW',
            'current_medications' => 'Paracetamol 500mg prn, Meloxicam 7.5mg',
            'known_allergies' => 'Penicillin (mild rash)',
            'medical_history' => 'Lumbar spine disc protrusion L4-L5 since 2021. Managed with physical therapy.',
            'consent_to_tga_sas' => true,
            'consent_to_gp_notification' => true,
            'synced_to_medirecords' => true,
            'submitted_at' => now()->subDays(11),
        ]);

        // 12. Dispensary Orders
        $order1 = Order::create([
            'order_number' => 'ORD-ZOV-10024',
            'patient_id' => $patient1->id,
            'subtotal' => 240.00,
            'shipping_amount' => 15.00,
            'discount_amount' => 0.00,
            'total_amount' => 255.00,
            'status' => 'dispatched',
            'payment_status' => 'paid',
            'payment_method' => 'card',
            'transaction_id' => 'ch_3N8zYkK28192Zovi',
            'shipping_name' => 'John Miller',
            'shipping_phone' => '0412 345 678',
            'shipping_address_line1' => '42 Crown Street',
            'shipping_city' => 'Surry Hills',
            'shipping_state' => 'NSW',
            'shipping_postcode' => '2010',
            'tracking_number' => 'AP9921847192AU',
            'tracking_carrier' => 'Australia Post Express Medical (Signature Required)',
            'customer_notes' => 'Please leave with concierge if unattended.',
        ]);

        OrderItem::create([
            'order_id' => $order1->id,
            'product_id' => $productModels['zovi-leaf-balanced-oral-oil-10-10']->id,
            'prescription_id' => $script1->id,
            'product_name' => 'ZOVI LEAF Balanced Oral Oil (10:10)',
            'price' => 95.00,
            'quantity' => 1,
            'subtotal' => 95.00,
        ]);

        OrderItem::create([
            'order_id' => $order1->id,
            'product_id' => $productModels['zovi-leaf-alpha-indica-10g']->id,
            'prescription_id' => $script2->id,
            'product_name' => 'ZOVI LEAF Alpha Indica 10g Whole Flower',
            'price' => 145.00,
            'quantity' => 1,
            'subtotal' => 145.00,
        ]);

        // 13. Sync Logs
        SyncLog::create([
            'entity_type' => 'oauth',
            'entity_id' => 'zovi_mr_live_client_8385365',
            'action' => 'token_refresh',
            'status' => 'success',
            'request_payload' => ['grant_type' => 'client_credentials'],
            'response_payload' => ['token_type' => 'Bearer', 'expires_in' => 3600],
        ]);

        SyncLog::create([
            'entity_type' => 'reconciliation',
            'entity_id' => null,
            'action' => 'daily_sync',
            'status' => 'success',
            'request_payload' => ['trigger' => 'system_cron'],
            'response_payload' => [
                'patients_reconciled' => 3,
                'appointments_reconciled' => 3,
                'status' => '100% data synchronized with MediRecords cloud',
            ],
        ]);
    }
}
