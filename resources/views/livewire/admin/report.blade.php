<div>
    <div class="flex justify-between items-end">
        <div class="flex space-x-3">
            <x-datetime-picker label="" placeholder="Date From" wire:model.defer="normalPicker" />
            <x-datetime-picker label="" placeholder="Date To" wire:model.defer="normalPicker" />
        </div>
        <div>
            <x-button label="Export" dark icon="printer" />
        </div>
    </div>
    <div class="mt-5">
        <table id="example" class="table-auto mt-5" style="width:100%">
            <thead class="font-normal">
                <tr>
                    <th class="border-2  text-left px-2 text-sm font-semibold text-gray-700 py-2">CLIENT</th>
                    <th class="border-2  text-left px-2 text-sm font-semibold text-gray-700 py-2">
                        ROOM
                    </th>
                    <th class="border-2  text-left px-2 text-sm font-semibold text-gray-700 py-2">
                        RANGE STAY
                    </th>
                    <th class="border-2  text-left px-2 text-sm font-semibold text-gray-700 py-2">
                        PRICE
                    </th>
                    <th class="border-2  text-left px-2 text-sm font-semibold text-gray-700 py-2">
                        REMARKS
                    </th>

                    <th class="border-2  text-left px-2 text-sm font-semibold text-gray-700 py-2">
                        ASSIST BY
                    </th>
                </tr>
            </thead>
            <tbody class="">
                @foreach ($reservations as $item)
                    <tr>
                        <td class="border-2  text-gray-700  px-3 py-1">{{ $item->fullname }}</td>
                        <td class="border-2  text-gray-700  px-3 py-1">{{ $item->room->name }}</td>
                        <td class="border-2  text-gray-700  px-3 py-1">{{ $item->date_from }} -
                            {{ $item->date_to }}
                        </td>
                        <td class="border-2  text-gray-700  px-3 py-1">
                            &#8369;{{ number_format($item->room->price, 2) }}
                        </td>
                        <td class="border-2  text-gray-700  px-3 py-1"></td>
                        <td class="border-2  text-gray-700  px-3 py-1"></td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3" class="border-2  text-gray-700  px-3 py-1">
                        <div class="flex justify-end">
                            TOTAL:
                        </div>
                    </td>
                    <td class="border-2  text-gray-700  px-3 py-1">
                        @php
                            $total = 0;
                            foreach ($reservations as $record) {
                                $total += $record->room->price;
                            }
                            echo '&#8369;' . number_format($total, 2);
                        @endphp
                    </td>
                    <td class="border-b-2   text-gray-700  px-3 py-1"></td>
                    <td class="border-b-2 border-r-2  text-gray-700  px-3 py-1"></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
