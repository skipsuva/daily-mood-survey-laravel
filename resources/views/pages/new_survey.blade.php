@extends('app')

@section('content')
  <div id="new-survey-container">
    <h1>New Survey</h1>
    <h2>On a scale of 1 to 5...</h2>

    {{-- {!! Form::open(['url' => 'daily-surveys']) !!}
      <div class="survey-question-container">
        <h3>{{$survey->questionOneContent()}}</h3>
        {!! Form::label('question_1_response', '1') !!}
        {!! Form::radio('question_1_response', '1') !!}

        {!! Form::label('question_1_response', '2') !!}
        {!! Form::radio('question_1_response', '2') !!}

        {!! Form::label('question_1_response', '3') !!}
        {!! Form::radio('question_1_response', '3') !!}

        {!! Form::label('question_1_response', '4') !!}
        {!! Form::radio('question_1_response', '4') !!}

        {!! Form::label('question_1_response', '5') !!}
        {!! Form::radio('question_1_response', '5') !!}
      </div>
      <div class="survey-question-container">
        <h3>{{$survey->questionTwoContent()}}</h3>
        {!! Form::label('question_2_response', '1') !!}
        {!! Form::radio('question_2_response', '1') !!}

        {!! Form::label('question_2_response', '2') !!}
        {!! Form::radio('question_2_response', '2') !!}

        {!! Form::label('question_2_response', '3') !!}
        {!! Form::radio('question_2_response', '3') !!}

        {!! Form::label('question_2_response', '4') !!}
        {!! Form::radio('question_2_response', '4') !!}

        {!! Form::label('question_2_response', '5') !!}
        {!! Form::radio('question_2_response', '5') !!}
      </div>
      <div class="survey-question-container">
        <h3>{{$survey->questionThreeContent()}}</h3>
        {!! Form::label('question_3_response', '1') !!}
        {!! Form::radio('question_3_response', '1') !!}

        {!! Form::label('question_3_response', '2') !!}
        {!! Form::radio('question_3_response', '2') !!}

        {!! Form::label('question_3_response', '3') !!}
        {!! Form::radio('question_3_response', '3') !!}

        {!! Form::label('question_3_response', '4') !!}
        {!! Form::radio('question_3_response', '4') !!}

        {!! Form::label('question_3_response', '5') !!}
        {!! Form::radio('question_3_response', '5') !!}
      </div>
      <div class="survey-question-container">
        <h3>{{$survey->questionFourContent()}}</h3>
        {!! Form::label('question_4_response', '1') !!}
        {!! Form::radio('question_4_response', '1') !!}

        {!! Form::label('question_4_response', '2') !!}
        {!! Form::radio('question_4_response', '2') !!}

        {!! Form::label('question_4_response', '3') !!}
        {!! Form::radio('question_4_response', '3') !!}

        {!! Form::label('question_4_response', '4') !!}
        {!! Form::radio('question_4_response', '4') !!}

        {!! Form::label('question_4_response', '5') !!}
        {!! Form::radio('question_4_response', '5') !!}
      </div>

      <div class="survey-submit-container">
        {!! Form::submit('Submit Survey', ['class' => 'form-control']) !!}
      </div>
    {!! Form::close() !!} --}}
  </div>


  <script type="text/babel">
    var NewSurvey = React.createClass({
      getInitialState: function() {
        return {
          // responses: []
        };
      },

      componentDidMount: function() {
      },

    render: function() {
      return (
        <div>
          <h1> form </h1>
          <input type="radio" name="question_1_response" value="1" /> 1
          <input type="radio" name="question_1_response" value="2" /> 2
          <input type="radio" name="question_1_response" value="3" /> 3
          <input type="radio" name="question_1_response" value="4" /> 4
          <input type="radio" name="question_1_response" value="5" /> 5
        </div>
      );
      }
    });

    ReactDOM.render(
      <NewSurvey />,
      document.getElementById('new-survey-container')
    );
  </script>
@endsection
