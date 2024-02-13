<div>
    <div class="grid 2xl:grid-cols-4 grid-cols-1 2xl:gap-5 gap-3">
        <x-input label="Fullname" />
        <x-input label="Present Address" />
        <x-input label="Contact" />
        <x-input label="Email" />
        <x-input label="Social Media Account" />
    </div>

    <div class="grid 2xl:grid-cols-2 grid-cols-1 mt-5 gap-5">
        <div class=" ">
            <div class="p-5 rounded-xl border-main/85 border grid 2xl:grid-cols-2 grid-cols-1 2xl:gap-5 gap-2">
                <div class="2xl:col-span-4">
                    <h1 class="text-main font-bold">PREFERRED DATE</h1>
                </div>
                <x-datetime-picker label="Date From" wire:model.defer="normalPicker" />
                <x-datetime-picker label="Date To" wire:model.defer="normalPicker" />
            </div>
        </div>
        <div class="border rounded-xl p-5 border-main/85">
            <h1 class="text-main font-bold">RESERVED DATES</h1>
            <ul class="mt-2 space-y-1">
                <li>sadasds</li>
                <li>sadasds</li>
                <li>sadasds</li>
                <li>sadasds</li>
                <li>sadasds</li>
                <li>sadasds</li>
                <li>sadasds</li>
                <li>sadasds</li>
            </ul>
        </div>
    </div>

    <div class="grid 2xl:grid-cols-4 grid-cols-1 2xl:gap-5 mt-5 gap-3">
        <x-native-select label="Select Room" wire:model="model">
            <option>Select an Option</option>
            <option>Pending</option>
            <option>Stuck</option>
            <option>Done</option>
        </x-native-select>
    </div>
    <div class="grid 2xl:grid-cols-4 grid-cols-1 2xl:gap-5 mt-5 gap-3">
        <x-native-select label="Mode of Payment" wire:model="model">
            <option>Select an Option</option>
            <option>Paymaya</option>
            <option>Bank</option>
            <option>Gcash</option>
        </x-native-select>
        <x-native-select label="Payment Status" wire:model="model">
            <option>Select an Option</option>
            <option>Fully Paid</option>
            <option>Downpayment</option>
        </x-native-select>
    </div>
    <div class="grid 2xl:grid-cols-4 grid-cols-1 2xl:gap-5 mt-5 gap-3">
        <div class="col-span-2">
            {{ $this->form }}
        </div>
    </div>
</div>
