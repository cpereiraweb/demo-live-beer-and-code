@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.interest.title_singular') }}:
                    {{ trans('cruds.interest.fields.id') }}
                    {{ $interest->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.interest.fields.id') }}
                            </th>
                            <td>
                                {{ $interest->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.interest.fields.name') }}
                            </th>
                            <td>
                                {{ $interest->name }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('interest_edit')
                    <a href="{{ route('admin.interests.edit', $interest) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.interests.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection