@include('partials._search')

<h1 class="ml-4 mb-4 font-bold">{{ $heading }}</h1>

<div class="flex flex-row flex-wrap m-4">
    @foreach ($listings as $listing)
        <x-listing-card :listing="$listing" />
    @endforeach
</div>


@if (count($listings) == 0)
    <p>No Listings Found</p>
@endif

<div class="mt-6 p-4">
    {{ $listings->links() }}
</div>
