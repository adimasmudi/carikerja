<x-layout>
@include('partials._hero')
@include('partials._search')

<h1 class="ml-4 mb-4 font-bold">{{$heading}}</h1>

<div class="flex flex-row m-4">
    @foreach ($listings as $listing)
      <x-listing-card :listing="$listing" />
    @endforeach
</div>
        

@if(count($listings) == 0)
    <p>No Listings Found</p>
@endif
</x-layout>
