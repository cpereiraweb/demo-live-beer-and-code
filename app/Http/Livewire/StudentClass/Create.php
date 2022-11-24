<?php

namespace App\Http\Livewire\StudentClass;

use App\Models\StudentClass;
use Livewire\Component;

class Create extends Component
{
    public StudentClass $studentClass;

    public function mount(StudentClass $studentClass)
    {
        $this->studentClass         = $studentClass;
        $this->studentClass->active = true;
    }

    public function render()
    {
        return view('livewire.student-class.create');
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
