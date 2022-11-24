@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.studentClass.title_singular') }}:
                    {{ trans('cruds.studentClass.fields.id') }}
                    {{ $studentClass->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.studentClass.fields.id') }}
                            </th>
                            <td>
                                {{ $studentClass->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.studentClass.fields.name') }}
                            </th>
                            <td>
                                {{ $studentClass->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.studentClass.fields.active') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $studentClass->active ? 'checked' : '' }}>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.studentClass.fields.notes') }}
                            </th>
                            <td>
                                {{ $studentClass->notes }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('student_class_edit')
                    <a href="{{ route('admin.student-classes.edit', $studentClass) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.student-classes.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection