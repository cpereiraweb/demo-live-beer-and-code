<?php

namespace App\Http\Livewire\Interest;

use App\Models\Interest;
use Livewire\Component;

class Edit extends Component
{
    public Interest $interest;

    public function mount(Interest $interest)
    {
        $this->interest = $interest;
    }

    public function render()
    {
        return view('livewire.interest.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->interest->save();

        return redirect()->route('admin.interests.index');
    }

    protected function rules(): array
    {
        return [
            'interest.name' => [
                'string',
                'required',
                'unique:interests,name,' . $this->interest->id,
            ],
        ];
    }
}
