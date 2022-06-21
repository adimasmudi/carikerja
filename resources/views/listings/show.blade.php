<x-layout>


    <a href="/seeker/dashboard" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">

        <x-card class="flex flex-col items-center justify-center text-center">
            <img class="w-48 mr-6 mb-6"
                src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png') }}"
                alt="" />

            <h3 class="text-2xl mb-2">
                {{ $listing->title }}
            </h3>
            <div class="text-xl font-bold mb-4">{{ $listing->company }}</div>

            <x-listing-tag :tagsCsv="$listing->tags" />

            <div class="text-lg my-4">
                <i class="fa-solid fa-location-dot"></i> {{ $listing->location }}
            </div>
            <div class="border border-gray-200 w-full mb-6"></div>
            <div class="w-full">
                <h3 class="text-3xl font-bold mb-4">Job Description</h3>
                <div class="text-lg space-y-6">
                    {{ $listing->description }}
                </div>
                <div class="w-1/5 mx-auto">
                    <a href="/apply/{{ $listing->id }}"
                        class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"><i
                            class="fa-solid fa-check" aria-hidden="true"></i>
                        Apply Langsung</a>

                    <a href="mailto:{{ $listing->email }}"
                        class="block bg-laravel text-white mt-2 py-2 rounded-xl hover:opacity-80"><i
                            class="fa-solid fa-envelope"></i>
                        Contact Employer</a>

                    <a href="{{ $listing->website }}" target="_blank"
                        class="block bg-black text-white mt-2 py-2 rounded-xl hover:opacity-80"><i
                            class="fa-solid fa-globe"></i>
                        Visit Website</a>
                </div>
            </div>
        </x-card>



    </div>

</x-layout>
