@extends('admin.admin_master')
@section('admin')
<section class="content">
    <div class="row">


        <div class="col-xl-4 col-md-6 col-12">
            <div class="box overflow-hidden pull-up">
                <div class="box-body">
                    <center>
                        <div class="icon bg-primary-light rounded w-60 h-60">
                            <i class="fa fa-users font-size-24"  aria-hidden="true"></i>
                        </div>
                    </center>

                    <div>
                    <center> <p class="text-mute mt-20 mb-0 font-size-16">Total User</p></center>
                    <center><h3 class="text-white mb-0 font-weight-500"><a class="text-white" href="{{route('user.all')}}">{{number_format($total_user_count)}}</a></h3></center>
                    </div>
                </div>
            </div>
        </div>

        

        <div class="col-xl-4 col-md-6 col-12">
            <div class="box overflow-hidden pull-up">
                <div class="box-body">
                    <center>
                        <div class="icon bg-primary-light rounded w-60 h-60">
                            <i class="fa fa-users font-size-24"  aria-hidden="true"></i>
                        </div>
                    </center>

                    <div>
                    <center> <p class="text-mute mt-20 mb-0 font-size-16">Blocked Users</p></center>
                    <center><h3 class="text-white mb-0 font-weight-500"><a class="text-white" href="{{route('user.deleted.all')}}">{{number_format($blocked_user_count)}}</a></h3></center>
                    </div>
                </div>
            </div>
        </div>




    </div>
</section>
@endsection
