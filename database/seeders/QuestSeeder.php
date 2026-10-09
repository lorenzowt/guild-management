<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Quest;

class QuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Quest::create([
            'name' => 'The Purrloined Papers',
            'boss_name' => 'Baron Von Barkington',
            'description' => "The Guild's most important treaty has vanished from the archives, and the trail leads straight to the Baron, a pompous, monocled bloodhound. Your heroes must sneak past sleeping guard dogs, outwit the Baron's sniffer-network, and retrieve the scroll before it's shredded into bedding. It's a heist — with whiskers.",
            'difficulty' => 4,
        ]);

        Quest::create([
            'name' => 'A Clawful of Trouble',
            'boss_name' => 'The Great Ratt Zini',
            'description' => "A hypnotic rat has charmed the town's mice into a labor army and is building a Rattopia beneath the bakery. Your heroes must descend into the tunnels, break the trance, and shut down the operation — before the whole thing collapses on top of the pastries.",
            'difficulty' => 12,
        ]);

        Quest::create([
            'name' => 'A Tail of Two Kitties',
            'boss_name' => 'Duchess Peckworth',
            'description' => "The Duchess has declared the sunniest rooftop in the district her personal kingdom and pecks anyone who dares trespass. Your heroes must scale the rooftops, dodge her feathered enforcers, and negotiate — or duel — for control of the territory. Winner takes the sunbeam.",
            'difficulty' => 45,
        ]);
    }
}
