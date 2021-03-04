@extends('layouts.master')
@section('content')
@can('users_manage')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1> {{ trans('cruds.role.title_singular') }} {{ trans('global.list') }}</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
          <li class="breadcrumb-item active"> {{ trans('cruds.role.title_singular') }} {{ trans('global.list') }}</li>
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
      <h3 class="card-title">{{ trans('cruds.role.title_singular') }} {{ trans('global.list') }}</h3>
      <a class="btn btn-success float-right" href="{{ route('admin.roles.create') }}">
        {{ trans('global.add') }} {{ trans('cruds.role.title_singular') }}
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
                {{ trans('cruds.role.fields.id') }}
              </th>
              <th>
                {{ trans('cruds.role.fields.title') }}
              </th>
              <th>
                {{ trans('cruds.role.fields.permissions') }}
              </th>
              <th>
                &nbsp;
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach($roles as $key => $role)
            <tr data-entry-id="{{ $role->id }}">
              <td>

              </td>
              <td>
                {{ $role->id ?? '' }}
              </td>
              <td>
                {{ $role->name ?? '' }}
              </td>
              <td>
                @foreach($role->permissions()->pluck('name') as $permission)
                <span class="badge badge-info">{{ $permission }}</span>
                @endforeach
              </td>
              <td>
                <a class="btn btn-xs btn-primary" href="{{ route('admin.roles.show', $role->id) }}">
                  {{ trans('global.view') }}
                </a>

                <a class="btn btn-xs btn-info" href="{{ route('admin.roles.edit', $role->id) }}">
                  {{ trans('global.edit') }}
                </a>

                <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
  </div>
</section>
@endcan
@endsection
@section('scripts')

@endsection