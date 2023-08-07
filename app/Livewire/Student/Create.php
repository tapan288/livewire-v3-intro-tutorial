<?php

namespace App\Livewire\Student;

use App\Models\Student;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    #[Rule('required|min:3')]
    public $name;

    #[Rule('required|email')]
    public $email;

    #[Rule('required|image')]
    public $image;

    #[Rule('required|exists:classes')]
    public $class_id;

    #[Rule('required|exists:sections')]
    public $section_id;

    public function render()
    {
        return view('livewire.student.create', [
            'classes' => \App\Models\Classes::all(),
        ]);
    }

    public function save()
    {
        $this->validate();


        $student = Student::create(
            $this->only(['title', 'email', 'image', 'class_id', 'section_id'])
        );

        $student
            ->addMedia($this->image)
            ->toMediaCollection();

        return redirect(route('students.index'))
            ->with('status', 'Student successfully created.');
    }
}
