@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="flex md:flex-row flex-col  justify-around pt-10">
    <div class ="bg-white mx-auto max-w-2xl w-full rounded-md shadow-md px-11 pt-11">
        <h2 class="tracking-tight font-medium text-3xl"> Create a Hero </h2>
        <div class="mt-10 flex w-full md:items-center items-center md:justify-between flex-col md:flex-row">
            <div class="w-full max-w-70 min-w-50 aspect-square shrink bg-pink-300">                
            </div>
            <form action="{{ route('heroes.store') }}" method="POST" class="flex-1 mx-auto md:ml-10">
            <div class="relative z-0 w-full mb-8 group">
                <input type="text" name="name" id="name" class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer" placeholder=" " required />
                <label for="name" class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-fg-brand peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Name</label>
            </div>
                <div class="relative z-0 w-full mb-7 group">
                    <input type="number" name="level" id="level" class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer" placeholder="1" required />
                    <label for="level" class="absolute text-sm -translate-y-6 scale-75 top-3 text-fg-brand ">Level</label>
                </div>
            <div class="relative z-0 w-full mt-14">
                <label class="absolute text-sm -translate-y-11 scale-75 top-3 text-fg-brand">Class</label>
                <div class="flex rounded-base shadow-xs overflow-hidden mt-2">
                    <input type="radio" name="hero_class" id="warrior" value="warrior" class="peer/warrior hidden" checked>
                    <label for="warrior" class="flex-1 cursor-pointer text-center border border-default px-3 py-2 text-sm font-medium bg-neutral-primary-soft text-body hover:bg-pastel-petal-50/60 peer-checked/warrior:bg-pastel-petal-50  peer-checked/warrior:text-pastel-petal-800 ">Warrior</label>

                    <input type="radio" name="hero_class" id="cleric" value="cleric" class="peer/cleric hidden">
                    <label for="cleric" class="flex-1 cursor-pointer text-center border-y border-r border-default px-3 py-2 text-sm font-medium bg-neutral-primary-soft text-body hover:bg-pastel-petal-50/60 peer-checked/cleric:bg-pastel-petal-50/40  peer-checked/cleric:text-pastel-petal-800 peer-checked/cleric:z-20">Cleric</label>

                    <input type="radio" name="hero_class" id="mage" value="mage" class="peer/mage hidden">
                    <label for="mage" class="flex-1 cursor-pointer text-center border-y border-r border-default px-3 py-2 text-sm font-medium bg-neutral-primary-soft text-body hover:bg-pastel-petal-50/60 peer-checked/mage:bg-pastel-petal-50 peer-checked/mage:text-pastel-petal-800">Mage</label>

                    <input type="radio" name="hero_class" id="rogue" value="rogue" class="peer/rogue hidden">
                    <label for="rogue" class="flex-1 cursor-pointer text-center border-y border-r border-default px-3 py-2 text-sm font-medium bg-neutral-primary-soft text-body hover:bg-pastel-petal-50/60 peer-checked/rogue:bg-pastel-petal-50 peer-checked/rogue:text-pastel-petal-800">Rogue</label>
                </div>
            </div>
            <div class="relative z-0 w-full mt-6 group">
                <input type="text" name="status" id="status" class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer" value="Available" required/>
                <label for="status" class="absolute text-sm -translate-y-6 scale-75 top-3 text-fg-brand ">Status</label>
            </div>
        </div>
            <button type="submit" class="block mt-14 mb-7 mx-auto ">Submit</button>
            </form>
        </div>
</div>
@endsection