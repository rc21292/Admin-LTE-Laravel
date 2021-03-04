@extends('layouts.master')
@section('content')
@can('users_manage')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ trans('global.show') }} {{ trans('cruds.user.title_singular') }}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
          <li class="breadcrumb-item active">{{ trans('global.show') }} {{ trans('cruds.user.title_singular') }}</li>
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
        <h3 class="card-title">{{ trans('global.show') }} {{ trans('cruds.user.title_singular') }}</h3>
      <a class="btn btn-default float-right" href="{{ url()->previous() }}">
            {{ trans('global.back_to_list') }}
    </a>
</div>

<div class="card-body">
    <div class="mb-2">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('cruds.user.fields.id') }}
                    </th>
                    <td>
                        {{ $user->id }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.user.fields.name') }}
                    </th>
                    <td>
                        {{ $user->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.user.fields.email') }}
                    </th>
                    <td>
                        {{ $user->email }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Roles
                    </th>
                    <td>
                        @foreach($user->roles()->pluck('name') as $role)
                        <span class="label label-info label-many">{{ $role }}</span>
                        @endforeach
                    </td>
                </tr>
            </tbody>
        </table>
        <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
            {{ trans('global.back_to_list') }}
        </a>
    </div>


</div>
</div>
</section>
@endcan
@endsection