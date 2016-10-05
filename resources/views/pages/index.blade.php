@extends('app')

@section('content')
  <div id="surveys-container">
  </div>

  <script type="text/babel">
    var Surveys = React.createClass({
      getInitialState: function() {
        return {
          allSurveys: []
        };
      },

      componentDidMount: function() {
        this._getSurveys();
      },

      _getSurveys: function() {
        $.get('/surveys',function(data) {
          this.setState({ allSurveys: data });
        }.bind(this));
      },
    render: function() {
      var handleSurveys = this.state.allSurveys.map(function(survey) {
        return <li> {survey.time_taken} </li>
      });
      return (
        <div>
          <h1> Survey Index Component </h1>
          <h1>Your Surveys</h1>
          <ul>
           {handleSurveys}
          </ul>
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
