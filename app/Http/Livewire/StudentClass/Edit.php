<?php

namespace App\Http\Livewire\StudentClass;

use App\Models\StudentClass;
use Livewire\Component;

class Edit extends Component
{
    public StudentClass $studentClass;

    public function mount(StudentClass $studentClass)
    {
        $this->studentClass = $studentClass;
    }

    public function render()
    {
        return view('livewire.student-class.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->studentClass->save();

        return redirect()->route('admin.student-classes.index');
    }

    protected function rules(): array
    {
        return [
            'studentClass.name' => [
                'string',
                'min:3',
                'required',
            ],
            'studentClass.active' => [
                'boolean',
            ],
            'studentClass.notes' => [
                'string',
                'nullable',
            ],
        ];
    }
}
