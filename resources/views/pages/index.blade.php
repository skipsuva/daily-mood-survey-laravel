@extends('app')

@section('content')
  <div id="surveys-container">
    <h1>Your Surveys</h1>

  </div>
  {{-- @foreach ($surveys as $survey)
    <h3>{{$survey->time_taken}}</h3>
  @endforeach --}}


  <script type="text/babel">
    var Surveys = React.createClass({
      getInitialState: function() {
        return {
          surveys: []
        };
      },

      componentDidMount: function() {
      },

      // _getSurveys: function() {
      //   $.get('/tweets/all',function(data) {
      //     this.setState({ alltweets: data });
      //   }.bind(this));
      // },
    render: function() {
      return (
        <div>
          <h1> Survey Index Component </h1>
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
