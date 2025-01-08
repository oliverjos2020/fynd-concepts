<?php

namespace App\Http\Livewire;

use Exception;
use App\Models\User;
use Livewire\Component;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;


class Contact extends Component
{
    public $name;
    public $email;
    public $phone_no;
    public $message;

    public function submit()
    {
        try{
        $data = $this->validate([
            'name' => ['required', 'string'],
            'email' => ['required','email', 'string'],
            'phone_no' => ['required','string'],
            'message' => ['required','string']
        ]);
        // dd($this->message);
        Mail::to(ENV('FYND_SUPPORT_MAIL'))->send(new ContactMail($this->name, $this->phone_no, $this->email, $this->message));
        $this->dispatchBrowserEvent('notify', [
            'type' => 'success',
            'message' => 'Form submitted Successfully',
        ]);
        $this->reset(['name', 'phone_no', 'email', 'message']);
        }catch(Exception $e){
            $this->dispatchBrowserEvent('notify', [
                'type' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }
    public function render()
    {
        return view('livewire.home.contact')->layout('components.home.home-master');
        // return view('livewire.contact');
    }
}
