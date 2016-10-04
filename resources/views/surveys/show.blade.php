@extends('app')

@section('content')
  <h1>Your Recent Survey</h1>
  <h3>{{$survey->time_taken}}</h3>

@endsection
