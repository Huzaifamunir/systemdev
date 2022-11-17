@extends('includes.master')

@section('css_links')
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@section('content')

<div class="container">

    <form action="{{route('add_aws')}}" method="post">
        @csrf
      <div class="form-group">
        <label for="exampleInputEmail1">ACCESS KEY</label>
        <input type="text" class="form-control" value="{{env('AWS_ACCESS_KEY_ID')}}" name="ACCESS_KEY">
      </div>
      
      <div class="form-group">
        <label for="exampleInputPassword1">SECRET ACCESS</label>
        <input type="text" class="form-control" value="{{env('AWS_SECRET_ACCESS_KEY')}}" name="SECRET_ACCESS">
      </div>
      
      <div class="form-group">
        <label for="exampleInputEmail1">REGION</label>
        <input type="text" class="form-control" value="{{env('AWS_DEFAULT_REGION')}}" name="REGION">
      </div>
      
      <div class="form-group">
        <label for="exampleInputEmail1">BUCKET</label>
        <input type="text" class="form-control" value="{{env('AWS_BUCKET')}}" name="BUCKET">
      </div>
      
       <div class="form-group">
        <label for="exampleInputEmail1">ENDPOINT</label>
        <input type="text" class="form-control" value="{{env('AWS_ENDPOINT')}}" name="ENDPOINT">
      </div>
     
      <button type="submit" class="btn btn-primary float-right">Submit</button>
    </form>

</div>

@stop