@extends('app')

@section('content')
  <div id="new-survey-container">
    <h1>New Survey</h1>
    <h2>On a scale of 1 to 5...</h2>
  </div>


  <script type="text/babel">
    var NewSurvey = React.createClass({
      getInitialState: function() {
        return {
          survey: [],
          responses: []
        };
      },

      componentWillMount: function() {
        this._getNewSurvey();
      },

      _getNewSurvey: function() {
        $.get('/surveys/new', function(data) {
          this.setState({ survey: data });
        }.bind(this));
      },

      render: function() {
        var question_nums = ['1', '2', '3', '4'];
        var surveyItems = question_nums.map(function(num) {
          return <SurveyQuestion key={num} survey={this.state.survey} question_num={num}/>
        }.bind(this));

        return (
          <div>
            {surveyItems}
          </div>
        );
        }
    });

    var SurveyQuestion = React.createClass({
      getInitialState: function() {
        return {
        };
      },

      componentWillMount: function() {
      },

      render: function() {
        var questionText = "question_" + this.props.question_num;
        return(
          <div>
            {this.props.survey[questionText]}
            <input type="radio" name={"question_"+ this.props.question_num +"_response"} value="1" /> 1
            <input type="radio" name={"question_"+ this.props.question_num +"_response"} value="2" /> 2
            <input type="radio" name={"question_"+ this.props.question_num +"_response"} value="3" /> 3
            <input type="radio" name={"question_"+ this.props.question_num +"_response"} value="4" /> 4
            <input type="radio" name={"question_"+ this.props.question_num +"_response"} value="5" /> 5
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
