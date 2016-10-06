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
      $surveyAverages = $user->getSurveyAverages();

      return $surveyAverages;
    }

    public function newSurvey()
    {
      $survey = new Survey();
      $survey['question_1'] = $survey->questionOneContent();
      $survey['question_2'] = $survey->questionTwoContent();
      $survey['question_3'] = $survey->questionThreeContent();
      $survey['question_4'] = $survey->questionFourContent();

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

      return $survey;
    }
}
