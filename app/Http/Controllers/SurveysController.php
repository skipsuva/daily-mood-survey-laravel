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
      $user = \Auth::user();
      $surveys = $user->surveys->sortBy('time_taken');

      // return view('surveys.index', compact('surveys'));
      return $surveys;
    }

    public function newSurvey()
    {
      $survey = new Survey();
      $survey['question_1'] = $survey->questionOneContent();
      $survey['question_2'] = $survey->questionTwoContent();
      $survey['question_3'] = $survey->questionThreeContent();
      $survey['question_4'] = $survey->questionFourContent();

      // return view('surveys.new_survey', compact('survey'));
      return $survey;
    }

    public function create()
    {
      $input = Request::all();
      $input['user_id'] = \Auth::user()->id;
      $input['time_taken'] = Carbon::now();

      $survey = Survey::create($input);

      return $survey;
    }

    public function show($id)
    {
      $survey = Survey::find($id);
      // if($survey->user != \Auth::user()){
      //   return redirect()->action('SurveysController@index');
      // };

      // return view('surveys.show', compact('survey'));
      return $survey;
    }
}
