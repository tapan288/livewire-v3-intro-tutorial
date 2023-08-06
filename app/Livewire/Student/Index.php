<?php

namespace App\Livewire\Student;

use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.student.index', [
            'students' => \App\Models\Student::paginate(10),
        ]);
    }
}
