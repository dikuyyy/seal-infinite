@extends('layouts.app')

@section('title', 'Rank')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/rank.css') }}">
@endpush

@section('content')
    <section class="hero">
        <div class="container-fluid px-2 px-md-3 px-lg-4" style="padding-top: 10rem">
            <section class="rank-section">
                <div class="container">
                    <h1 class="rank-title">RANK</h1>

                    <!-- Tab Navigation -->
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
