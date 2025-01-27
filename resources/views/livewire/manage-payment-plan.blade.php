<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0 font-size-18">Manage Payment PLan</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li> -->
                        <!-- <li class="breadcrumb-item active">Welcome to Tax Drive Dashboard</li> -->
                    </ol>
                </div>

            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="service">Name</label>
                        <input type="text" wire:model="name" placeholder="name" class="form-control">
                        @error('name')
                        <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="state">Description</label>
                        <textarea wire:model="body" placeholder="description" cols="20" rows="5" class="form-control"></textarea>
                        @error('description')
                        <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="duration">Payment Duration</label>
                        <select wire:model="duration" class="form-select">
                            <option value="" disabled selected>::Select an option::</option>
                            <option value="none">None</option>
                            <option value="1">1 Month</option>
                            <option value="3">3 Month</option>
                            <option value="6">6 Month</option>
                            <option value="12">12 Month (1 Year)</option>
                        </select>
                        @error('duration')
                        <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="payment-type">Payment Type</label>
                        <select wire:model="payment_type" class="form-select">
                            <option value="" disabled selected>::Select an option::</option>
                            <option value="free">Free</option>
                            <option value="paid">Paid</option>
                        </select>
                        @error('payment_type')
                        <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="form-groiup mt-2">
                        <input type="checkbox" wire_model="is_active"> Activate Payment Plan
                    </div>

                    <button class="btn btn-primary btn-sm mt-3" wire:click="submit">Submit</button>

                </div>

            </div>
        </div>
        <div class="col-md-8">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <tr>
                        <th>#ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Payment Type</th>
                    </tr>
                    @forelse($paymentPlans as $paymentPlan)
                        <tr>
                            <td>{{ ($paymentPlans->currentPage() - 1) * $paymentPlans->perPage() + $loop->iteration }}</td>
                            <td>{{ $paymentPlan->name }}</td>
                            <td>{{ $paymentPlan->description }}</td>
                            <td>{{ $paymentPlan->amount }}</td>
                            <td>{{ $paymentPlan->payment_type }}</td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-danger">No record found</td>
                    </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
</div>
