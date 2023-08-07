<?php

namespace App\Livewire\Student;

use App\Models\Student;
use Livewire\Component;

class Create extends Component
{
    public $name, $email, $image, $class_id, $section_id;

    public function render()
    {
        return view('livewire.student.create', [
            'classes' => \App\Models\Classes::all(),
        ]);
    }

    public function save()
    {
        Student::create(
            $this->only(['title', 'email', 'image', 'class_id', 'section_id'])
        );

        return redirect(route('students.index'))
            ->with('status', 'Student successfully created.');
    }
}
