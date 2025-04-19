@extends('admin.admin_master')
@section('admin')

<div class="container-full">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-12">

         <div class="box">
            <div class="box-header with-border">
             <center><h3 class="box-title">View User Details</h3></center>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <center><img class="text-center" src="{{ (!empty($user->profile_img)) ? url($user->profile_img) : url('upload/no_image.jpg') }}"  style="height: 130px; width: 130px;" alt=""></center>
                <br>
                <div class="table-responsive">
                  <table class="table table-bordered table-striped">

                    <tr>
                        <th style="width: 30%">User ID</th>
                        <td>{{$user->id}} </td>
                    </tr>
                   
                   
                    <tr>
                        <th style="width: 30%">Name</th>
                        <td>{{$user->name}} </td>
                    </tr>
                    
                    <tr>
                        <th style="width: 30%">Email </th>
                        <td>{{$user->email}} </td>
                    </tr>
                   
                    <tr>
                        <th style="width: 30%">Joined Date</th>
                        <td>{{$user->created_at->toDateString()}} </td>
                    </tr>

                  </table>
                  <center><a href="{{ route('user.edit',$user->id) }}" class="btn btn-success" title="Edit User Details"><i class="fa fa-pencil"></i>  &nbsp; Edit User Details </a></center>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


        </div>
        <!-- /.col -->





      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

  </div>


@endsection
