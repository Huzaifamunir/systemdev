@extends('includes.master')

@section('css_links')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">



@section('content')

<!-- Modal -->
   @if(Session::has('add_employees'))
        <div class="alert alert-success">
        {{ Session::get('add_employees')}}
        </div>
    @endif

<div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" 
      aria-labelledby="myModalLabel33" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">

            <div class="card">

                <div class="card-header">

                    <h4 class="card-title">Add Company </h4>

                </div>              


                <div class="card-body">

                    <form class="form form-horizontal" 
                    action = "{{ route('add_company') }}" 
                       
                    method = "POST">

                        @csrf

                        <div class="row">

                            <div class="col-12">

                                <div class="form-group row">

                                    <div class="col-sm-3 col-form-label">

                                        <label for="fname-icon">Company Name</label>

                                    </div>

                                    <div class="col-sm-9">

                                        <div class="input-group input-group-merge">
                                            

                                            <div class="input-group-prepend">

                                                <span class="input-group-text"><i data-feather="user"></i></span>

                                            </div>

                                            <input type="text" id="fname-icon" class="form-control" name="name" placeholder="Name" / required="">
                                            <!-- <span style="color:red;margin-top:10px;margin-top: 20px;position: absolute;margin-left: -125px;">@error('username'){{$message}}@enderror</span> -->

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="col-12">

                                <div class="form-group row">

                                    <div class="col-sm-3 col-form-label">

                                        <label for="email-icon">Company Email</label>

                                    </div>

                                    <div class="col-sm-9">

                                        <div class="input-group input-group-merge">

                                            <div class="input-group-prepend">

                                                <span class="input-group-text"><i data-feather="mail"></i></span>

                                            </div>

                                            <input type="email" id="email-icon" class="form-control" name="email" placeholder="Email" / required="">

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="col-12">

                                <div class="form-group row">

                                    <div class="col-sm-3 col-form-label">

                                        <label for="email-icon">Company Password</label>

                                    </div>

                                    <div class="col-sm-9">

                                        <div class="input-group input-group-merge">

                                            <div class="input-group-prepend">

                                                <span class="input-group-text"><i data-feather="mail"></i></span>

                                            </div>

                                            <input type="text" id="email-icon" class="form-control" name="pass" placeholder="pass" / required="">

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="col-12">

                                <div class="form-group row">

                                    <div class="col-sm-3 col-form-label">

                                        <label for="contact-icon">Company Address</label>

                                    </div>

                                    <div class="col-sm-9">

                                        <div class="input-group input-group-merge">

                                            <div class="input-group-prepend">

                                                <span class="input-group-text"><i data-feather="smartphone"></i></span>

                                            </div>

                                            <input type="text" id="contact-icon" class="form-control" name="address" placeholder="Company Address" / required="">

                                            
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="col-12">

                                <div class="form-group row">

                                    <div class="col-sm-3 col-form-label">

                                        <label for="contact-icon">Company Phone</label>

                                    </div>

                                    <div class="col-sm-9">

                                        <div class="input-group input-group-merge">

                                            <div class="input-group-prepend">

                                                <span class="input-group-text"><i data-feather="smartphone"></i></span>

                                            </div>

                                            <input type="number" id="contact-icon" class="form-control" name="phone" placeholder="Phone" / required="">

                                        </div>

                                    </div>

                                </div>

                            </div>


                            <div class="col-12">

                                <div class="form-group row">

                                    <div class="col-sm-3 col-form-label">

                                        <label for="contact-icon">Company Phenomena</label>

                                    </div>

                                    <div class="col-sm-9">

                                        <div class="input-group input-group-merge">

                                            <div class="input-group-prepend">

                                                <span class="input-group-text"><i data-feather="smartphone"></i></span>

                                            </div>

                                            <input type="text" id="contact-icon" class="form-control" name="phenomena" placeholder="Company Phenomena" / required="">

                                            
                                        </div>

                                    </div>

                                </div>

                            </div>


                            <div class="col-sm-9 offset-sm-3">

                                <button type="submit" class="btn btn-primary mr-1">
                                    Add Company</button>

                                <button type="reset"  onclick="clean()" 
                                class="btn btn-outline-secondary">Reset</button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- Edit Modal -->

