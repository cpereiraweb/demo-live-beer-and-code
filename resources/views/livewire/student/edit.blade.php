<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('student.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.student.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="student.name">
        <div class="validation-message">
            {{ $errors->first('student.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.student.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('student.email') ? 'invalid' : '' }}">
        <label class="form-label required" for="email">{{ trans('cruds.student.fields.email') }}</label>
        <input class="form-control" type="text" name="email" id="email" required wire:model.defer="student.email">
        <div class="validation-message">
            {{ $errors->first('student.email') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.student.fields.email_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('student.phone') ? 'invalid' : '' }}">
        <label class="form-label required" for="phone">{{ trans('cruds.student.fields.phone') }}</label>
        <input class="form-control" type="text" name="phone" id="phone" required wire:model.defer="student.phone">
        <div class="validation-message">
            {{ $errors->first('student.phone') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.student.fields.phone_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.student_photo') ? 'invalid' : '' }}">
        <label class="form-label" for="photo">{{ trans('cruds.student.fields.photo') }}</label>
        <x-dropzone id="photo" name="photo" action="{{ route('admin.students.storeMedia') }}" collection-name="student_photo" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.student_photo') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.student.fields.photo_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('student.student_class_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="student_class">{{ trans('cruds.student.fields.student_class') }}</label>
        <x-select-list class="form-control" required id="student_class" name="student_class" :options="$this->listsForFields['student_class']" wire:model="student.student_class_id" />
        <div class="validation-message">
            {{ $errors->first('student.student_class_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.student.fields.student_class_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.students.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>