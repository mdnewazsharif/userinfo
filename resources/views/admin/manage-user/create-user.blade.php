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
                <h3 class="box-title">Create New User</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <form method="POST" action="{{route('user.store')}}">
                    @csrf

                        <div class="col-12">

                          
                            <div class="form-group">
                                <h5>Full Name</h5>
                                <div class="controls">
                                    <input type="text" name="name" class="form-control" >
                                </div>
                                @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <h5>Email</h5>
                                <div class="controls">
                                    <input type="email" name="email" class="form-control" >
                                </div>
                                @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror

                            </div>

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
                                <center> <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Save"></center>



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

    <script>
        $(document).ready(function(){
            $(".bkash-box").hide();
            $(".nagad-box").hide();
            $(".binance-box").hide();
            
            $( "#is_agent" ).change(function() {
                var id = $("#is_agent").val();
               if(id == 1){
                    $(".bkash-box").show();
                    $(".nagad-box").show();
                    $(".binance-box").show();
               } else{
                    $(".bkash-box").hide();
                    $(".nagad-box").hide();
                    $(".binance-box").hide();
                    
               }
            });
        });
    </script>



@endsection
