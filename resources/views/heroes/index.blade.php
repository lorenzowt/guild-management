@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="flex md:flex-row flex-col  justify-around pt-10">
    <div class ="bg-white mx-auto max-w-2xl w-full h-fit rounded-md shadow-md p-10">
        <h2 class="tracking-tight font-medium text-3xl mb-7"> List Heroes </h2>
        @if($heroes->isEmpty())
        <div class="flex flex-col w-full justify-center items-center">
            <p class="bg-pastel-petal-900/4 p-5 text-pastel-petal-900/40 rounded-lg font-semibold">No units hired yet</p>
            <a class=" mt-2 text-pastel-petal-900/70 underline underline-offset-6"href="{{ route('heroes.create') }}">create a hero </a>
        </div>
        @else
        @foreach($heroes as $hero)
        <div class="flex items-center justify-between py-5 border-t" >
            <div class="flex-col">
                <p class="text-lg">{{ $hero->name }}</p>
                <p class="text-sm">Status: {{ $hero->status }}</p>
            </div>
            <div class="flex gap-5">
                <p>Heal</p>
                <p>Erase</p>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>
@endsection