@extends('layouts.default')

@section('title', 'Rank')

@push('styles')
    <style>
        /* ========== RANK SECTION ========== */
        .rank-title {
            font-size: 3.5rem;
            font-weight: bold;
            color: #fff;
            letter-spacing: 0.1em;
            margin-bottom: 2rem;
            text-align: center;
            text-shadow: 0 0 20px rgba(30, 58, 138, 0.8);
        }

        /* Tab Navigation */
        .rank-tabs {
            display: flex;
            gap: 0;
            margin-bottom: 2.5rem;
            border: 2px solid #1e3a8a;
            border-radius: 12px;
            overflow: hidden;
            width: 100%;
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
            box-shadow: 0 4px 20px rgba(30, 58, 138, 0.3);
        }

        .rank-tab-btn {
            background: rgba(5, 10, 25, 0.6);
            border: none;
            color: #93c5fd;
            padding: 1rem 1.5rem;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s ease;
            border-right: 1px solid #1e3a8a;
            flex: 1;
        }

        .rank-tab-btn:last-child {
            border-right: none;
        }

        .rank-tab-btn:hover {
            background: rgba(30, 58, 138, 0.4);
            color: #fff;
        }

        .rank-tab-btn.active {
            background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 100%);
            color: #fff;
            box-shadow: inset 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        /* Table Container */
        .rank-table-container {
            background: rgba(5, 10, 25, 0.9);
            border: 2px solid #1e3a8a;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
        }

        /* Table Header */
        .rank-table-header {
            display: grid;
            grid-template-columns: 80px 1.5fr 1.5fr 1.5fr 140px;
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
            border-bottom: 3px solid #2563eb;
        }

        .rank-th {
            color: #fbbf24;
            padding: 1.2rem 1rem;
            font-weight: 700;
            font-size: 0.95rem;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }

        .rank-th.rank-col-icon {
            padding: 0;
        }

        .rank-th.rank-col-num,
        .rank-th.rank-col-kill {
            text-align: center;
        }

        /* Data Row */
        .rank-row-data {
            display: grid;
            grid-template-columns: 80px 1.5fr 1.5fr 1.5fr 140px;
            align-items: center;
            border-bottom: 1px solid rgba(30, 58, 138, 0.4);
            transition: all 0.3s ease;
        }

        .rank-row-data:last-child {
            border-bottom: none;
        }

        .rank-row-data:hover {
            background: rgba(30, 58, 138, 0.2);
            transform: translateX(5px);
        }

        /* Class Cell (Icon + Name) */
        .rank-class-cell {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            padding: 1.5rem 1rem;
            background: linear-gradient(135deg,
                    rgba(5, 10, 20, 0.8) 0%,
                    rgba(15, 20, 40, 0.8) 100%);
            border-right: 2px solid #1e3a8a;
            position: relative;
        }

        .rank-class-cell::after {
            content: "";
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 2px;
            height: 70%;
            background: linear-gradient(to bottom, transparent, #2563eb, transparent);
        }

        .rank-class-icon {
            width: 55px;
            height: 55px;
            object-fit: contain;
            filter: drop-shadow(0 0 15px rgba(37, 99, 235, 0.6));
            transition: all 0.3s ease;
        }

        .rank-data-row:hover .rank-class-icon {
            transform: scale(1.1);
            filter: drop-shadow(0 0 20px rgba(59, 130, 246, 0.8));
        }

        .rank-class-name {
            color: #93c5fd;
            font-weight: 700;
            font-size: 0.8rem;
            letter-spacing: 0.1em;
            text-align: center;
            text-shadow: 0 0 10px rgba(30, 58, 138, 0.5);
        }

        /* Row Data */
        .rank-row-data {
            display: grid;
            grid-template-columns: 80px 1.5fr 1.5fr 1.5fr 140px;
            align-items: center;
            border-bottom: 1px solid rgba(30, 58, 138, 0.2);
            transition: all 0.2s ease;
        }

        .rank-row-data:hover {
            background: rgba(37, 99, 235, 0.1);
        }

        .rank-rows-wrapper .rank-row-data:last-child {
            border-bottom: none;
        }

        .rank-td {
            color: #e5e7eb;
            padding: 1rem 1rem;
            font-size: 0.95rem;
            font-weight: 500;
        }

        /* Column Alignments */
        .rank-col-num {
            text-align: center;
            font-weight: 700;
            color: #fbbf24;
            font-size: 1.1rem;
        }

        .rank-col-name {
            font-weight: 600;
            color: #93c5fd;
        }

        .rank-col-job {
            color: #cbd5e1;
        }

        .rank-col-guild {
            color: #a78bfa;
            font-style: italic;
        }

        .rank-col-kill {
            text-align: center;
            font-weight: 700;
            color: #ef4444;
            font-size: 1.05rem;
        }

        /* Multi Row Container */
        .rank-multi-row {
            grid-template-rows: auto;
        }

        .rank-rows-wrapper {
            display: flex;
            flex-direction: column;
        }

        /* See More Button */
        .rank-see-more {
            background: linear-gradient(135deg,
                    rgba(30, 58, 138, 0.6) 0%,
                    rgba(37, 99, 235, 0.6) 100%);
            border: 2px solid #1e3a8a;
            color: #fff;
            padding: 0.75rem 3rem;
            border-radius: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.95rem;
            box-shadow: 0 4px 15px rgba(30, 58, 138, 0.3);
        }

        .rank-see-more:hover {
            background: linear-gradient(135deg,
                    rgba(37, 99, 235, 0.8) 0%,
                    rgba(59, 130, 246, 0.8) 100%);
            border-color: #2563eb;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.5);
        }

        /* Responsive Design */
        @media (max-width: 1199.98px) {

            .rank-table-header,
            .rank-row-data {
                grid-template-columns: 70px 1fr 1.2fr 1.2fr 120px;
            }
        }

        @media (max-width: 991.98px) {
            .rank-title {
                font-size: 2.5rem;
            }

            .rank-tabs {
                flex-wrap: wrap;
            }

            .rank-tab-btn {
                padding: 0.8rem 1rem;
                font-size: 0.85rem;
                flex: 1 1 auto;
                min-width: 100px;
            }

            .rank-table-header,
            .rank-row-data {
                grid-template-columns: 60px 1fr 1fr 1fr 100px;
            }

            .rank-th,
            .rank-td {
                padding: 0.8rem 0.6rem;
                font-size: 0.85rem;
            }
        }

        @media (max-width: 767.98px) {
            .rank-title {
                font-size: 2rem;
                margin-bottom: 1.5rem;
            }

            .rank-tabs {
                gap: 0.5rem;
                border: none;
                background: none;
                flex-wrap: wrap;
                justify-content: center;
            }

            .rank-tab-btn {
                padding: 0.6rem 1rem;
                font-size: 0.8rem;
                border-radius: 8px;
                border: 1px solid #1e3a8a;
                min-width: auto;
                flex: 0 1 auto;
            }

            .rank-table-container {
                border-radius: 12px;
            }

            .rank-table-header {
                display: none;
            }

            .rank-row-data {
                grid-template-columns: 1fr;
                gap: 0.5rem;
                padding: 1rem;
                border: 1px solid #1e3a8a;
                border-radius: 12px;
                margin-bottom: 0.75rem;
            }

            .rank-td {
                padding: 0.5rem 0;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .rank-td::before {
                content: attr(data-label);
                font-weight: 700;
                color: #fbbf24;
                text-transform: uppercase;
                font-size: 0.75rem;
            }

            .rank-see-more {
                width: 100%;
                padding: 1rem;
                margin-top: 1rem;
            }
        }

        @media (max-width: 575.98px) {
            .rank-title {
                font-size: 1.5rem;
            }

            .rank-tab-btn {
                padding: 0.5rem 0.8rem;
                font-size: 0.75rem;
            }

            .rank-td {
                font-size: 0.85rem;
            }
        }
    </style>
@endpush

@section('content')
    <section class="rank-section">
        <div class="container">
            <div class="rank-tabs">
                <button class="rank-tab-btn active">Player</button>
                <button class="rank-tab-btn">Level</button>
                <button class="rank-tab-btn">Couple</button>
                <button class="rank-tab-btn">Guild</button>
                <button class="rank-tab-btn">Online</button>
                <button class="rank-tab-btn">Fame</button>
                <button class="rank-tab-btn">Power</button>
                <button class="rank-tab-btn">Cegel</button>
            </div>

            <!-- Table Container -->
            <div class="rank-table-container">
                <!-- Table Header -->
                <div class="rank-table-header">
                    <div class="rank-th rank-col-num">#</div>
                    <div class="rank-th rank-col-name">Char Name</div>
                    <div class="rank-th rank-col-job">Job</div>
                    <div class="rank-th rank-col-guild">Guild</div>
                    <div class="rank-th rank-col-kill">Kill Point</div>
                </div>

                <!-- Data Rows -->
                <div class="rank-row-data">
                    <div class="rank-td rank-col-num" data-label="Rank">1</div>
                    <div class="rank-td rank-col-name" data-label="Character">Capeskin</div>
                    <div class="rank-td rank-col-job" data-label="Job">Blade master</div>
                    <div class="rank-td rank-col-guild" data-label="Guild">Everyone</div>
                    <div class="rank-td rank-col-kill" data-label="Kill Point">6</div>
                </div>

                <div class="rank-row-data">
                    <div class="rank-td rank-col-num" data-label="Rank">2</div>
                    <div class="rank-td rank-col-name" data-label="Character">Toge</div>
                    <div class="rank-td rank-col-job" data-label="Job">Renegade</div>
                    <div class="rank-td rank-col-guild" data-label="Guild">Underware</div>
                    <div class="rank-td rank-col-kill" data-label="Kill Point">31</div>
                </div>

                <div class="rank-row-data">
                    <div class="rank-td rank-col-num" data-label="Rank">3</div>
                    <div class="rank-td rank-col-name" data-label="Character">Y</div>
                    <div class="rank-td rank-col-job" data-label="Job">Renegade</div>
                    <div class="rank-td rank-col-guild" data-label="Guild">Everyone</div>
                    <div class="rank-td rank-col-kill" data-label="Kill Point">17</div>
                </div>

                <div class="rank-row-data">
                    <div class="rank-td rank-col-num" data-label="Rank">4</div>
                    <div class="rank-td rank-col-name" data-label="Character">Anae</div>
                    <div class="rank-td rank-col-job" data-label="Job">Renegade</div>
                    <div class="rank-td rank-col-guild" data-label="Guild">Everyone</div>
                    <div class="rank-td rank-col-kill" data-label="Kill Point">11</div>
                </div>

                <div class="rank-row-data">
                    <div class="rank-td rank-col-num" data-label="Rank">5</div>
                    <div class="rank-td rank-col-name" data-label="Character">Cupektong</div>
                    <div class="rank-td rank-col-job" data-label="Job">Renegade</div>
                    <div class="rank-td rank-col-guild" data-label="Guild">Underware</div>
                    <div class="rank-td rank-col-kill" data-label="Kill Point">11</div>
                </div>
            </div>

            <!-- See More Button -->
            <div class="text-end mt-4">
                <button class="rank-see-more">See More</button>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuButtons = document.querySelectorAll('.account-menu-btn');
            const tabContents = document.querySelectorAll('.tab-content');

            menuButtons.forEach(button => {
                button.addEventListener('click', function() {
                    menuButtons.forEach(btn => btn.classList.remove('active'));

                    this.classList.add('active');

                    tabContents.forEach(content => content.classList.remove('active'));

                    const tabId = this.getAttribute('data-tab') + '-content';
                    document.getElementById(tabId).classList.add('active');
                });
            });

            const toolTabs = document.querySelectorAll('.tool-tab');
            const toolContents = document.querySelectorAll('.tool-content');

            toolTabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    toolTabs.forEach(t => {
                        t.style.background = '#e5e7eb';
                        t.style.color = '#1a1a2e';
                    });

                    this.style.background = '#3b82f6';
                    this.style.color = 'white';

                    toolContents.forEach(content => content.style.display = 'none');

                    const toolId = this.getAttribute('data-tool') + '-content';
                    document.getElementById(toolId).style.display = 'block';
                });
            });

            document.querySelectorAll('.tool-content a').forEach(link => {
                link.addEventListener('mouseenter', function() {
                    this.style.paddingLeft = '0.5rem';
                });
                link.addEventListener('mouseleave', function() {
                    this.style.paddingLeft = '0';
                });
            });
        });
    </script>
@endpush
