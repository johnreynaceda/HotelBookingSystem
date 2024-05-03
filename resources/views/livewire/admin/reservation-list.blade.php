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
                <div>
                    <h1 class=" text-xs font-semibold uppercase">Amount Paid</h1>
                    <h1>&#8369;{{ $reservation_data->amount ?? '' }}.00</h1>
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

    <x-modal wire:model.defer="payment_modal" max-width="lg" align="center">
        <x-card title="Add Payment">
            Room Rate: &#8369;{{ $reservation_data->room->price ?? '' }}.00 |
            {{ \Carbon\Carbon::parse($date_to ?? '')->diffInDays(\Carbon\Carbon::parse($date_froms ?? '')) }}
            days</h1>
            <h1>Total Payment:
                <span class="text-red-600">
                    &#8369;{{ number_format((int) ($reservation_data->room->price ?? '') * (int) \Carbon\Carbon::parse($date_to ?? '')->diffInDays(\Carbon\Carbon::parse($date_froms ?? '')), 2) }}</span>
            </h1>
            <h1 class="mt-2">Total Paid: &#8369;{{ $reservation_data->amount ?? '' }}.00</h1>
            <h1 class="mt-2">Total Balance:
                &#8369;{{ number_format((int) ($reservation_data->room->price ?? '') * (int) \Carbon\Carbon::parse($date_to ?? '')->diffInDays(\Carbon\Carbon::parse($date_froms ?? '')) - ((int) ($reservation_data->amount ?? '')), 2) }}
            </h1>
            <div class="mt-5">
                <x-input label="Amount" wire:model="payment_amount" type="number" />
                <x-textarea wire:model="remarks" label="Remarks" placeholder="Your remarks" />
            </div>
            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button label="Checkout now" slate wire:click="checkout" spinner="checkout" />
                    <x-button flat label="Cancel" x-on:click="close" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>
</div>
