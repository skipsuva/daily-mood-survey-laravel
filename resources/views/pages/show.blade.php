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
          {this.state.survey}
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
