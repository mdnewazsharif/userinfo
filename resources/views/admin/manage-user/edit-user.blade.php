@extends('admin.admin_master')
@section('admin')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{--
@php
    dd($site_setting->id);
@endphp --}}
    <div class="container-full">

      <!-- Main content -->
      <section class="content">
        <div class="row">

          <div class="col-8">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Edit User Details</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <form method="POST" action="{{route('user.update')}}">
                    @csrf
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <input type="hidden" name="is_agent" value="{{$user->is_agent}}">
                        
                        <div class="col-12">

                            <div class="form-group">
                                <h5>User Name</h5>
                                <div class="controls">
                                    <input type="text" name="name" value="{{$user->name}}" class="form-control" >
                                </div>
                                @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        

                            <div class="form-group">
                                <h5>Email</h5>
                                <div class="controls">
                                    <input type="text" disabled name="email" value="{{$user->email}}" class="form-control" >
                                </div>
                                @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            


                           <div class="text-xs-right my-3">

                                 <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update "> &nbsp;&nbsp;
                                <a href="{{route('user.all')}}"class="btn btn-rounded btn-info mb-5"  >Go Back</a>

                            </div>
                        </div>
                   </form>
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
