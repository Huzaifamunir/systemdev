@extends('includes.master')

@section('css_links')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
@section('content')

<div class="container">

    <form action="{{route('add_mail')}}" method="post">
        @csrf
      <div class="form-group">
        <label for="exampleInputEmail1">MAIL_MAILER</label>
        <input type="text" class="form-control" value="{{env('MAIL_MAILER')}}" name="MAIL_MAILER">
      </div>
      
      <div class="form-group">
        <label for="exampleInputPassword1">MAIL_HOST</label>
        <input type="text" class="form-control" value="{{env('MAIL_HOST')}}" name="MAIL_HOST">
      </div>
      
      <div class="form-group">
        <label for="exampleInputEmail1">MAIL_PORT</label>
        <input type="number" class="form-control" value="{{env('MAIL_PORT')}}" name="MAIL_PORT">
      </div>
      
      <div class="form-group">
        <label for="exampleInputEmail1">MAIL_USERNAME</label>
        <input type="text" class="form-control" value="{{env('MAIL_USERNAME')}}" name="MAIL_USERNAME">
      </div>
      
       <div class="form-group">
        <label for="exampleInputEmail1">MAIL_PASSWORD</label>
        <input type="password" class="form-control" value="{{env('MAIL_PASSWORD')}}" name="MAIL_PASSWORD">
      </div>
      
      <div class="form-group">
         <select name="MAIL_ENCRYPTION" value="{{env('MAIL_ENCRYPTION')}}" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
            <option value="">SSL</option>
            <option value="">TLS</option>
         </select>
      </div>
      
      <div class="form-group">
        <label for="exampleInputEmail1">MAIL_FROM_ADDRESS</label>
        <input type="text" class="form-control" value="{{env('MAIL_FROM_ADDRESS')}}" name="MAIL_FROM_ADDRESS">
      </div>
      
      <div class="form-group">
        <label for="exampleInputEmail1">MAIL_FROM_NAME</label>
        <input type="text" class="form-control" value="{{env('MAIL_FROM_NAME')}}" name="MAIL_FROM_NAME">
      </div>
     
      <button type="submit" class="btn btn-primary float-right">Submit</button>
    </form>

</div>

@stop