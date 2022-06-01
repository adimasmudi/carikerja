@extends('layout')
@section('content')
@include('partials._hero')
@include('partials._search')

<h1>{{$heading}}</h1>

<div class="flex flex-row">
    @foreach ($listings as $listing)
      <x-listing-card :listing="$listing" />
    @endforeach
</div>
        

@if(count($listings) == 0)
    <p>No Listings Found</p>
@endif

@endsection
