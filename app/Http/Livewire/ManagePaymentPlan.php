<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\PaymentPlans;
use Livewire\WithPagination;

class ManagePaymentPlan extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name;
    public $description;
    public $duration;
    public $amount;
    public $payment_type;
    public $limit = '10';
    public $is_active;
    protected $queryString = ['limit'];

    public function submit()
    {
        $this->validate([
            'name' => ['required'],
            'description' => ['sometimes'],
            'duration' => ['required'],
            'amount' => ['required'],
            'payment_type' => ['required'],
        ]);

    }

    public function render()
    {
        $paymentPlans = PaymentPlans::query()->latest()->paginate($this->limit);
        return view('livewire.manage-payment-plan', ['paymentPlans' => $paymentPlans])->layout('components.dashboard.dashboard-master');
    }
}
