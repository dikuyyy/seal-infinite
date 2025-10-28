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
                <div class="rank-th rank-col-icon"></div>
                <div class="rank-th rank-col-num">#</div>
                <div class="rank-th rank-col-name">Char Name</div>
                <div class="rank-th rank-col-job">Job</div>
                <div class="rank-th rank-col-guild">Guild</div>
                <div class="rank-th rank-col-kill">Kill Point</div>
            </div>

            <!-- Blade Master Row -->
            <div class="rank-data-row">
                <div class="rank-class-cell">
                    <img src="{{ asset('images/blade-master.png') }}" alt="Blade Master" class="rank-class-icon">
                    <div class="rank-class-name">BLADE MASTER</div>
                </div>
                <div class="rank-row-data">
                    <div class="rank-td rank-col-num">1</div>
                    <div class="rank-td rank-col-name">Capeskin</div>
                    <div class="rank-td rank-col-job">Blade master</div>
                    <div class="rank-td rank-col-guild">Everyone</div>
                    <div class="rank-td rank-col-kill">6</div>
                </div>
            </div>

            <!-- Renegade Rows -->
            <div class="rank-data-row rank-multi-row">
                <div class="rank-class-cell">
                    <img src="{{ asset('images/renegade.png') }}" alt="Renegade" class="rank-class-icon">
                    <div class="rank-class-name">RENEGADE</div>
                </div>
                <div class="rank-rows-wrapper">
                    <div class="rank-row-data">
                        <div class="rank-td rank-col-num">1</div>
                        <div class="rank-td rank-col-name">Toge</div>
                        <div class="rank-td rank-col-job">Renegade</div>
                        <div class="rank-td rank-col-guild">Underware</div>
                        <div class="rank-td rank-col-kill">31</div>
                    </div>
                    <div class="rank-row-data">
                        <div class="rank-td rank-col-num">2</div>
                        <div class="rank-td rank-col-name">Y</div>
                        <div class="rank-td rank-col-job">Renegade</div>
                        <div class="rank-td rank-col-guild">Everyone</div>
                        <div class="rank-td rank-col-kill">17</div>
                    </div>
                    <div class="rank-row-data">
                        <div class="rank-td rank-col-num">3</div>
                        <div class="rank-td rank-col-name">Anae</div>
                        <div class="rank-td rank-col-job">Renegade</div>
                        <div class="rank-td rank-col-guild">Everyone</div>
                        <div class="rank-td rank-col-kill">11</div>
                    </div>
                    <div class="rank-row-data">
                        <div class="rank-td rank-col-num">4</div>
                        <div class="rank-td rank-col-name">Cupektong</div>
                        <div class="rank-td rank-col-job">Renegade</div>
                        <div class="rank-td rank-col-guild">Underware</div>
                        <div class="rank-td rank-col-kill">11</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- See More Button -->
        <div class="text-end mt-4">
            <button class="rank-see-more">See More</button>
        </div>
    </div>
</section>
