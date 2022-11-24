@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.studentClass.title_singular') }}:
                    {{ trans('cruds.studentClass.fields.id') }}
                    {{ $studentClass->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('student-class.edit', [$studentClass])
        </div>
    </div>
</div>
@endsection