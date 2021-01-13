@extends('layouts.App')
@section('bootstrap')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="{{URL::asset('css/citizens.css')}}" >
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
@endsection
@section('style')
    <style>
    </style>
@endsection
<title>
    @section('title')
        Create users
    @endsection
</title>
@section('main')
    <div class="wrapper bg-white">
        <div class="h2 text-center">citizens </div>
        <div class="h2 text-center">form</div>
        {{--    <div class="h5 font-weight-bold">Registration</div>--}}
        {{--    <div class="text-muted">Enter your registration details</div>--}}
        <form method="post" action="/citizens/{{$citizen->citizen_id}}">
            @CSRF
            <input type="hidden" name="_method" value="PUT">
{{--            @method(PUT)--}}

            <div class=" align-items-sm-center justify-content-sm-between pt-1">
                <div class="form-group"> <label class="text-muted mandatory">full name</label> <input type="text" name="citizen_fname"  class="form-control" value="{{$citizen->citizen_fname}}">@error("citizen_fname")
                    <p style="color:red;font-size: 1rem ;">{{$message}}</p>
                    @enderror </div>

            </div>

            <div class="d-sm-flex align-items-sm-center justify-content-sm-between pt-1">
                <div class="form-group">
                    <label class="text-muted" for="citizen_gender">Choose a gender:</label>
                    <select class="text-muted" name="citizen_gender" id="citizen_gender">
                      <option  class="form-control text-muted" value="Male" @if($citizen->citizen_gender == "Male") selected @endif >Male</option>
                      <option class="form-control text-muted" value="Female" @if($citizen->citizen_gender == "Female") selected @endif >Female</option>
                    </select>
                    @error("citizen_gender")
                    <p style="color:red;font-size: 1rem ;">{{$message}}</p>
                    @enderror
                    </div>
                <div class="form-group"> <label class="text-muted" for="citizen_city">Choose a city:</label>
                    <select class="text-muted" name="citizen_city" id="citizen_city">
                      <option  class="form-control text-muted" value="" >city</option>
                      <option  class="form-control text-muted" value="Amman" @if($citizen->citizen_city == "Amman") selected @endif >Amman</option>
                      <option class="form-control text-muted" value="Irbid" @if($citizen->citizen_city == "Irbid") selected @endif >Irbid</option>
                      <option class="form-control text-muted" value="Salt" @if($citizen->citizen_city == "Salt") selected @endif >Salt</option>
                    </select>
                    @error("citizen_city")
                    <p style="color:red;font-size: 1rem ;">{{$message}}</p>
                    @enderror
                </div>
            </div>


            <div class="form-group"> <label class="text-muted mandatory">National ID</label> <input name="citizen_nid" type="text"  class="form-control" value="{{$citizen->citizen_nid}}">@error("citizen_nid")
                <p style="color:red;font-size: 1rem ;">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group"> <label class="text-muted mandatory">Mobile</label> <input name="citizen_mobile" type="tel"  class="form-control" value="{{$citizen->citizen_mobile}}">@error("citizen_mobile")
                <p style="color:red;font-size: 1rem ;">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group"> <label class="text-muted mandatory">Address</label> <input name="citizen_address" type="text"  class="form-control" value="{{$citizen->citizen_address}}">@error("citizen_address")
                <p style="color:red;font-size: 1rem ;">{{$message}}</p>
                @enderror
            </div>


            <div class="d-flex align-items-center justify-content-sm-end button-section"> <button class="btn btn-primary mx-4" type="submit" >Update</button> <button class="btn">Cancel</button> </div>

        </form>
    </div>


@endsection



