<?php

namespace App\Http\Livewire;

use App\Models\Tipo_prestamo;
use Livewire\Component;

class StudentsLoans extends Component
{
    public $studentLoans;

    public function mount($studentLoans)
    {
        $this->studentLoans = $studentLoans;
    }

    public function render()
    {
        $type_loan = Tipo_prestamo::all();
        return view('livewire.librarian.students-loans',
            ['type_loan' => $type_loan]
        );
    }
}
