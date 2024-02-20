<div class="ml-3">
    @switch($getRecord()->status)
        @case('pending')
            <x-badge label="Pending" rounded flat warning />
        @break

        @case('accepted')
            <x-badge label="Accepted" rounded positive flat />
        @break

        @default
    @endswitch
</div>
