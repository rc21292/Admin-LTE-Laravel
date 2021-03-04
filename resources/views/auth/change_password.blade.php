

@extends('layouts.master')
@section('content')

@can('users_manage')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Change Password</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
          <li class="breadcrumb-item active">Change Password</li>
      </ol>
  </div>
</div>
</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Change Password</h3>
      <a class="btn btn-default float-right" href="{{route('admin.home')}}">
        {{ trans('global.back_to_list') }}
    </a>
</div>


<div class="card-body">
    <form action="{{ route('auth.change_password') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group {{ $errors->has('current_password') ? 'has-error' : '' }}">
            <label for="current_password">Current password *</label>
            <input type="password" id="current_password" name="current_password" class="form-control" required>
            @if($errors->has('current_password'))
            <em class="invalid-feedback">
                {{ $errors->first('current_password') }}
            </em>
            @endif
        </div>
        <div class="form-group {{ $errors->has('new_password') ? 'has-error' : '' }}">
            <label for="new_password">New password *</label>
            <input type="password" id="new_password" name="new_password" class="form-control" required>
            @if($errors->has('new_password'))
            <em class="invalid-feedback">
                {{ $errors->first('new_password') }}
            </em>
            @endif
        </div>
        <div class="form-group {{ $errors->has('new_password_confirmation') ? 'has-error' : '' }}">
            <label for="new_password_confirmation">New password confirmation *</label>
            <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control" required>
            @if($errors->has('new_password_confirmation'))
            <em class="invalid-feedback">
                {{ $errors->first('new_password_confirmation') }}
            </em>
            @endif
        </div>
        <div>
            <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
        </div>
    </form>


</div>
</div>
</section>
@endcan
@endsection