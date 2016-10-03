@extends('app')

@section('content')
  <h1>New Survey</h1>
  <h2>On a scale of 1 to 5...</h2>

  <div class="survey-question-container">
    <h3>{{$survey->question_one_content()}}</h3>
  </div>
  <div class="survey-question-container">
    <h3>{{$survey->question_two_content()}}</h3>
  </div>
  <div class="survey-question-container">
    <h3>{{$survey->question_three_content()}}</h3>
  </div>
  <div class="survey-question-container">
    <h3>{{$survey->question_four_content()}}</h3>
  </div>

@endsection
