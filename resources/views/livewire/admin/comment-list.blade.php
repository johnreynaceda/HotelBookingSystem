<div>

    <section class="py-20 sm:py-32">
        <ul role="list" class="grid  grid-cols-3 gap-6 mx-auto sm:gap-8 lg:max-w-none lg:grid-cols-3">
            @foreach ($comments as $item)
                <li>
                    <ul role="list" class="flex flex-col gap-y-6 sm:gap-y-8">
                        <li>
                            <figure class="relative h-full p-6 bg-white border rounded-3xl">
                                <blockquote class="relative">
                                    <p class="text-base text-gray-500">
                                        {{ $item->comment }}
                                    </p>
                                </blockquote>
                                <figcaption
                                    class="relative flex items-center justify-between pt-6 mt-6 border-t border-gray-100">
                                    <div>
                                        <div class="text-base text-black">
                                            {{ $item->name ?? 'No Name' }}
                                        </div>
                                    </div>
                                    <div class="overflow-hidden rounded-full bg-gray-50">
                                        <img alt="" src="{{ asset('images/hotel_logo.jpg') }}" width="56"
                                            height="56" decoding="async" data-nimg="future"
                                            class="object-cover h-14 w-14" loading="lazy" style="color: transparent">
                                    </div>
                                </figcaption>
                            </figure>
                        </li>

                    </ul>
                </li>
            @endforeach

        </ul>
    </section>
</div>
