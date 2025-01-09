<?php

namespace App\Http\Livewire;

use Exception;
use App\Models\LGA;
use App\Models\User;
use App\Models\Photo;
use App\Models\State;
use App\Models\Service;
use Livewire\Component;
use App\Models\SubService;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class MyProfile extends Component
{

    use WithFileUploads;
    public $business_name;
    public $work_address;
    public $work_phone_no;
    public $state;
    public $lga;
    public $service;
    public $subservice;
    public $yrs_of_expertise;
    public $passport;
    public $uploadPassport;
    public $id_doc;
    public $upload_id_doc;
    public $newWorkImages;
    public $photos;
    public $bio;
    public $current_password;
    public $new_password;
    public $new_password_confirmation;

    public function mount()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $this->business_name = $user->business_name;
        $this->work_address = $user->work_address;
        $this->work_phone_no = $user->work_phone_no;
        $this->state = $user->state_id;
        $this->lga = $user->lga_id;
        $this->service = $user->service_id;
        $this->subservice = $user->subservice_id;
        $this->yrs_of_expertise = $user->yrs_of_expertise;
        $this->work_address = $user->work_address;
        $this->passport = $user->passport;
        $this->id_doc = $user->id_doc;
        $this->bio = $user->bio;
        $this->photos = Photo::where('user_id', auth()->user()->id)->get();
    }

    public function changePassword()
    {
        $this->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        // Check if the current password matches the logged-in user's password
        if (!Hash::check($this->current_password, Auth::user()->password)) {
            // session()->flash('error', 'The current password is incorrect.');
            $this->dispatchBrowserEvent('notify', [
                'type' => 'error',
                'message' => 'The current password is incorrect.',
            ]);
            return;
        }

        // Update the user's password
        $user = Auth::user();
        $user->password = Hash::make($this->new_password);
        $user->save();

        // Clear the inputs
        $this->reset(['current_password', 'new_password', 'new_password_confirmation']);
        $this->dispatchBrowserEvent('notify', [
            'type' => 'success',
            'message' => 'Your password has been successfully updated.',
        ]);
    }

    public function saveBusinessInfo()
    {
        // try{
            $this->validate([
                'business_name' => 'required',
                'work_address' => 'required',
                'state' => 'required',
                'lga' => 'required',
                'service' => 'required',
                'subservice' => 'required',
                'yrs_of_expertise' => 'required',
                'bio' => 'required',
                'work_address' => 'required',
                // 'newWorkImages' => 'required|array'
            ]);

            $user = User::where('id', auth()->user()->id)->update([
                'business_name' => $this->business_name,
                'work_address' => $this->work_address,
                'state_id' => $this->state,
                'lga_id' => $this->lga,
                'service_id' => $this->service,
                'subservice_id' => $this->subservice,
                'yrs_of_expertise' => $this->yrs_of_expertise,
                'bio' => $this->bio,
                'work_address' => $this->work_address,
            ]);

            if($this->newWorkImages) {
                Photo::where('user_id', auth()->user()->id)->delete();
                foreach ($this->newWorkImages as $wrk_img):
                    $filename = 'wrk_img-' . Str::random(10) . '.' . $wrk_img->extension();
                    $path = $wrk_img->storeAs('uploads/work_images', $filename, 'public');
                    $storedWrkImg= Storage::url($path);
                    Photo::create([
                        'user_id' => Auth()->user()->id,
                        'url' => $storedWrkImg
                    ]);
                endforeach;
            }
            $this->dispatchBrowserEvent('notify', [
                'type' => 'success',
                'message' => 'Record Updated Successfully',
            ]);

    }

    public function uploadDocuments()
    {
        if ($this->uploadPassport) {
            $filename = 'passport-' . Str::random(10) . '.' . $this->uploadPassport->extension();
            $path = $this->uploadPassport->storeAs('uploads/passport', $filename, 'public');
            $url = Storage::url($path);
            $this->passport = $url;
        }

        if ($this->upload_id_doc) {
            $filenameI = 'id_doc-' . Str::random(10) . '.' . $this->upload_id_doc->extension();
            $path = $this->upload_id_doc->storeAs('uploads/id_doc', $filenameI, 'public');
            $url = Storage::url($path);
            $this->id_doc = $url;
        }

        $user = User::where('id', auth()->user()->id)->update([
            'passport' => $this->passport,
            'id_doc' => $this->id_doc
        ]);

        $this->dispatchBrowserEvent('notify', [
            'type' => 'success',
            'message' => 'Document Updated Successfully',
        ]);
        redirect('/profile');
    }
    public function render()
    {

        // dd($this->uploadPassport);
        // $photos =
        $user = User::where('id', auth()->user()->id)->first();
        $states = State::all();
        $lgas = LGA::all();
        $services = Service::all();
        $subservices = SubService::all();
        return view('livewire.my-profile', ['user' => $user, 'states' => $states, 'lgas' => $lgas, 'services' => $services, 'subservices' => $subservices])->layout('components.dashboard.dashboard-artisan');;
    }
}
