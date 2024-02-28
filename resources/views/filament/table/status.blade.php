<div class="ml-3">
    @switch($getRecord()->status)
        @case('pending')
            <x-badge label="Pending" rounded flat warning />
        @break

        @case('accepted')
            <x-badge label="Accepted" rounded positive flat />
        @break

        @case('checkout')
            <x-badge label="Checkout" rounded negative flat />
        @break

        @default
    @endswitch
</div>
