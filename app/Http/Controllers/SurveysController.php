<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;
use App\Survey;
use Carbon\Carbon;

class SurveysController extends Controller
{
    public function index()
    {
      $surveys = Survey::latest()->get();

      return $surveys;
    }

    public function newSurvey()
    {
      $survey = new Survey();

      return view('surveys.new_survey', compact('survey'));
    }

    public function create()
    {
      $input = Request::all();
      $input['user_id'] = 1;
      $input['time_taken'] = Carbon::now();
      // need to add user_id
      Survey::create($input);

      return redirect('daily-surveys');
    }

    public function show($id)
    {
      # code...
    }
}
