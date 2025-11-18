<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RankController extends Controller
{
    public function index(Request $request)
    {
        // Get rank type from query parameter (default: player)
        $type = $request->query('type', 'player');

        // Validate type
        $validTypes = ['player', 'level', 'couple', 'guild', 'online', 'fame', 'power', 'cegel'];
        if (!in_array($type, $validTypes)) {
            $type = 'player';
        }

        // Get dummy data based on type
        $dummyRankings = $this->getDummyRankings($type);

        // Pagination (15 items per page)
        $perPage = 15;
        $currentPage = $request->query('page', 1);
        $offset = ($currentPage - 1) * $perPage;

        // Slice data for current page
        $rankings = array_slice($dummyRankings, $offset, $perPage);

        // Create paginator manually
        $rankings = new \Illuminate\Pagination\LengthAwarePaginator(
            $rankings,
            count($dummyRankings),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('pages.rank.index', compact('rankings', 'type'));
    }

    private function getDummyRankings($type)
    {
        switch ($type) {
            case 'player':
                return $this->getPlayerRankings();
            case 'level':
                return $this->getLevelRankings();
            case 'couple':
                return $this->getCoupleRankings();
            case 'guild':
                return $this->getGuildRankings();
            case 'online':
                return $this->getOnlineRankings();
            case 'fame':
                return $this->getFameRankings();
            case 'power':
                return $this->getPowerRankings();
            case 'cegel':
                return $this->getCegelRankings();
            default:
                return $this->getPlayerRankings();
        }
    }

    private function getPlayerRankings()
    {
        $data = [
            ['character_name' => 'Capeskin', 'job' => 'Blade Master', 'guild' => 'Everyone', 'kill_point' => 6542],
            ['character_name' => 'Toge', 'job' => 'Renegade', 'guild' => 'Underware', 'kill_point' => 5231],
            ['character_name' => 'Y', 'job' => 'Renegade', 'guild' => 'Everyone', 'kill_point' => 4817],
            ['character_name' => 'Anae', 'job' => 'Renegade', 'guild' => 'Everyone', 'kill_point' => 4211],
            ['character_name' => 'Cupektong', 'job' => 'Renegade', 'guild' => 'Underware', 'kill_point' => 3911],
        ];

        for ($i = 6; $i <= 50; $i++) {
            $jobs = ['Blade Master', 'Renegade', 'Knight', 'Wizard', 'Priest', 'Assassin'];
            $guilds = ['Everyone', 'Underware', 'Warriors', 'Shadows', null];

            $data[] = [
                'character_name' => 'Player' . $i,
                'job' => $jobs[array_rand($jobs)],
                'guild' => $guilds[array_rand($guilds)],
                'kill_point' => rand(500, 3800)
            ];
        }

        return $data;
    }

    private function getLevelRankings()
    {
        $data = [];
        $jobs = ['Blade Master', 'Renegade', 'Knight', 'Wizard', 'Priest', 'Assassin'];
        $guilds = ['Everyone', 'Underware', 'Warriors', 'Shadows', null];

        for ($i = 1; $i <= 50; $i++) {
            $data[] = [
                'character_name' => 'Player' . $i,
                'job' => $jobs[array_rand($jobs)],
                'level' => rand(80, 150),
                'guild' => $guilds[array_rand($guilds)]
            ];
        }

        // Sort by level descending
        usort($data, function ($a, $b) {
            return $b['level'] - $a['level'];
        });

        return $data;
    }

    private function getCoupleRankings()
    {
        $data = [
            ['partner_1' => 'Romeo', 'partner_2' => 'Juliet', 'love_level' => 99, 'love_points' => 125000],
            ['partner_1' => 'Jack', 'partner_2' => 'Rose', 'love_level' => 95, 'love_points' => 118000],
            ['partner_1' => 'Tristan', 'partner_2' => 'Isolde', 'love_level' => 92, 'love_points' => 110000],
        ];

        for ($i = 4; $i <= 50; $i++) {
            $data[] = [
                'partner_1' => 'Player' . $i . 'M',
                'partner_2' => 'Player' . $i . 'F',
                'love_level' => rand(50, 90),
                'love_points' => rand(30000, 105000)
            ];
        }

        return $data;
    }

    private function getGuildRankings()
    {
        $data = [
            ['guild_name' => 'Everyone', 'leader' => 'Capeskin', 'members' => 50, 'guild_power' => 250000],
            ['guild_name' => 'Underware', 'leader' => 'Toge', 'members' => 45, 'guild_power' => 220000],
            ['guild_name' => 'Warriors', 'leader' => 'ShadowKnight', 'members' => 40, 'guild_power' => 195000],
        ];

        for ($i = 4; $i <= 50; $i++) {
            $data[] = [
                'guild_name' => 'Guild' . $i,
                'leader' => 'Leader' . $i,
                'members' => rand(10, 38),
                'guild_power' => rand(50000, 180000)
            ];
        }

        return $data;
    }

    private function getOnlineRankings()
    {
        $data = [];
        $jobs = ['Blade Master', 'Renegade', 'Knight', 'Wizard', 'Priest', 'Assassin'];
        $statuses = ['online', 'online', 'online', 'offline'];

        for ($i = 1; $i <= 50; $i++) {
            $data[] = [
                'character_name' => 'Player' . $i,
                'job' => $jobs[array_rand($jobs)],
                'level' => rand(80, 150),
                'status' => $statuses[array_rand($statuses)]
            ];
        }

        return $data;
    }

    private function getFameRankings()
    {
        $data = [];
        $jobs = ['Blade Master', 'Renegade', 'Knight', 'Wizard', 'Priest', 'Assassin'];
        $guilds = ['Everyone', 'Underware', 'Warriors', 'Shadows', null];

        for ($i = 1; $i <= 50; $i++) {
            $data[] = [
                'character_name' => 'Player' . $i,
                'job' => $jobs[array_rand($jobs)],
                'guild' => $guilds[array_rand($guilds)],
                'fame_points' => rand(50000, 500000)
            ];
        }

        // Sort by fame points descending
        usort($data, function ($a, $b) {
            return $b['fame_points'] - $a['fame_points'];
        });

        return $data;
    }

    private function getPowerRankings()
    {
        $data = [];
        $jobs = ['Blade Master', 'Renegade', 'Knight', 'Wizard', 'Priest', 'Assassin'];

        for ($i = 1; $i <= 50; $i++) {
            $data[] = [
                'character_name' => 'Player' . $i,
                'job' => $jobs[array_rand($jobs)],
                'level' => rand(100, 150),
                'power' => rand(100000, 999999)
            ];
        }

        // Sort by power descending
        usort($data, function ($a, $b) {
            return $b['power'] - $a['power'];
        });

        return $data;
    }

    private function getCegelRankings()
    {
        $data = [];
        $jobs = ['Blade Master', 'Renegade', 'Knight', 'Wizard', 'Priest', 'Assassin'];
        $guilds = ['Everyone', 'Underware', 'Warriors', 'Shadows', null];

        for ($i = 1; $i <= 50; $i++) {
            $data[] = [
                'character_name' => 'Player' . $i,
                'job' => $jobs[array_rand($jobs)],
                'guild' => $guilds[array_rand($guilds)],
                'cegel' => rand(1000000, 50000000)
            ];
        }

        // Sort by cegel descending
        usort($data, function ($a, $b) {
            return $b['cegel'] - $a['cegel'];
        });

        return $data;
    }
}
