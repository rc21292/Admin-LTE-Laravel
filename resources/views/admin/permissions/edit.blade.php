@extends('layouts.master')
@section('content')

@can('users_manage')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ trans('global.edit') }} {{ trans('cruds.permission.title_singular') }}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
          <li class="breadcrumb-item active">{{ trans('global.edit') }} {{ trans('cruds.permission.title_singular') }}</li>
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
        <h3 class="card-title">{{ trans('global.edit') }} {{ trans('cruds.permission.title_singular') }}</h3>
      <a class="btn btn-default float-right" href="{{ url()->previous() }}">
        {{ trans('global.back_to_list') }}
    </a>
</div>


<div class="card-body">
    <form action="{{ route("admin.permissions.update", [$permission->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label for="name">{{ trans('cruds.permission.fields.title') }}*</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($permission) ? $permission->name : '') }}" required>
            @if($errors->has('name'))
            <em class="invalid-feedback">
                {{ $errors->first('name') }}
            </em>
            @endif
            <p class="helper-block">
                {{ trans('cruds.permission.fields.title_helper') }}
            </p>
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