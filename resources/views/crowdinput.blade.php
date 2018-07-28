@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>
                Please click on the most suitable option for the given sentence.
                <br><br>
                <h4>{{ $s->sentence }}</h4>


                <form action= "{{ url('/crowdinput') }}" method="POST">
                	{{csrf_field()}}
                		<input type="hidden" name="id" value="{{$s->id}}">
  						<input type="radio" name="type" value="positive" required> Positive <br>
  						<input type="radio" name="type" value="negative" required> Negative <br>
  						<input type="radio" name="type" value="nutral" required> Neutral <br> 
  						<br> 
  						<input type="submit" value="Submit">
				</form>

            </div>
        </div>
    </div>
</div>
@endsection
