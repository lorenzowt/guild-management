<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quest;

class QuestController extends Controller
{
    public function index()
    {
        return view('quests.index', [
            'quests' => Quest::paginate(7),
        ]);
    }

    public function show(Quest $quest)
    {
        return view('quests._quest-details', [
            'quest' => $quest,
        ]);
    }
}
