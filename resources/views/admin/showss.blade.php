@extends('includes.master')

@section('css_links')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">



@section('content')

<style>
    .submitbtndivTop {
        display: flex;
        width: 100%;
    }
    
    #search{
        display:flex;
        margin-top:5px;
    }
    
    #icon-zoom{
        margin:10px 0px 0px 10px;
        font-size:22px;
        cursor: pointer;
    }
    .modal-body{
            word-break: break-all;
    }
    
</style>

<section id="responsive-datatable">

    <div class="row">

        <div class="col-12">

            <div class="card">

                <div class="card-header border-bottom">

                    <h4 class="card-title">ScreenShots Folder</h4>

                </div>

                <div class="card-header border-bottom">


                </div>

                <div class="card-datatable" style="padding: 20px;">
                    
                    <div class="row" id="withouthsearch">
 
    @foreach($screenshotsarray as $image)
    <div class="col-lg-3 col-md-3 col-sm-4 col-6">
     <div class="imageCheckbox" style="height:200px; margin: 15px;">
         <div class="imageInput" >
           <label class="ct">
  <input value="" name="image[]" type="checkbox" id="check" >
  <!--<div class="checkmark"></div>-->

</label>
         </div>
           <div class="imageLabelDiv">
           <label for="check{{$image}}" data-id="" class="imageLabel">
                <img data-image="{{$image}}"  data-toggle="modal" class="image" data-target="#inlineForm" style="width: 100%; height: 100%;object-fit: cover;"  src="{{$image}}" alt="">
           </label>

         </div>
    </div>
        </div>
   @endforeach
   

</div>
                    
<!--                    <table class="dt-responsive table" id = "show_users" >-->

<!--                        <thead>-->

<!--                            <tr>-->

<!--                                <th>#</th>-->
<!--                                <th>Folder</th>-->


<!--                                <th>Action</th>-->

<!--                            </tr>-->

<!--                        </thead>-->

<!--                        <tbody>-->
<!--<?php $i=1; ?>-->
<!--                            @foreach($screenshotsarray as $f)-->

<!--                            <tr>-->
                           
<!--                                <td>{{$i++}}</td> -->
<!--                                <td><a href="{{route('subfolder',$f)}}">{{$f}}</a></td>-->

<!--                                <td>-->
<!--                                <a class="btn btn-sm btn-outline-primary image" data-image="{{$f}}"  data-toggle="modal" data-target="#inlineForm">View</a></td>-->

<!--                            </tr>-->

<!--                            @endforeach-->

<!--                        </tbody>-->

<!--                    </table>-->

                </div>

            </div>

        </div>

    </div>

</section>

<div class="modal fade text-left bd-example-modal-lg" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

        <div class="modal-content">

            <div class="card">

                <div class="card-header">

                    <h4 class="card-title">ScreenShot </h4>

                </div>
          
            
                


                <div class="card-body">

                    <div id="appendimage">
                        
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


@endsection

@section('js_link')

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

<script> 

$(document).ready( function () {

    $('#show_users').DataTable();

} );


$('.image').click(function(){
    var image=$(this).attr('data-image');
    $('#appendimage').empty();
    $('#appendimage').append(`<img style="width:100%; height:100%; object-fit:cover;" src="`+image+`">`);
})
</script>
@stop