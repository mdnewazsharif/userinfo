
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
                <h3 class="box-title">Update User Password</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <form method="POST" action="{{route('user.password.update')}}">
                    @csrf
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <div class="col-12">

                            <div class="form-group">
                                <h5>New Password</h5>
                                <div class="controls">
                                    <input type="password" name="password" class="form-control" >
                                </div>
                                @error('password')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <h5>Confirm Password</h5>
                                <div class="controls">
                                    <input type="password" name="password_confirmation" class="form-control" >
                                </div>
                                @error('password_confirmation')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>



                           <div class="text-xs-right my-3">

                                 <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update "> &nbsp;&nbsp;
                                <a href="{{route('user.password.reset.view')}}"class="btn btn-rounded btn-info mb-5"  >Go Back</a>

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
