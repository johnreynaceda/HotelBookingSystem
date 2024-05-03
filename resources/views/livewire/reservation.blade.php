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
                <x-datetime-picker label="Date From" :min="now()->subDays(1)" without-timezone without-time
                    wire:model.live="date_from" />
                <x-datetime-picker label="Date To" :min="$date_from" without-timezone without-time
                    wire:model="date_to" />
            </div>
        </div>
        <div class="border rounded-xl p-5 border-main/85">
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
        </div>
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
                <x-native-select label="Mode of Payment" wire:model="mode_of_payment">
                    <option>Select an Option</option>
                    <option>Paymaya</option>
                    <option>Bank</option>
                    <option>Gcash</option>
                </x-native-select>
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
                                amount({{ \App\Models\Room::where('id', $room_id)->first()->price ?? '' }}) * Number of
                                Days({{ $number_of_days }}) = </h1>
                            <h1 class="font-bold text-red-500">&#8369;{{ number_format($this->amount, 2) }}</h1>
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
            <div class="border rounded-lg border-main/85 p-3">
                <h1 class="font-black text-main">
                    Important Reminders about Reservation:</h1>
                <div class="mt-2 space-y-3">
                    <p class="text-justify">
                        <span class="font-bold text-main">Reservation Fee:</span> Please note that the reservation fee
                        is
                        non-refundable. Once the reservation is
                        made and the fee is paid, it cannot be refunded under any circumstances. Please ensure your
                        plans
                        are firm before proceeding with the reservation.
                    </p>

                    <p class="text-justify">
                        <span class="font-bold text-main"> Confirmation:</span> Your reservation will only be confirmed
                        upon
                        receipt of the
                        reservation fee.
                        Without
                        the fee, the reservation is not considered valid.
                    </p>

                    <p class="text-justify">
                        <span class="font-bold text-main"> Cancellation Policy:</span> In case of any changes to your
                        plans,
                        please inform us as
                        soon as possible.
                        While the reservation fee is non-refundable, we may be able to accommodate changes based on
                        availability and our cancellation policy.
                    </p>

                    <p class="text-justify">
                        <span class="font-bold text-main">Payment:</span> The reservation fee must be paid in full at
                        the time of
                        booking to secure
                        your
                        reservation.
                        Any outstanding balances must be settled according to the terms and conditions outlined in your
                        reservation agreement.
                    </p>

                    <p class="text-justify">
                        <span class="font-bold text-main"> Reservation Duration:</span> Your reservation is valid for
                        the
                        agreed-upon dates and
                        times only.
                        Failure to
                        adhere to these dates may result in cancellation of the reservation without refund of the
                        reservation fee.
                    </p>

                    <p class="text-justify">
                        <span class="font-bold text-main">Contact Information: </span> Please ensure that your contact
                        information
                        provided during
                        the reservation
                        process is accurate and up-to-date. This will enable us to reach you promptly regarding any
                        updates
                        or changes to your reservation.
                    </p>

                    <p class="text-justify">
                        <span class="font-bold text-main">
                            Terms and Conditions:
                        </span> By proceeding with the reservation and paying the reservation fee, you
                        acknowledge and agree to abide by the terms and conditions outlined by the reservation provider.
                        These terms and conditions govern the reservation process and your stay.
                    </p>

                    <p class="text-justify">
                        <span class="font-bold text-main">
                            Additional Charges: </span> Any additional services or charges incurred during your stay
                        will be billed
                        separately and must be settled before check-out.
                    </p>

                    <p class="text-justify">
                        <span class="font-bold text-main">
                            Amendments:</span> Any amendments to your reservation, including changes to dates or
                        accommodation
                        types,
                        may be subject to availability and additional fees. Please contact us directly to discuss any
                        necessary changes.
                    </p>

                    <p class="text-justify">
                        <span class="font-bold text-main">
                            Enjoy Your Stay:</span> We hope you have a pleasant and enjoyable experience during your
                        stay with us.
                        If
                        you have any questions or concerns, please don't hesitate to contact our reservations team for
                        assistance.
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>
