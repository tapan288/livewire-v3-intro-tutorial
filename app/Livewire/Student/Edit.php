<?php

namespace App\Livewire\Student;

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

    #[Rule('required|min:3')]
    public $name;

    #[Rule('required|email')]
    public $email;

    #[Rule('nullable|image')]
    public $image;

    #[Rule('required')]
    public $class_id;

    #[Rule('required')]
    public $section_id;

    public $sections = [];

    public function mount()
    {
        $this->fill(
            $this->student->only('name', 'class_id', 'section_id', 'email'),
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

        $this->student->update([
            'name' => $this->name,
            'class_id' => $this->class_id,
            'section_id' => $this->section_id,
            'email' => $this->email,
        ]);

        if ($this->image) {
            $this->student
                ->addMedia($this->image)
                ->toMediaCollection();
        }

        return redirect()->route('students.index')
            ->with('status', 'Student details updated successfully.');
    }
}
