@extends('app')

@section('content')
  <h1>Your Surveys</h1>
  @foreach ($surveys as $survey)
    <h3>{{$survey->time_taken}}</h3>
  @endforeach

@endsection
