<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;


class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('heroes.index', [
            'heroes' => Hero::paginate(7),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('heroes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge([
            'name' => preg_replace('/\s+/', ' ', trim($request->name)),
        ]);

        $validated = $request->validate([
            'name' => 'required|string|max:10',
            'hero_class' => 'required|in:warrior,cleric,mage,rogue',
        ]);

        Hero::create($validated);

        return redirect()->route('heroes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hero $hero)
    {
        return view('heroes._hero-details', [
            'hero' => $hero,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hero $hero)
    {
        return view('heroes._edit-modal', [
            'hero' => $hero,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hero $hero)
    {
        $request->merge([
            'name' => preg_replace('/\s+/', ' ', trim($request->name)),
        ]);

        $validated = $request->validate([
            'name' => 'required|string|max:10',
            'hero_class' => 'required|in:warrior,cleric,mage,rogue',
            'level' => 'required|integer|min:1|max:10'
        ]);

        $hero->update($validated);

        return redirect()->route('heroes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hero $hero)
    {
        //
    }
}
