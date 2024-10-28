<?php

namespace App\Http\Livewire;

use App\Models\LGA;
use App\Models\User;
use App\Models\Photo;
use App\Models\State;
use App\Models\Service;
use Livewire\Component;
use App\Models\SubService;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Home extends Component
{
    use WithFileUploads;

    public $step = 1;
    public $business_name;
    public $work_phone_no;
    public $state;
    public $lga = [];
    public $service;
    public $subservice = [];
    public $yrs_of_expertise;
    public $work_address;
    public $bio;
    public $passport;
    public $id_doc; 
    public $work_images = [];

    public function updatedState($stateId)
    {
        $this->lgas = LGA::where('state_id', $stateId)->get(); // Get LGAs based on the selected state
        $this->lga = null; // Reset the LGA selection
    }
    public function updatedService($serviceId)
    {
        $this->subservices = SubService::where('service_id', $serviceId)->get(); // Get LGAs based on the selected state
        $this->subservice = null; // Reset the LGA selection
    }
    public function next()
    {
        if($this->step > 1){
            $this->validateCurrentStep();
            $this->step++;
        }else{
            $this->step++;
        }

        // dd($this->step);
    }
    public function previous()
    {
        $this->step--;
    }
    protected function validateCurrentStep()
    {
        $rules = [];
        if ($this->step == 2) {
            $rules = [
                'business_name' => 'required',
                'work_address' => 'required',
                'state' => 'required',
                'lga' => 'required',
                'service' => 'required',
                'subservice' => 'required',
                'work_phone_no' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:15',
                'yrs_of_expertise' => 'required',
                'bio' => 'required'
            ];
        } elseif ($this->step == 3) {
            $rules = [
                'passport' => 'required',
                'id_doc' => 'required'
            ];

        }
        $this->validate($rules);
    }

    public function submit()
    {
        $this->validate([
            'work_images' => 'required|array'
        ]);
        // dd($this->lga);

        if ($this->passport) {
            $filename = 'passport-' . Str::random(10) . '.' . $this->passport->extension();
            $path = $this->passport->storeAs('uploads/passport', $filename, 'public');
            $url = Storage::url($path);
            $this->passport = $url;
        }
        if ($this->id_doc) {
            $filename = 'id_doc-' . Str::random(10) . '.' . $this->id_doc->extension();
            $path = $this->id_doc->storeAs('uploads/id_doc', $filename, 'public');
            $url = Storage::url($path);
            $this->id_doc = $url;
        }
        // dd(Auth()->user()->id);
        $user = User::where('id', auth()->id())->update([
            'business_name' => $this->business_name,
            'work_address' => $this->work_address,
            'state_id' => $this->state,
            'lga_id' => $this->lga,
            'service_id' => $this->service,
            'subservice_id' => $this->subservice,
            'work_phone_no' => $this->work_phone_no,
            'yrs_of_expertise' => $this->yrs_of_expertise,
            'bio' => $this->bio,
            'passport' => $this->passport,
            'id_doc' => $this->id_doc,
            'is_profile_complete' => 1
        ]);


        if($this->work_images) {
            foreach ($this->work_images as $wrk_img):
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
            'message' => 'Profile Updated Successfully',
        ]);

    }
    public function render()
    {
        $states = State::all();
        $lgas = LGA::all();
        $services = Service::all();
        $subservices = SubService::all();
        return view('livewire.home.home', ['states' => $states, 'lgas' => $lgas, 'services' => $services, 'subservices' => $subservices])->layout('components.dashboard.dashboard-artisan');
    }
}
