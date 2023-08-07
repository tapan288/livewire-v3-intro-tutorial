<?php

namespace App\Livewire\Student;

use App\Livewire\Forms\UpdateStudent;
use App\Models\Section;
use App\Models\Student;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;

class Edit extends Component
{
    use WithFileUploads;

    public Student $student;

    public UpdateStudent $form;

    #[Rule('required')]
    public $class_id;

    public $sections = [];

    public function mount()
    {
        $this->form->setStudent($this->student);

        $this->fill(
            $this->student->only('class_id'),
        );

        $this->sections = Section::where('class_id', $this->student->class_id)->get();
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.student.edit', [
            'classes' => \App\Models\Classes::all(),
        ]);
    }

    public function updatedClassId($value)
    {
        $this->sections = Section::where('class_id', $value)->get();
    }

    public function update()
    {
        $this->validate();

        $this->form->update($this->class_id);

        return redirect()->route('students.index')
            ->with('status', 'Student details updated successfully.');
    }
}
