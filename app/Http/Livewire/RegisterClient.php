<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Need;
use App\Models\Payslip;
use App\Models\OtherDoc;
use App\Models\User;
use App\Models\Biometric;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class RegisterClient extends Component
{
    use WithFileUploads;
    public $step = 1;
    public $category;
    public $name;
    public $email;
    public $dob;
    public $phone_no;
    public $address;
    public $workplace;
    public $state;
    public $country;
    public $nok_name;
    public $nok_email;
    public $nok_phone_no;
    public $nok_address;
    public $payslip = [];
    public $existingPayslips = [];
    public $cos;
    public $existingcos = [];
    public $biometric = [];
    public $existingBiometrics = [];
    public $otherDoc = [];
    public $existingOtherDocs = [];
    public $needs = ['']; // Initialize with one field by default
    public $maxFields = 5;
    public $comment;

    public function addField()
    {
        if (count($this->needs) < $this->maxFields) {
            $this->needs[] = '';
        }
    }

    public function removeField($index)
    {
        if (count($this->needs) > 1) {
            unset($this->needs[$index]);
            $this->needs = array_values($this->needs); // Re-index the array
        }
    }

    public function nextStep()
    {
        $this->validateCurrentStep();
        $this->step++;
    }

    public function previousStep()
    {
        $this->step--;
    }
    protected function validateCurrentStep()
    {
        $rules = [];
        if ($this->step == 1) {
            $rules = [
                'category' => 'required',
                'name' => 'required',
                'email' => ['required', 'email', 'unique:users', 'min:2'],
                'dob' => 'required',
                'workplace' => 'required',
                'address' => 'required',
                'state' => 'required',
                'phone_no' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:15',
                'country' => 'required'
            ];
        } elseif ($this->step == 2) {
            $rules = [
                'nok_name' => 'required',
                'nok_email' => 'required',
                'nok_phone_no' => 'required',
                'nok_address' => 'required'
            ];
        } elseif ($this->step == 3) {
            $rules = [
                'needs.*' => 'required|min:3', // Ensure each need is required and has a minimum length
            ];

        } elseif ($this->step == 4) {
            $rules = [
                'payslip.*' => 'required|min:3',
                'payslip' => 'required|array|max:5',
                'cos' => 'required',
                'biometric.*' => 'required|min:3',
                'biometric' => 'required|array|max:2',
                'otherDoc.*' => 'required|min:3',
                'otherDoc' => 'required|array|max:10'
            ];


        } elseif($this->step == 5){
            $rules = [
                'comment' => 'required'
            ];
        }
        $this->validate($rules);
    }
    public function submit()
    {
        try{
            $rules = [
                'category' => 'required',
                'name' => 'required',
                'email' => ['required', 'email', 'unique:users', 'min:2'],
                'dob' => 'required',
                'address' => 'required',
                'workplace' => 'required',
                'state' => 'required',
                'phone_no' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:15',
                'country' => 'required',
                'nok_name' => 'required',
                'nok_email' => 'required',
                'nok_phone_no' => 'required',
                'nok_address' => 'required',
                'needs.*' => 'required|min:3',
                'payslip.*' => 'required|min:3',
                'payslip' => 'required|array|max:5',
                'cos' => 'required',
                'biometric.*' => 'required|min:3',
                'biometric' => 'required|array|max:2',
                'otherDoc.*' => 'required|min:3',
                'otherDoc' => 'required|array|max:10',
                'cos' => 'required',
                'comment' => 'required'
            ];
            if ($this->cos) {
                $filename = 'cos-' . Str::random(10) . '.' . $this->cos->extension();
                $path = $this->cos->storeAs('uploads/cos', $filename, 'public');
                $url = Storage::url($path);
                $this->cos = $url;
            }
            $user = User::create([
                'category_id' => $this->category,
                'name' => $this->name,
                'email' => $this->email,
                'dob' => $this->dob,
                'address' => $this->address,
                'workplace' => $this->workplace,
                'state' => $this->state,
                'phone_no' => $this->phone_no,
                'country' => $this->country,
                'nok_name' => $this->nok_name,
                'nok_email' => $this->nok_email,
                'nok_phone_no' => $this->nok_phone_no,
                'nok_address' => $this->nok_address,
                'cos' => $this->cos,
                'comment' => $this->comment,
                'registered_by' => Auth()->user()->id
            ]);

            foreach ($this->needs as $need) {
                Need::create([
                    'user_id' => $user->id,
                    'need' => $need
                ]);
            }

            if($this->payslip) {
                foreach ($this->payslip as $payslipDoc):
                    $filename = 'Payslip-' . Str::random(10) . '.' . $payslipDoc->extension();
                    $path = $payslipDoc->storeAs('uploads/payslip', $filename, 'public');
                    $storedPayslip = Storage::url($path);
                    Payslip::create([
                        'user_id' => $user->id,
                        'image_path' => $storedPayslip
                    ]);
                endforeach;
            }
            if($this->biometric) {
                foreach ($this->biometric as $biometricDoc):
                    $filename = 'biometric-' . Str::random(10) . '.' . $biometricDoc->extension();
                    $path = $biometricDoc->storeAs('uploads/biometric', $filename, 'public');
                    $storedBiometric = Storage::url($path);
                    Biometric::create([
                        'user_id' => $user->id,
                        'image_path' => $storedBiometric
                    ]);
                endforeach;
            }
            if($this->otherDoc) {
                foreach ($this->otherDoc as $otherDocs):
                    $filename = 'OtherDoc-' . Str::random(10) . '.' . $otherDocs->extension();
                    $path = $otherDocs->storeAs('uploads/otherdoc', $filename, 'public');
                    $storedOthherDoc = Storage::url($path);
                    OtherDoc::create([
                        'user_id' => $user->id,
                        'image_path' => $storedBiometric
                    ]);
                endforeach;
            }

            $this->dispatchBrowserEvent('notify', [
                'type' => 'success',
                'message' => 'Registration completed Successfully',
            ]);
        }catch(Exception $e){
            $this->dispatchBrowserEvent('notify', [
                'type' => 'error',
                'message' => $e->getMessage(),
            ]);
            return;
        }
    }

    public function render()
    {
        return view('livewire.register-client', ['categories' => Category::all()])->layout('components.dashboard.dashboard-master');
    }
}
