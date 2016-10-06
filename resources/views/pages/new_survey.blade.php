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
          question_1_response: null,
          question_2_response: null,
          question_3_response: null,
          question_4_response: null
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

      handleRadioClick: function(questionNumber, response) {
        this.setState({[questionNumber]: response});
      },

      handleSurveySubmit: function() {
        $.post('/surveys',
          {
            question_1_response: this.state.question_1_response,
            question_2_response: this.state.question_2_response,
            question_3_response: this.state.question_3_response,
            question_4_response: this.state.question_4_response
          })
          .done(function(data) {
            var loc = window.location;
            window.location = "/daily-surveys/" + data.id;
          })
          .fail(function(e) {
            // handle error thru state
          });
      },

      render: function() {
        var submitButton
        var question_nums = ['1', '2', '3', '4'];
        var surveyItems = question_nums.map(function(num) {
          return <SurveyQuestion
            key={num}
            survey={this.state.survey}
            question_num={num}
            onRadioClick={this.handleRadioClick}
          />
        }.bind(this));
        if(this.state.question_1_response && this.state.question_2_response && this.state.question_3_response && this.state.question_4_response){
          submitButton = <div className='button is-large is-info' onClick={this.handleSurveySubmit}> Submit </div>;
        }

        return (
          <div>
            <div className="columns">
              <div className="column is-half is-offset-one-quarter">
                  {surveyItems}
                <section className="section">
                    {submitButton}
                </section>
              </div>
            </div>
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

      radioClick: function(e) {
        var questionNumber = e.target.name;
        var selection = e.target.value;
        this.props.onRadioClick(questionNumber, selection);
      },

      render: function() {
        var questionText = "question_" + this.props.question_num;
        return(
          <div>
            <section className="section">
              <div className="box notification">
                <p className="control">
                  <label className="label title is-3">
                    {this.props.survey[questionText]}
                  </label>
                </p>
                <p className="control">
                  <label className="radio">
                    <input type="radio" name={"question_"+ this.props.question_num +"_response"} onClick={this.radioClick} value="1" />
                    1
                  </label>
                  <label className="radio">
                    <input type="radio" name={"question_"+ this.props.question_num +"_response"} onClick={this.radioClick} value="2" />
                    2
                  </label>
                  <label className="radio">
                    <input type="radio" name={"question_"+ this.props.question_num +"_response"} onClick={this.radioClick} value="3" />
                    3
                  </label>
                  <label className="radio">
                    <input type="radio" name={"question_"+ this.props.question_num +"_response"} onClick={this.radioClick} value="4" />
                    4
                  </label>
                  <label className="radio">
                    <input type="radio" name={"question_"+ this.props.question_num +"_response"} onClick={this.radioClick} value="5" />
                    5
                  </label>
                </p>
              </div>
            </section>
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
