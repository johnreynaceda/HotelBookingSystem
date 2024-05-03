<div>
    {{ $this->table }}
    <x-modal wire:model.defer="view_modal" align="center">
        <x-card title="View Details">
            <div class="p-5 grid grid-cols-2 gap-5">
                <div>
                    <h1 class=" text-xs font-semibold uppercase">Fullname</h1>
                    <h1>{{ $reservation_data->fullname ?? '' }}</h1>
                </div>
                <div>
                    <h1 class=" text-xs font-semibold uppercase">Address</h1>
                    <h1>{{ $reservation_data->address ?? '' }}</h1>
                </div>
                <div>
                    <h1 class=" text-xs font-semibold uppercase">contact</h1>
                    <h1>{{ $reservation_data->contact ?? '' }}</h1>
                </div>
                <div>
                    <h1 class=" text-xs font-semibold uppercase">email</h1>
                    <h1>{{ $reservation_data->email ?? '' }}</h1>
                </div>
                <div>
                    <h1 class=" text-xs font-semibold uppercase">social media</h1>
                    <h1>{{ $reservation_data->social_media ?? '' }}</h1>
                </div>
                <div>
                    <h1 class=" text-xs font-semibold uppercase">date from</h1>
                    <h1>{{ \Carbon\Carbon::parse($reservation_data->date_from ?? '')->format('F d, Y') }}</h1>
                </div>
                <div>
                    <h1 class=" text-xs font-semibold uppercase">date to</h1>
                    <h1>{{ \Carbon\Carbon::parse($reservation_data->date_to ?? '')->format('F d, Y') }}</h1>
                </div>
                <div>
                    <h1 class=" text-xs font-semibold uppercase">room</h1>
                    <h1>{{ $reservation_data->room->name ?? '' }}</h1>
                </div>
                <div>
                    <h1 class=" text-xs font-semibold uppercase">mode of payment</h1>
                    <h1>{{ $reservation_data->mode_of_payment ?? '' }}</h1>
                </div>
                <div>
                    <h1 class=" text-xs font-semibold uppercase">payment status</h1>
                    <h1>{{ $reservation_data->status_of_payment ?? '' }}</h1>
                </div>
                <div></div>
                <div>
                    <h1 class=" text-xs font-semibold uppercase">Amount Paid</h1>
                    <h1>&#8369;{{ number_format($reservation_data->amount ?? 0, 2) }}</h1>
                </div>
                <div>
                    <h1 class=" text-xs font-semibold uppercase">proof of payment</h1>


                    @if ($reservation_data->payment_proof ?? '')
                        <a href="{{ Storage::url($reservation_data->payment_proof ?? '') }}" target="_blank">
                            <img src="{{ Storage::url($reservation_data->payment_proof ?? '') }}" alt="">
                        </a>
                    @else
                        <h1 class="text-sm text-red-500">No proof of payment because the transaction is WALK IN</h1>
                    @endif
                </div>
            </div>

            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>

    <x-modal wire:model.defer="walkin_modal" max-width="5xl">
        <x-card title="Walk In Transaction">
            <div>
                <div class="grid 2xl:grid-cols-4 grid-cols-1 2xl:gap-5 gap-3">
                    <x-input label="Fullname" wire:model="fullname" />
                    <x-input label="Present Address" wire:model="address" />
                    <x-input label="Contact" wire:model="contact" />
                    <x-input label="Email" wire:model="email" />
                    <x-input label="Social Media Account" wire:model="social_media" />
                </div>

                <div class="grid 2xl:grid-cols-1 mt-5 gap-5">
                    <div class=" ">
                        <div
                            class="p-5 rounded-xl border-main/85 border grid 2xl:grid-cols-2 grid-cols-1 2xl:gap-5 gap-2">
                            <div class="2xl:col-span-4">
                                <h1 class="text-main font-bold">PREFERRED DATE</h1>
                            </div>
                            <x-datetime-picker label="Date From" :min="now()->subDays(1)" without-timezone without-time
                                wire:model.live="date_from" />
                            <x-datetime-picker label="Date To" :min="$date_from" without-timezone without-time
                                wire:model="date_to" />
                        </div>
                    </div>
                    {{-- <div class="border rounded-xl p-5 border-main/85">
                        <h1 class="text-main font-bold">RESERVED DATES</h1>
                        <ul class="mt-2 space-y-1">
                            @forelse ($reserves as $item)
                                <li>{{ \Carbon\Carbon::parse($item->date_from)->format('F d, Y') }} -
                                    {{ \Carbon\Carbon::parse($item->date_to)->format('F d, Y') }} <span
                                        class="font-bold uppercase text-main">({{ $item->room->name }})</span></li>
                            @empty
                                <span class="text-gray-400"> No Reserve dates yet!</span>
                            @endforelse

                        </ul>
                    </div> --}}
                </div>

                <div class="grid grid-cols-2 gap-5">
                    <div>
                        <div class="grid 2xl:grid-cols-2 grid-cols-1 2xl:gap-5 mt-5 gap-3">
                            <x-native-select label="Select Room" wire:model.live="room_id">
                                <option>Select an Option</option>
                                @forelse (\App\Models\Room::get() as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @empty
                                @endforelse
                            </x-native-select>
                            @if ($room_id)
                                <x-input label="Price" disabled
                                    value="₱{{ number_format(\App\Models\Room::where('id', $room_id)->first()->price, 2) }} per day" />
                            @endif

                        </div>
                        <div class="grid 2xl:grid-cols-2 grid-cols-1 2xl:gap-5 mt-5 gap-3">
                            {{-- <x-native-select label="Mode of Payment" wire:model="mode_of_payment">
                                <option>Select an Option</option>
                                <option>Paymaya</option>
                                <option>Bank</option>
                                <option>Gcash</option>
                            </x-native-select> --}}
                            <x-native-select label="Payment Status" wire:model.live="payment_status">
                                <option>Select an Option</option>
                                <option>Fully Paid</option>
                                <option>Downpayment</option>
                            </x-native-select>
                            @if ($payment_status)
                                @if ($payment_status == 'Downpayment')
                                    <div></div>
                                    <x-input prefix="₱" wire:model="amount" label="Amount of Downpayment" />
                                @else
                                    <div></div>
                                    <div>
                                        <h1 class=" text-xs font-semibold uppercase">Room
                                            amount({{ \App\Models\Room::where('id', $room_id)->first()->price ?? '' }})
                                            * Number of
                                            Days({{ $number_of_days }}) = </h1>
                                        <h1 class="font-bold text-red-500">&#8369;{{ number_format($this->amount, 2) }}
                                        </h1>
                                    </div>
                                @endif
                            @endif

                        </div>
                        <div class="grid 2xl:grid-cols-1 grid-cols-1 2xl:gap-5 mt-5 gap-3">
                            <div class="col-span-2">
                                {{ $this->form }}
                            </div>
                        </div>
                        <div class="mt-5">
                            <x-button label="Submit Reservation" dark right-icon="save" spinner="submitReservation"
                                wire:click="submitReservation" />
                        </div>
                    </div>
                    <div class="mt-5">

                    </div>
                </div>
            </div>

            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" />

                </div>
            </x-slot>
        </x-card>
    </x-modal>
</div>
