@extends('admin.admin_master')
@section('admin')
    <section class="content">

        <!-- Basic Forms -->
         <div class="box">
           <div class="box-header with-border">
             <h4 class="box-title">Admin Password Update</h4>

           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <div class="row">
               <div class="col">
                   <form method="POST" action="{{route('admin.profile.update_password')}}"  >
                    @csrf

                        <div class="col-8">
                            <div class="form-group">
                                <h5>Current Password <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="password" name="current_password" class="form-control" autocomplete="current-password" required >
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>New Password <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="password" name="password" class="form-control" autocomplete="new-password" required >
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Confirm Password <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="password" name="password_confirmation" class="form-control"  autocomplete="new-password" required >
                                </div>
                            </div>
                            
                           <div class="text-xs-right">
                                 <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
                            </div>
                        </div>
                   </form>

               </div>
               <!-- /.col -->
             </div>
             <!-- /.row -->
           </div>
           <!-- /.box-body -->
         </div>
         <!-- /.box -->

       </section>



@endsection
