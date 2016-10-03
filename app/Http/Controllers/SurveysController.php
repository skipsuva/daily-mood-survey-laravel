<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Survey;

class SurveysController extends Controller
{
    public function NewSurvey()
    {
      $survey = new Survey();

      return view('surveys.new_survey', compact('survey'));
    }
}
