<?php

namespace App\Http\Livewire;

use Exception;
use App\Models\User;
use App\Models\Contact;
use Livewire\Component;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;


class MyContact extends Component
{
    public $name;
    public $email;
    public $phone_no;
    public $message;

    public function submit()
    {

        $data = $this->validate([
            'name' => ['required', 'string'],
            'email' => ['required','email', 'string'],
            'phone_no' => ['required','string'],
            'message' => ['required','string']
        ]);
        try{
        // dd($this->message);
        Mail::to(ENV('FYND_SUPPORT_MAIL'))->send(new ContactMail($this->name, $this->phone_no, $this->email, $this->message));
        Contact::create($data);
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
