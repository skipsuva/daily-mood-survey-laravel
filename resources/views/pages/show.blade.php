@extends('app')

@section('content')
  <div id="survey-container">
    <h1>Your Recent Survey</h1>
  </div>

  <script type="text/babel">
    var Survey = React.createClass({
      getInitialState: function() {
        return {
          survey: []
        };
      },

      componentWillMount: function() {
        this._getSurvey();
      },

      _getSurvey: function() {
        var url = document.URL.split('/');
        $.get('/surveys/' + url[url.length - 1] , function(data) {
          this.setState({ survey: data });
        }.bind(this));
      },

    render: function() {
      return (
        <div>
          <h1> New Survey Component </h1>
          {this.state.survey.time_taken}
          <SurveyGraph
            survey={this.state.survey}
          />

        </div>
      );
      }
    });

    var SurveyGraph = React.createClass({
      componentDidUpdate: function() {
        var survey = this.props.survey;
        var ctx = document.getElementById("survey-chart");
        var myChart = new Chart(ctx, {
          type: 'bar',
          options: {
              responsive: false,
              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero:true
                      }
                  }]
              }
          },
          data: {
              labels: ["Mood", "Sleep", "Community", "Diet"],
              datasets: [{
                  label: 'Daily Survey',
                  data: [
                    survey.question_1_response,
                    survey.question_2_response,
                    survey.question_3_response,
                    survey.question_4_response
                  ],
                  backgroundColor: [
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(255, 206, 86, 0.2)',
                      'rgba(75, 192, 192, 0.2)'
                  ],
                  borderColor: [
                      'rgba(255,99,132,1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(255, 206, 86, 1)',
                      'rgba(75, 192, 192, 1)',
                  ],
                  borderWidth: 1
              }]
          }
        });
      },

      render: function() {

        return (
          <div>
            <canvas id="survey-chart" width="400" height="400"></canvas>
          </div>
        );
      }
    });

    ReactDOM.render(
      <Survey />,
      document.getElementById('survey-container')
    );
  </script>
@endsection
