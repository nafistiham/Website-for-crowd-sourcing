@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>
                <h4>Please click on the most suitable option for the given sentence.</h4>
                <br>
                <h3>{{ $s->sentence }}</h3>


                <form action= "{{ url('/crowdinput') }}" method="POST">
                	{{csrf_field()}}
                		<input type="hidden" name="id" value="{{$s->id}}">
  						<input type="radio" name="type" value="positive" required> Positive <br>
              <input type="radio" name="type" value="slightly_positive" required> Slightly Positive <br>
              <input type="radio" name="type" value="nutral" required> Neutral <br> 
              <input type="radio" name="type" value="slightly_negative" required> Slightly Negative <br>
  						<input type="radio" name="type" value="negative" required> Negative <br>
  						
              <br>
              <h3>How much sure are you about your response ?</h3>
              <input type="radio" name="type1" value="pretty_sure" required checked> Pretty Sure <br>
              <input type="radio" name="type1" value="not_so_much" required> Not so much <br>
              <input type="radio" name="type1" value="not_sure" required> Not sure at all <br> 
 
  						<br> 
  						<input class = "btn btn-success" type="submit" value="Submit">
				        </form>

            </div>
        </div>
    </div>
</div>
@endsection
