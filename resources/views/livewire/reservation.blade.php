<div>
    <div class="grid 2xl:grid-cols-4 grid-cols-1 2xl:gap-5 gap-3">
        <x-input label="Fullname" wire:model="fullname" />
        <x-input label="Present Address" wire:model="address" />
        <x-input label="Contact" wire:model="contact" />
        <x-input label="Email" wire:model="email" />
        <x-input label="Social Media Account" wire:model="social_media" />
    </div>

    <div class="grid 2xl:grid-cols-2 grid-cols-1 mt-5 gap-5">
        <div class=" ">
            <div class="p-5 rounded-xl border-main/85 border grid 2xl:grid-cols-2 grid-cols-1 2xl:gap-5 gap-2">
                <div class="2xl:col-span-4">
                    <h1 class="text-main font-bold">PREFERRED DATE</h1>
                </div>
                <x-datetime-picker label="Date From" without-timezone without-time wire:model="date_from" />
                <x-datetime-picker label="Date To" without-timezone without-time wire:model="date_to" />
            </div>
        </div>
        <div class="border rounded-xl p-5 border-main/85">
            <h1 class="text-main font-bold">RESERVED DATES</h1>
            <ul class="mt-2 space-y-1">
                @forelse ($reserves as $item)
                    <li>{{ \Carbon\Carbon::parse($date_from)->format('F d, Y') }} -
                        {{ \Carbon\Carbon::parse($date_to)->format('F d, Y') }}</li>
                @empty
                    <span class="text-gray-400"> No Reserve dates yet!</span>
                @endforelse

            </ul>
        </div>
    </div>

    <div class="grid 2xl:grid-cols-4 grid-cols-1 2xl:gap-5 mt-5 gap-3">
        <x-native-select label="Select Room" wire:model="room_id">
            <option>Select an Option</option>
            @forelse (\App\Models\Room::get() as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @empty
            @endforelse
        </x-native-select>
    </div>
    <div class="grid 2xl:grid-cols-4 grid-cols-1 2xl:gap-5 mt-5 gap-3">
        <x-native-select label="Mode of Payment" wire:model="mode_of_payment">
            <option>Select an Option</option>
            <option>Paymaya</option>
            <option>Bank</option>
            <option>Gcash</option>
        </x-native-select>
        <x-native-select label="Payment Status" wire:model="payment_status">
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
    <div class="mt-5">
        <x-button label="Submit Reservation" class="bg-main text-white font-semibold hover:bg-main/80"
            spinner="submitReservation" wire:click="submitReservation" />
    </div>
</div>
