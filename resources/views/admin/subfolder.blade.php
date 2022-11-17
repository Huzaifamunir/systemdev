@extends('includes.master')

@section('css_links')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">



@section('content')


<section id="responsive-datatable">

    <div class="row">

        <div class="col-12">

            <div class="card">

                <div class="card-header border-bottom">

                    <h4 class="card-title">ScreenShots Sub Folder
                </div>

                <div class="card-header border-bottom">


                </div>

                <div class="card-datatable">

                    <table class="dt-responsive table" id = "show_users" >

                        <thead>

                            <tr>

                                <th>#</th>
                                <th>Folder</th>


                                <th>Action</th>

                            </tr>

                        </thead>

                        <tbody>
<?php $i=1; ?>
                            @foreach($subfoldersarray as $f)

                            <tr>
                           
                                <td>{{$i++}}</td> 
                                <td><a href="">{{$f}}</a></td>

                                <td>
                                    <form action="{{route('getscreenshots')}}" method="post">
                                        @csrf
                                        <input value="{{$f}}" name="date" hidden>
                                        <input value="{{$name}}" name="folder" hidden>
                                         <button type="submit" class="btn btn-sm btn-outline-primary" >View</button>
                                    </form>
                               </td>

                            </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</section>




@endsection

@section('js_link')

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

<script> 

$(document).ready( function () {

    $('#show_users').DataTable();

} );

</script>
@stop