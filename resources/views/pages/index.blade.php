@extends('app')

@section('content')
  <div id="surveys-container">
  </div>

  <script type="text/babel">
    var Surveys = React.createClass({
      getInitialState: function() {
        return {
          allSurveyData: []
        };
      },

      componentDidMount: function() {
        this._getSurveys();
      },

      _getSurveys: function() {
        $.get('/surveys',function(data) {
          this.setState({ allSurveyData: data });
        }.bind(this));
      },
    render: function() {
      return (
        <div>
          <h1>Your Averages</h1>
          <ul>
           <SurveyGraph
            survey={this.state.allSurveyData}
           />
          </ul>
        </div>
      );
      }
    });

    var SurveyGraph = React.createClass({
      componentDidUpdate: function() {
        Chart.defaults.global.legend.display = false;
        Chart.defaults.global.tooltips.enabled = false;

        var survey = this.props.survey;
        var ctx = document.getElementById("survey-chart-" + survey.id);
        var myChart = new Chart(ctx, {
          type: 'bar',
          options: {
              responsive: false,
              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero:true,
                          max: 5,
                          maxTicksLimit: 5
                      }
                  }]
              }
          },
          data: {
              labels: ["Mood", "Sleep", "Community", "Diet"],
              datasets: [{
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
            <canvas id={"survey-chart-" + this.props.survey.id} width="400" height="400"></canvas>
          </div>
        );
      }
    });

    ReactDOM.render(
      <Surveys />,
      document.getElementById('surveys-container')
    );
  </script>
@endsection
