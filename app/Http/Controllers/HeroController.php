<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Enums\HeroStatus;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateHeroRequest;
use App\Http\Requests\StoreHeroRequest;



class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $editHero = null;
        $id = session('edit_hero_id');

        $showHero = null;
        $showHeroId = session('show_hero_id');

        if ($id) {
            $editHero = Hero::find($id);
        }

        if ($showHeroId) {
            $showHero = Hero::find($showHeroId);
        }

        return view('heroes.index', [
            'heroes' => Hero::paginate(7),
            'editHero' => $editHero,
            'showHero' => $showHero,
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
    public function store(StoreHeroRequest $request)
    {
        Hero::create($request->validated());

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
    public function update(UpdateHeroRequest $request, Hero $hero)
    {
        $hero->update($request->validated());

        session()->flash('show_hero_id', $hero->id);

        return redirect()->route('heroes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hero $hero)
    {
        //
    }

    /**
    * Change hero status from injured to available
    */
    public function cure(Request $request, Hero $hero)
    {
        if ($hero->status === HeroStatus::INJURED) {

            $hero->status = HeroStatus::AVAILABLE;

            $hero->save();
        }

        return redirect()->route('heroes.index', [
            'page' => $request->input('page'),
        ]);
    }
}
