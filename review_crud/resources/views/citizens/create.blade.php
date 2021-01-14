@extends('layouts.App')
@section('bootstrap')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="{{asset('css/citizens.css')}}" >
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
{{--ahlam--}}

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
@endsection
<title>
    @section('title')
        Create citizens
    @endsection
</title>
@section('main')
<div class="wrapper bg-white">
    <div class="h2 text-center">citizens </div>
    <div class="h2 text-center">form</div>
{{--    <div class="h5 font-weight-bold">Registration</div>--}}
{{--    <div class="text-muted">Enter your registration details</div>--}}
    <form method="post" action="/citizens">
@CSRF
<div class=" align-items-sm-center justify-content-sm-between pt-1">
    <div class="form-group"> <label class="text-muted mandatory">full name</label> <input type="text" name="citizen_fname"  class="form-control" value="{{old('citizen_fname')}}">@error("citizen_fname")
        <p style="color:red;font-size: 1rem ;">{{$message}}</p>
        @enderror </div>

</div>

<div class="d-sm-flex align-items-sm-center justify-content-sm-between pt-1">
    <div class="form-group">
    <label  class="text-muted" for="citizen_gender">Choose a gender:</label>
    <select class="text-muted" name="citizen_gender" id="citizen_gender">
      <option  class="form-control text-muted" value=""  >gender</option>
      <option  class="form-control text-muted" value="Male" @if(old('citizen_gender') == "Male") selected @endif >Male</option>
      <option class="form-control text-muted" value="Female" @if(old('citizen_gender') == "Female") selected @endif >Female</option>
    </select>
    @error("citizen_gender")
    <p style="color:red;font-size: 1rem ;">{{$message}}</p>
    @enderror
    </div>
    <div class="form-group">
        <label class="text-muted" for="citizen_city">Choose a city:</label>
        <select class="text-muted" name="citizen_city" id="citizen_city">
          <option  class="form-control text-muted" value="" >city</option>
          <option  class="form-control text-muted" value="Amman" @if(old('citizen_city') == "Amman") selected @endif >Amman</option>
          <option class="form-control text-muted" value="Irbid" @if(old('citizen_city') == "Irbid") selected @endif >Irbid</option>
          <option class="form-control text-muted" value="Salt" @if(old('citizen_city') == "Salt") selected @endif >Salt</option>
        </select>
        @error("citizen_city")
        <p style="color:red;font-size: 1rem ;">{{$message}}</p>
        @enderror
    </div>
</div>
<div class="d-sm-flex align-items-sm-center justify-content-sm-between pt-1">

</div>
<div class="form-group"> <label class="text-muted mandatory">National ID</label> <input name="citizen_nid" type="text"  class="form-control" value="{{old('citizen_nid')}}">@error("citizen_nid")
    <p style="color:red;font-size: 1rem ;">{{$message}}</p>
    @enderror
</div>
<div class="form-group"> <label class="text-muted mandatory">Mobile</label> <input name="citizen_mobile" type="tel"  class="form-control" value="{{old('citizen_mobile')}}">@error("citizen_mobile")
    <p style="color:red;font-size: 1rem ;">{{$message}}</p>
    @enderror
</div>
<div class="form-group"> <label class="text-muted mandatory">Address</label> <input name="citizen_address" type="text"  class="form-control" value="{{old('citizen_address')}}">@error("citizen_address")
    <p style="color:red;font-size: 1rem ;">{{$message}}</p>
    @enderror
</div>


<div class="d-flex align-items-center justify-content-sm-end button-section"> <button class="btn btn-primary mx-4" type="submit" >Submit</button> <button class="btn">Cancel</button> </div>

</form>
</div>


<div class="container">
<div class="table-responsive">
    <table id="mytable" class="table table-bordred table-striped">
        <thead>
        <th>Id</th>
        <th>Full Name</th>
        <th>Gender</th>
        <th>City</th>
        <th>National ID</th>
        <th>Mobile</th>
        <th>Address</th>
        <th>Edit</th>
        <th>Delete</th>
        </thead>
        <tbody>
        @foreach($citizens as $citizen)
        <tr>
            <td>{{$citizen->citizen_id}}</td>
            <td>{{$citizen->citizen_fname}}</td>
            <td>{{$citizen->citizen_gender}}</td>
            <td>{{$citizen->citizen_city}}</td>
            <td>{{$citizen->citizen_nid}}</td>
            <td>{{$citizen->citizen_mobile}}</td>
            <td>{{$citizen->citizen_address}}</td>
            <td> <a href="citizens/{{$citizen->citizen_id}}/edit">
                <p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p>
                </a></td>

            <form method="post" action="/citizens/{{$citizen->citizen_id}}">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
            <td>
                    <p data-placement="top" data-toggle="tooltip" title="Delete">
                        <button class="btn btn-danger btn-xs" value="DELETE" data-title="Delete" data-toggle="modal" data-target="#delete" >
                            <span class="glyphicon glyphicon-trash"></span></button></p></td>
            </form>
        </tr>
        @endforeach
        </tbody>

    </table>
</div>
</div>

@endsection



