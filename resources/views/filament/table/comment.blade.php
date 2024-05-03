<div>
    <div class="flex space-x-2 items-center">
        <img src="{{ asset('images/hotel_logo.jpg') }}" class="h-8 w-8 rounded-full" alt="">
        <h1>{{ $getRecord()->name ?? 'No Name' }}</h1>
    </div>
    <p class="mt-2">{{ $getRecord()->comment }}</p>
</div>
