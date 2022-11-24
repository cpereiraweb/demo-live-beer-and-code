<?php

namespace App\Http\Livewire\Student;

use App\Models\Student;
use App\Models\StudentClass;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public Student $student;

    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public array $mediaCollections = [];

    public function addMedia($media): void
    {
        $this->mediaCollections[$media['collection_name']][] = $media;
    }

    public function removeMedia($media): void
    {
        $collection = collect($this->mediaCollections[$media['collection_name']]);

        $this->mediaCollections[$media['collection_name']] = $collection->reject(fn ($item) => $item['uuid'] === $media['uuid'])->toArray();

        $this->mediaToRemove[] = $media['uuid'];
    }

    public function getMediaCollection($name)
    {
        return $this->mediaCollections[$name];
    }

    public function mount(Student $student)
    {
        $this->student = $student;
        $this->initListsForFields();
        $this->mediaCollections = [
            'student_photo' => $student->photo,
        ];
    }

    public function render()
    {
        return view('livewire.student.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->student->save();
        $this->syncMedia();

        return redirect()->route('admin.students.index');
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->student->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    protected function rules(): array
    {
        return [
            'student.name' => [
                'string',
                'required',
            ],
            'student.email' => [
                'string',
                'required',
                'unique:students,email,' . $this->student->id,
            ],
            'student.phone' => [
                'string',
                'min:11',
                'max:11',
                'required',
            ],
            'mediaCollections.student_photo' => [
                'array',
                'nullable',
            ],
            'mediaCollections.student_photo.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'student.student_class_id' => [
                'integer',
                'exists:student_classes,id',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['student_class'] = StudentClass::pluck('name', 'id')->toArray();
    }
}
