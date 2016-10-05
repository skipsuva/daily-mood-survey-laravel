@extends('app')

@section('content')
  <div id="survey-container">

    <h1>Your Recent Survey</h1>
    {{-- <h3>{{$survey->time_taken}}</h3> --}}
  </div>

  <script type="text/babel">
    var Survey = React.createClass({
      getInitialState: function() {
        return {
          survey: []
        };
      },

      componentDidMount: function() {
      },

      // _getSurvey: function() {
      //   $.get('/tweets/all',function(data) {
      //     this.setState({ alltweets: data });
      //   }.bind(this));
      // },
    render: function() {
      return (
        <div>
          <h1> New Survey Component </h1>
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
