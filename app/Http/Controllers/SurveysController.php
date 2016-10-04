<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;
use App\Survey;
use Carbon\Carbon;

class SurveysController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      $user = \Auth::user();
      $surveys = $user->surveys->sortBy('time_taken');

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
      $input['user_id'] = \Auth::user()->id;
      $input['time_taken'] = Carbon::now();

      $survey = Survey::create($input);

      return redirect()->action(
        'SurveysController@show', ['id' => $survey->id]
      );
    }

    public function show($id)
    {
      $survey = Survey::find($id);

      return $survey;
    }
}
