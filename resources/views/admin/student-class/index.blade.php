@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.studentClass.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('student_class_create')
                    <a class="btn btn-indigo" href="{{ route('admin.student-classes.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.studentClass.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('student-class.index')

    </div>
</div>
@endsection