<div class="modal fade text-left" id="edit_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">

            <div class="card">

                <div class="card-header">

                    <h4 class="card-title">Edit Employee</h4>

                </div>

                <div class="card-body">

                    <form class="form form-horizontal" action = "{{ route('edit_company') }}" method = "POST">

                        @csrf

                        <input type="hidden" value = "123" id = "id" name = 'id'>

                        <div class="row">

                            <div class="col-12">

                                <div class="form-group row">

                                    <div class="col-sm-3 col-form-label">

                                        <label for="fname-icon">Company Email</label>

                                    </div>

                                    <div class="col-sm-9">

                                        <div class="input-group input-group-merge">

                                            <div class="input-group-prepend">

                                                <span class="input-group-text"><i data-feather="user"></i></span>

                                            </div>

                                            <input type="text" id="edit_username" class="form-control" name="name" placeholder="Email" />

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="col-12">

                                <div class="form-group row">

                                    <div class="col-sm-3 col-form-label">

                                        <label for="email-icon">Company Name</label>

                                    </div>

                                    <div class="col-sm-9">

                                        <div class="input-group input-group-merge">

                                            <div class="input-group-prepend">

                                                <span class="input-group-text"><i data-feather="mail"></i></span>

                                            </div>

                                            <input type="email" id="edit_email" class="form-control" name="email" placeholder="Name" />

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="col-12">

                                <div class="form-group row">

                                    <div class="col-sm-3 col-form-label">

                                        <label for="contact-icon">Company Password</label>

                                    </div>

                                    <div class="col-sm-9">

                                        <div class="input-group input-group-merge">

                                            <div class="input-group-prepend">

                                                <span class="input-group-text"><i data-feather="smartphone"></i></span>

                                            </div>

                                            <input type="text" id="pass" class="form-control" name="pass" placeholder="Password" />

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="col-12">

                                <div class="form-group row">

                                    <div class="col-sm-3 col-form-label">

                                        <label for="contact-icon">Company Phone</label>

                                    </div>

                                    <div class="col-sm-9">

                                        <div class="input-group input-group-merge">

                                            <div class="input-group-prepend">

                                                <span class="input-group-text"><i data-feather="smartphone"></i></span>

                                            </div>

                                            <input type="text" id="phone" class="form-control" name="phone" placeholder="Phone" />

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="col-12">

                                <div class="form-group row">

                                    <div class="col-sm-3 col-form-label">

                                        <label for="contact-icon">Company Address</label>

                                    </div>

                                    <div class="col-sm-9">

                                        <div class="input-group input-group-merge">

                                            <div class="input-group-prepend">

                                                <span class="input-group-text"><i data-feather="smartphone"></i></span>

                                            </div>

                                            <input type="text" id="address" class="form-control" name="address" placeholder="address" />

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="col-12">

                                <div class="form-group row">

                                    <div class="col-sm-3 col-form-label">

                                        <label for="contact-icon">Company Phenomena</label>

                                    </div>

                                    <div class="col-sm-9">

                                        <div class="input-group input-group-merge">

                                            <div class="input-group-prepend">

                                                <span class="input-group-text"><i data-feather="smartphone"></i></span>

                                            </div>

                                            <input type="text" id="phenomena" class="form-control" name="phenomena" placeholder="Phenomena" />

                                        </div>

                                    </div>

                                </div>

                            </div>

                            {{-- <div class="col-12">

                                <div class="form-group row">

                                    <div class="col-sm-3 col-form-label">

                                        <label for="contact-icon">Role</label>

                                    </div>

                                    <div class="col-sm-9">

                                        <div class="input-group input-group-merge">

                                            <div class="input-group-prepend">

                                                <span class="input-group-text"><i data-feather="smartphone"></i></span>

                                            </div>

                                            <select name="edit_role" id="edit_role" class = "form-control">

                                                <option value="1">Admin</option>

                                                <option value="2">Employee</option>

                                                <option value="3">Client</option>

                                            </select>

                                            
                                        </div>

                                    </div>

                                </div>

                            </div> --}}

                            
                            <div class="col-sm-9 offset-sm-3">

                    <button type="submit" class="btn btn-primary mr-1">Edit Company</button>

                    <button type="reset" class="btn btn-outline-secondary">Reset</button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>     
            {{-- @if(session()->has('check_email'))
                <div class="alert alert-danger">
                {{ session()->get('check_email') }}
                </div>
            @endif                    --}}

