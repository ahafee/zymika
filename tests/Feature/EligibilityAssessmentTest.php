<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EligibilityAssessmentTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    public function test_eligibility_page_is_accessible(): void
    {
        $response = $this->get('/eligibility');
        $response->assertStatus(200);
        $response->assertSee('Medicinal Cannabis Eligibility Check');
    }

    public function test_eligibility_submission_passes_for_chronic_pain(): void
    {
        $response = $this->postJson('/eligibility', [
            'full_name' => 'Michael Green',
            'email' => 'michael.green@example.com',
            'phone' => '0412333444',
            'age_bracket' => '35-44',
            'primary_conditions' => ['Chronic Lower Back / Neck Pain'],
            'condition_duration' => 'Over 12 months',
            'previous_treatments' => ['NSAIDs (Ibuprofen / Naproxen / Meloxicam)'],
            'tried_standard_medications' => true,
            'is_pregnant_or_breastfeeding' => false,
            'has_psychosis_history' => false,
            'has_cardiovascular_issues' => false,
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'is_eligible' => true,
        ]);

        $this->assertDatabaseHas('eligibility_assessments', [
            'email' => 'michael.green@example.com',
            'is_eligible' => true,
        ]);
    }
}
