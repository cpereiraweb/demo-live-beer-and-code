<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('studentClass.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.studentClass.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="studentClass.name">
        <div class="validation-message">
            {{ $errors->first('studentClass.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.studentClass.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('studentClass.active') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="active" id="active" wire:model.defer="studentClass.active">
        <label class="form-label inline ml-1" for="active">{{ trans('cruds.studentClass.fields.active') }}</label>
        <div class="validation-message">
            {{ $errors->first('studentClass.active') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.studentClass.fields.active_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('studentClass.notes') ? 'invalid' : '' }}">
        <label class="form-label" for="notes">{{ trans('cruds.studentClass.fields.notes') }}</label>
        <textarea class="form-control" name="notes" id="notes" wire:model.defer="studentClass.notes" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('studentClass.notes') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.studentClass.fields.notes_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.student-classes.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>