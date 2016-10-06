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
          <div className="columns">
            <div className="column is-half is-offset-one-third">
              <div className="card">
                <div className="card-image">
                  <SurveyGraph
                   survey={this.state.survey}
                  />
                </div>
                <div className="card-content">
                  <div className="media">
                    <div className="media-content">
                      <p className="title is-5">Survey: {this.state.survey.time_taken}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      );
      }
    });

    var SurveyGraph = React.createClass({
      componentDidUpdate: function() {
        Chart.defaults.global.legend.display = false;
        Chart.defaults.global.tooltips.enabled = false;

        var survey = this.props.survey;
        var ctx = document.getElementById("survey-chart");
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
            <figure className="image is-4by4">
              <canvas id="survey-chart" width="275" height="275"></canvas>
            </figure>
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
