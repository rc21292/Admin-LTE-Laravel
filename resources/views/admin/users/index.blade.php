@extends('layouts.master')
@section('content')
@can('users_manage')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1> {{ trans('cruds.user.title_singular') }} {{ trans('global.list') }}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
          <li class="breadcrumb-item active"> {{ trans('cruds.user.title_singular') }} {{ trans('global.list') }}</li>
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
      <h3 class="card-title">{{ trans('cruds.user.title_singular') }} {{ trans('global.list') }}</h3>
      <a class="btn btn-success float-right" href="{{ route('admin.users.create') }}">
        {{ trans('global.add') }} {{ trans('cruds.user.title_singular') }}
    </a>
</div>
<div class="card-body">
   <div class="table-responsive">
    <table class=" table table-bordered table-striped table-hover datatable datatable-Role">
        <thead>
            <tr>
                <th width="10">

                </th>
                <th>
                    {{ trans('cruds.user.fields.id') }}
                </th>
                <th>
                    {{ trans('cruds.user.fields.name') }}
                </th>
                <th>
                    {{ trans('cruds.user.fields.email') }}
                </th>
                <th>
                    {{ trans('cruds.user.fields.roles') }}
                </th>
                <th>
                    &nbsp;
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $key => $user)
            <tr data-entry-id="{{ $user->id }}">
                <td>

                </td>
                <td>
                    {{ $user->id ?? '' }}
                </td>
                <td>
                    {{ $user->name ?? '' }}
                </td>
                <td>
                    {{ $user->email ?? '' }}
                </td>
                <td>
                    @foreach($user->roles()->pluck('name') as $role)
                    <span class="badge badge-warning">{{ $role }}</span>
                    @endforeach
                </td>
                <td>
                    <a class="btn btn-xs btn-primary" href="{{ route('admin.users.show', $user->id) }}">
                        {{ trans('global.view') }}
                    </a>

                    <a class="btn btn-xs btn-info" href="{{ route('admin.users.edit', $user->id) }}">
                        {{ trans('global.edit') }}
                    </a>

                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                    </form>

                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
<!-- /.card-body -->
<!-- /.card -->
</div>
</section>

@endcan

@endsection
@section('scripts')

@endsection