<section id="responsive-datatable">

    <div class="row">

        <div class="col-12">

            <div class="card">

                <div class="card-header border-bottom">

                    <h4 class="card-title">Companies</h4>

                </div>

                <div class="card-header border-bottom">

                    <button type="button" class="btn btn-outline-primary" 
                                        data-toggle="modal" data-target="#inlineForm">

                        Add Company

                    </button>

                    @if(session('msg'))

                    <div class="alert alert-primary" role="alert">

                        <p> {{session('msg')}} </p>

                    </div>  

                @endif

                </div>

                <div class="card-datatable">

                    <table class="dt-responsive table" id = "show_users" >

                        <thead>

                            <tr>

                                <th>#</th>

                                <th>Company Email</th>

                                <th>Company Name</th>

                                <th>Company Phone</th>
                
                                <th>Company Address</th>

                                <th>Company Phenomena </th>

                                <th>Action</th>

                            </tr>

                        </thead>

                        <tbody>
<?php $j=0; ?>
                        @foreach ($company  as $i )
                            
                            <tr>
                               
                                <td>{{ $j++ }}</td> 
                                <td><a href=""></a>{{ $i->company_email }}</td>

                                <td>{{ $i->company_name }}</td>
                                <td>{{ $i->company_phone }}</td>
                  
                                <td>{{ $i->company_address }}</td>  
                                <td>{{ $i->company_phenomena }}</td> 
                                {{-- <?php
                            //    $created_at = strtotime($emp->created_at);
                              //  $date=date('d-M-Y', $created_at);
                                ?> --}}
                                <td>

                    <button type="button" class="btn btn-sm btn-outline-primary" 
                           data-toggle="modal" data-target="#edit_model" 

                                   onClick = "on_user_edit( 

                                         {{$i->id}},

                                        '{{$i->company_email}}',

                                        '{{$i->company_name}}',

                                        '{{$i->company_address}}',

                                        '{{$i->company_phenomena}}',

                                        '{{ $i->company_phone }}'

                                         )"> 

                                    Edit Company

                                    </button>
                                    <a class="btn btn-sm btn-outline-primary" 
                                    href="{{ route('delete_company', $i->id ) }}">
                                    Delete</a>
                                    {{-- </button> <a class="btn btn-sm btn-outline-primary" 
                                    href="">Salary</a> --}}
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

@stop

@section('js_link')

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

<script> 

$(document).ready( function () {

    $('#show_users').DataTable();

} );

function on_user_edit(id,email,name,address,phenomena,phone){

      document.getElementById('id').value = id;

      document.getElementById('edit_username').value = name;

      document.getElementById('edit_email').value = email;
     
      document.getElementById('phone').value = phone;

      document.getElementById('address').value =address;

      document.getElementById('phenomena').value = phenomena;

      

    //   if(role == 'Employee')

    //   {

    //     document.getElementById('edit_role').selectedIndex = "1";

    //   }

}

</script>
<script type=text/javascript>
function show(){
         document.getElementById('fix').style.visibility='visible';
}

</script>
<script>
    function clean(){
         document.getElementById('fix').style.visibility='hidden';

}

</script>




@stop