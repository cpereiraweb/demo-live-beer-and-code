@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.interest.title_singular') }}:
                    {{ trans('cruds.interest.fields.id') }}
                    {{ $interest->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('interest.edit', [$interest])
        </div>
    </div>
</div>
@endsection