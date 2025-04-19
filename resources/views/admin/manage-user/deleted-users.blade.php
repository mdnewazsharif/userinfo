@extends('admin.admin_master')
@section('admin')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <div class="container-full">

      <!-- Main content -->
      <section class="content">
        <div class="row">

          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Blocked Users</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>

                              <th>SL</th>
                              <th>User ID</th>
                              <th>Image</th>
                              <th>User Name</th>
                              <th>Action</th>

                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($users as $user)
                          <tr>

                            <td>{{$loop->iteration}}</td>
                            <td># {{$user->id}}</td>
                            <td><center><img class="text-center" src="{{ (!empty($user->profile_img)) ? url($user->profile_img) : url('upload/no_image.jpg') }}"  style="height: 50px; width: 50px;" alt=""></center></td>
                            <td>{{$user->name}}</td>


                            <td>
                                <div class="row ">&nbsp;
                                    <a href="{{route('user.deleted.restore', $user->id)}}" title="Restore User" class="btn user.edit btn-primary"><i class="fa fa-undo"></i></a>
                                    &nbsp;
                                    {{-- <a href="{{route('user.delete.permanent', $user->id)}}" title="Delete User Permanently" onclick="return confirm('Are you sure you want to delete this user Permanently? This user can not be restored again.')" class="btn user.edit btn-danger" id="delete"><i class="fa fa-trash"></i></a> --}}
                                </div>

                            </td>

                        </tr>
                          @endforeach


                      </tbody>

                    </table>
                  </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->


          </div>


        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->

    </div>

@endsection
