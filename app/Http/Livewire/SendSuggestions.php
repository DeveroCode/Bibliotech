<?php

namespace App\Http\Livewire;

use App\Mail\SuggetionsMail;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Console\Completion\Suggestion;

class SendSuggestions extends Component
{
    public $suggestion;

    protected $rules = [
        'suggestion' => 'required',
    ];

    public function sendMessage()
    {
        $data = $this->validate();

        $email = 'prestamos_bl@itsncg.edu.mx';
        $message = $data['suggestion'];
        Mail::to($email)->send(new SuggetionsMail($message));

        session()->flash('message', 'Sugerencia enviada con exito');
        $this->reset('suggestion');
    }

    public function render()
    {
        return view('livewire.send-suggestions');
    }
}