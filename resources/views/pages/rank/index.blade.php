@extends('layouts.default')

@section('title', 'Rank')

@push('styles')
    <style>
        .rank-section {
            position: relative;
            min-height: 100vh;
            padding: 6rem 0 4rem;
            background: url('/images/background/hero-3.png') center/cover no-repeat;
        }

        .rank-section::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.9));
            pointer-events: none;
        }

        .rank-section::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 150px;
            background: linear-gradient(to bottom, transparent, #000);
            pointer-events: none;
            z-index: 1;
        }

        .rank-container {
            position: relative;
            z-index: 2;
        }

        .rank-title {
            font-size: 3.5rem;
            font-weight: 800;
            color: #fff;
            letter-spacing: 0.1em;
            margin-bottom: 2rem;
            text-align: center;
            text-shadow: 0 0 30px rgba(37, 99, 235, 0.8);
            font-family: 'Orbitron', sans-serif;
        }

        /* Tabs */
        .rank-tabs {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 2rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .rank-tab-btn {
            background: rgba(5, 10, 25, 0.8);
            border: 2px solid #1e3a8a;
            color: #93c5fd;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s ease;
            border-radius: 10px;
            backdrop-filter: blur(10px);
        }

        .rank-tab-btn:hover {
            background: rgba(30, 58, 138, 0.6);
            color: #fff;
            transform: translateY(-2px);
            border-color: #2563eb;
        }

        .rank-tab-btn.active {
            background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 100%);
            color: #fff;
            border-color: #3b82f6;
            box-shadow: 0 4px 20px rgba(37, 99, 235, 0.5);
        }

        .rank-table-wrapper {
            border: 2px solid #1e3a8a;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(16px);
        }

        .rank-table {
            margin-bottom: 0;
        }

        .rank-table thead th {
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
            color: #fbbf24;
            font-weight: 700;
            font-size: 0.95rem;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            border: none;
            padding: 1.2rem 1rem;
            text-align: center;
            border-bottom: 3px solid #2563eb;
        }

        .rank-table tbody tr {
            border-bottom: 1px solid rgba(30, 58, 138, 0.3);
            transition: all 0.3s ease;
        }

        .rank-table tbody tr:hover {
            background: rgba(30, 58, 138, 0.2);
            transform: translateX(5px);
        }

        .rank-table tbody tr:last-child {
            border-bottom: none;
        }

        .rank-table tbody td {
            background-color: color-mix(in oklab, #FFF
                    /* #000 = #000000 */
                    70%, transparent);
            color: #000;
            padding: 1rem;
            font-size: 0.95rem;
            font-weight: 500;
            vertical-align: middle;
            border: none;
            text-align: center;
        }

        .rank-col-num {
            font-weight: 700;
            color: #fbbf24;
            font-size: 1.1rem;
            width: 80px;
        }

        .rank-col-name {
            font-weight: 600;
            color: #93c5fd;
            text-align: left;
        }

        .rank-col-job {
            color: #cbd5e1;
        }

        .rank-col-level {
            color: #10b981;
            font-weight: 700;
        }

        .rank-col-guild {
            color: #a78bfa;
            font-style: italic;
        }

        .rank-col-kill {
            font-weight: 700;
            color: #ef4444;
            font-size: 1.05rem;
        }

        .rank-col-fame {
            font-weight: 700;
            color: #f59e0b;
        }

        .rank-col-power {
            font-weight: 700;
            color: #8b5cf6;
        }

        .rank-col-cegel {
            font-weight: 700;
            color: #fbbf24;
        }

        .rank-col-status {
            color: #10b981;
        }

        .rank-col-couple {
            color: #ec4899;
            font-style: italic;
        }

        /* Badge for Top 3 */
        .rank-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            font-weight: 700;
            font-size: 0.9rem;
        }

        .rank-badge-1 {
            background: linear-gradient(135deg, #fbbf24, #f59e0b);
            color: #000;
            box-shadow: 0 0 20px rgba(251, 191, 36, 0.6);
        }

        .rank-badge-2 {
            background: linear-gradient(135deg, #94a3b8, #64748b);
            color: #fff;
            box-shadow: 0 0 20px rgba(148, 163, 184, 0.6);
        }

        .rank-badge-3 {
            background: linear-gradient(135deg, #cd7f32, #a0522d);
            color: #fff;
            box-shadow: 0 0 20px rgba(205, 127, 50, 0.6);
        }

        /* Status Badge */
        .status-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .status-online {
            background: rgba(16, 185, 129, 0.2);
            color: #10b981;
            border: 1px solid #10b981;
        }

        .status-offline {
            background: rgba(239, 68, 68, 0.2);
            color: #ef4444;
            border: 1px solid #ef4444;
        }

        /* Pagination */
        .rank-pagination {
            margin-top: 2rem;
        }

        .rank-pagination .pagination {
            justify-content: center;
            gap: 0.5rem;
        }

        .rank-pagination .page-link {
            background: rgba(5, 10, 25, 0.8);
            border: 2px solid #1e3a8a;
            color: #93c5fd;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            margin: 0;
        }

        .rank-pagination .page-link:hover {
            background: rgba(30, 58, 138, 0.6);
            color: #fff;
            border-color: #2563eb;
            transform: translateY(-2px);
        }

        .rank-pagination .page-item.active .page-link {
            background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 100%);
            border-color: #3b82f6;
            color: #fff;
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.5);
        }

        .rank-pagination .page-item.disabled .page-link {
            background: rgba(5, 10, 25, 0.5);
            border-color: rgba(30, 58, 138, 0.3);
            color: rgba(147, 197, 253, 0.4);
        }

        /* Empty State */
        .rank-empty {
            text-align: center;
            padding: 3rem 1rem;
            color: #94a3b8;
        }

        .rank-empty i {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        .rank-empty p {
            font-size: 1.1rem;
            margin: 0;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .rank-title {
                font-size: 2.5rem;
            }

            .rank-tab-btn {
                padding: 0.6rem 1rem;
                font-size: 0.85rem;
            }

            .rank-table thead th,
            .rank-table tbody td {
                padding: 0.8rem 0.6rem;
                font-size: 0.85rem;
            }
        }

        @media (max-width: 767px) {
            .rank-section {
                padding: 4rem 0 3rem;
            }

            .rank-title {
                font-size: 2rem;
                margin-bottom: 1.5rem;
            }

            .rank-tab-btn {
                padding: 0.5rem 0.8rem;
                font-size: 0.8rem;
            }

            .rank-table-wrapper {
                border-radius: 12px;
                overflow-x: auto;
            }

            .rank-table {
                min-width: 600px;
            }

            .rank-table thead th,
            .rank-table tbody td {
                padding: 0.75rem 0.5rem;
                font-size: 0.8rem;
            }

            .rank-col-num {
                width: 60px;
            }

            .rank-badge {
                width: 28px;
                height: 28px;
                font-size: 0.8rem;
            }
        }

        @media (max-width: 575px) {
            .rank-title {
                font-size: 1.5rem;
            }

            .rank-tab-btn {
                padding: 0.4rem 0.6rem;
                font-size: 0.75rem;
            }

            .rank-pagination .page-link {
                padding: 0.4rem 0.8rem;
                font-size: 0.85rem;
            }
        }
    </style>
@endpush

@section('content')
    <section>

        <!-- Tabs -->
        <div class="rank-tabs">
            <button class="rank-tab-btn {{ $type === 'player' ? 'active' : '' }}" data-type="player">Player</button>
            <button class="rank-tab-btn {{ $type === 'level' ? 'active' : '' }}" data-type="level">Level</button>
            <button class="rank-tab-btn {{ $type === 'couple' ? 'active' : '' }}" data-type="couple">Couple</button>
            <button class="rank-tab-btn {{ $type === 'guild' ? 'active' : '' }}" data-type="guild">Guild</button>
            <button class="rank-tab-btn {{ $type === 'online' ? 'active' : '' }}" data-type="online">Online</button>
            <button class="rank-tab-btn {{ $type === 'fame' ? 'active' : '' }}" data-type="fame">Fame</button>
            <button class="rank-tab-btn {{ $type === 'power' ? 'active' : '' }}" data-type="power">Power</button>
            <button class="rank-tab-btn {{ $type === 'cegel' ? 'active' : '' }}" data-type="cegel">Cegel</button>
        </div>

        <!-- Table -->
        <div class="rank-table-wrapper">
            @if ($rankings->count() > 0)
                <table class="table rank-table">
                    <thead>
                        <tr>
                            <th class="rank-col-num">Rank</th>

                            @switch($type)
                                @case('player')
                                    <th class="rank-col-name">Character Name</th>
                                    <th class="rank-col-job">Job</th>
                                    <th class="rank-col-guild">Guild</th>
                                    <th class="rank-col-kill">Kill Point</th>
                                @break

                                @case('level')
                                    <th class="rank-col-name">Character Name</th>
                                    <th class="rank-col-job">Job</th>
                                    <th class="rank-col-level">Level</th>
                                    <th class="rank-col-guild">Guild</th>
                                @break

                                @case('couple')
                                    <th class="rank-col-name">Partner 1</th>
                                    <th class="rank-col-couple">Partner 2</th>
                                    <th class="rank-col-level">Love Level</th>
                                    <th class="rank-col-fame">Love Points</th>
                                @break

                                @case('guild')
                                    <th class="rank-col-guild">Guild Name</th>
                                    <th class="rank-col-name">Leader</th>
                                    <th class="rank-col-level">Members</th>
                                    <th class="rank-col-power">Guild Power</th>
                                @break

                                @case('online')
                                    <th class="rank-col-name">Character Name</th>
                                    <th class="rank-col-job">Job</th>
                                    <th class="rank-col-level">Level</th>
                                    <th class="rank-col-status">Status</th>
                                @break

                                @case('fame')
                                    <th class="rank-col-name">Character Name</th>
                                    <th class="rank-col-job">Job</th>
                                    <th class="rank-col-guild">Guild</th>
                                    <th class="rank-col-fame">Fame Points</th>
                                @break

                                @case('power')
                                    <th class="rank-col-name">Character Name</th>
                                    <th class="rank-col-job">Job</th>
                                    <th class="rank-col-level">Level</th>
                                    <th class="rank-col-power">Power</th>
                                @break

                                @case('cegel')
                                    <th class="rank-col-name">Character Name</th>
                                    <th class="rank-col-job">Job</th>
                                    <th class="rank-col-guild">Guild</th>
                                    <th class="rank-col-cegel">Total Cegel</th>
                                @break
                            @endswitch
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rankings as $index => $rank)
                            <tr>
                                <td class="rank-col-num">
                                    @if ($rankings->firstItem() + $index <= 3)
                                        <span class="rank-badge rank-badge-{{ $rankings->firstItem() + $index }}">
                                            {{ $rankings->firstItem() + $index }}
                                        </span>
                                    @else
                                        {{ $rankings->firstItem() + $index }}
                                    @endif
                                </td>

                                @switch($type)
                                    @case('player')
                                        <td class="rank-col-name">{{ $rank['character_name'] }}</td>
                                        <td class="rank-col-job">{{ $rank['job'] }}</td>
                                        <td class="rank-col-guild">{{ $rank['guild'] ?? '-' }}</td>
                                        <td class="rank-col-kill">{{ number_format($rank['kill_point']) }}</td>
                                    @break

                                    @case('level')
                                        <td class="rank-col-name">{{ $rank['character_name'] }}</td>
                                        <td class="rank-col-job">{{ $rank['job'] }}</td>
                                        <td class="rank-col-level">{{ $rank['level'] }}</td>
                                        <td class="rank-col-guild">{{ $rank['guild'] ?? '-' }}</td>
                                    @break

                                    @case('couple')
                                        <td class="rank-col-name">{{ $rank['partner_1'] }}</td>
                                        <td class="rank-col-couple">{{ $rank['partner_2'] }}</td>
                                        <td class="rank-col-level">{{ $rank['love_level'] }}</td>
                                        <td class="rank-col-fame">{{ number_format($rank['love_points']) }}</td>
                                    @break

                                    @case('guild')
                                        <td class="rank-col-guild">{{ $rank['guild_name'] }}</td>
                                        <td class="rank-col-name">{{ $rank['leader'] }}</td>
                                        <td class="rank-col-level">{{ $rank['members'] }}</td>
                                        <td class="rank-col-power">{{ number_format($rank['guild_power']) }}</td>
                                    @break

                                    @case('online')
                                        <td class="rank-col-name">{{ $rank['character_name'] }}</td>
                                        <td class="rank-col-job">{{ $rank['job'] }}</td>
                                        <td class="rank-col-level">{{ $rank['level'] }}</td>
                                        <td class="rank-col-status">
                                            <span class="status-badge status-{{ $rank['status'] }}">
                                                {{ ucfirst($rank['status']) }}
                                            </span>
                                        </td>
                                    @break

                                    @case('fame')
                                        <td class="rank-col-name">{{ $rank['character_name'] }}</td>
                                        <td class="rank-col-job">{{ $rank['job'] }}</td>
                                        <td class="rank-col-guild">{{ $rank['guild'] ?? '-' }}</td>
                                        <td class="rank-col-fame">{{ number_format($rank['fame_points']) }}</td>
                                    @break

                                    @case('power')
                                        <td class="rank-col-name">{{ $rank['character_name'] }}</td>
                                        <td class="rank-col-job">{{ $rank['job'] }}</td>
                                        <td class="rank-col-level">{{ $rank['level'] }}</td>
                                        <td class="rank-col-power">{{ number_format($rank['power']) }}</td>
                                    @break

                                    @case('cegel')
                                        <td class="rank-col-name">{{ $rank['character_name'] }}</td>
                                        <td class="rank-col-job">{{ $rank['job'] }}</td>
                                        <td class="rank-col-guild">{{ $rank['guild'] ?? '-' }}</td>
                                        <td class="rank-col-cegel">{{ number_format($rank['cegel']) }}</td>
                                    @break
                                @endswitch
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="rank-empty">
                    <i class="bi bi-inbox"></i>
                    <p>No ranking data available</p>
                </div>
            @endif
        </div>

        <!-- Pagination -->
        @if ($rankings->hasPages())
            <div class="rank-pagination">
                {{ $rankings->appends(['type' => $type])->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabButtons = document.querySelectorAll('.rank-tab-btn');

            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Get rank type
                    const rankType = this.getAttribute('data-type');

                    // Redirect with type parameter
                    window.location.href = `{{ route('rank.index') }}?type=${rankType}`;
                });
            });
        });
    </script>
@endpush
