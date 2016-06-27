@extends('backend.master')
@section('title', trans('labels.title_list_user'))
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			{{ trans('labels.title_list_user') }}
		</h1>
		<ol class="breadcrumb">
			<li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-dashboard"></i> {{ trans('labels.title_dashboard') }}</a></li>
			<li><a href="{{ url('admin/user') }}">{{ trans('labels.title_user') }}</a></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">

		<div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">
             <a id="btn-add" name="btn-add" class="btn btn-primary btn-md">{{ trans('labels.title_add_user') }}</a>
           </h3>
         </div><!-- /.box-header -->
         <div class="box-body">
          <input type="hidden" id="url" value="{!! url('admin/user') !!}">
          <div class="table-responsive">
           <table class="table table-bordered" id="users-table">
            <thead>
              <tr>
                <th>Id</th>
                <th>User name</th>
                <th>Email</th>
                <th>Address</th>
                <th>phone number</th>
                <th>Actions</th>
              </tr>
            </thead>
          </table>
        </div>

        <!-- Modal (Pop up when detail button clicked) -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">User Add</h4>
              </div>
              <div class="modal-body">
                <form id="frmUsers" name="frmUsers" class="form-horizontal" novalidate="">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                  <div class="form-group error">
                    <label for="username" class="col-sm-3 control-label">Username</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control has-error" id="username" name="username" placeholder="username" value="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="Email" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="firstname" class="col-sm-3 control-label">First name</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First name" value="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="lastname" class="col-sm-3 control-label">Last name</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last name" value="">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="phone" class="col-sm-3 control-label">Phone</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="Phone" name="Phone" placeholder="Phone" value="">
                    </div>
                  </div>

                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes</button>
                <input type="hidden" id="user_id" name="user_id" value="0">
              </div>
            </div>
          </div>
        </div><!-- /.Modal-body -->

      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div><!-- /.col -->
</div><!-- /.row -->

</section><!-- /.content -->
</div><!-- /.content-wrapper -->
@endsection
