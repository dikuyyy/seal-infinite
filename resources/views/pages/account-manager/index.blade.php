@extends('layouts.app')

@section('title', 'Account Manager')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/account-manager.css') }}">
@endpush

@section('content')
    <section class="hero">
        <div class="container-fluid px-2 px-md-3 px-lg-4" style="padding-top: 10rem">
            <div class="account-card">
                <div class="account-title">Account Manager</div>
                <div class="account-row">
                    <div class="account-menu">
                        <button class="account-menu-btn active" data-tab="panel">Member Panel</button>
                        <button class="account-menu-btn" data-tab="game">Game Manage</button>
                        <button class="account-menu-btn" data-tab="password">Change Password</button>
                    </div>
                    <div class="account-divider"></div>
                    <div class="account-info">
                        <!-- Panel Member Content -->
                        <div class="tab-content active" id="panel-content">
                            Welcome back, <a href="#">Account !</a><br>
                            Account Status: <b>Active</b><br>
                            AFK Point: <span class="account-point-red">1,326,200</span><br>
                            Donate Point: <span class="account-point-blue">195,316,650</span><br>
                            Donate Accumulation: <span class="account-point-indigo">IDR 2.500.000</span><br>
                            Last Login: 21 Oct 2025 23:23:57
                        </div>

                        <!-- Game Manage Content -->
                        <div class="tab-content" id="game-content">
                            <h5 style="margin-bottom: 1.5rem; color: #4a148c; font-weight: 700;">Character List</h5>

                            <!-- Character Selector -->
                            <div style="margin-bottom: 1.5rem;">
                                <select
                                    style="width: 100%; padding: 0.7rem; border-radius: 8px; border: 1px solid #d1d5db; background: white; cursor: pointer; font-size: 0.95rem;">
                                    <option>Choose Character</option>
                                    <option>Character 1</option>
                                    <option>Character 2</option>
                                    <option>Character 3</option>
                                </select>
                            </div>

                            <!-- Tabs: Tools, Exchanges -->
                            <div style="display: flex; gap: 0.5rem; margin-bottom: 1.5rem;">
                                <button class="tool-tab active" data-tool="tools"
                                    style="flex: 1; padding: 0.7rem; background: #3b82f6; color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: 600; transition: all 0.3s;">
                                    Tools
                                </button>
                                <button class="tool-tab" data-tool="exchanges"
                                    style="flex: 1; padding: 0.7rem; background: #e5e7eb; color: #1a1a2e; border: none; border-radius: 8px; cursor: pointer; font-weight: 600; transition: all 0.3s;">
                                    Exchanges
                                </button>
                                <button class="tool-tab" data-tool="donate-benefits"
                                    style="flex: 1; padding: 0.7rem; background: #e5e7eb; color: #1a1a2e; border: none; border-radius: 8px; cursor: pointer; font-weight: 600; transition: all 0.3s;">
                                    Donate Benefits
                                </button>
                            </div>

                            <!-- Tools Content -->
                            <div class="tool-content active" id="tools-content">
                                <div style="display: flex; flex-direction: column; gap: 0.8rem;">
                                    <a href="#"
                                        style="color: #3b82f6; text-decoration: none; font-size: 0.95rem; font-weight: 500; transition: all 0.3s;">Reset
                                        EXP Minus</a>
                                    <a href="#"
                                        style="color: #3b82f6; text-decoration: none; font-size: 0.95rem; font-weight: 500; transition: all 0.3s;">Reduce
                                        Aspd</a>
                                    <a href="#"
                                        style="color: #3b82f6; text-decoration: none; font-size: 0.95rem; font-weight: 500; transition: all 0.3s;">Clear
                                        Cash Inventory Slot 1-8</a>
                                </div>

                                <!-- Teleport Section -->
                                <div style="margin-top: 2rem; padding-top: 2rem; border-top: 1px solid #d1d5db;">
                                    <h6 style="margin-bottom: 1rem; color: #1a1a2e; font-weight: 700; font-size: 0.95rem;">
                                        Teleport</h6>
                                    <div style="margin-bottom: 1rem;">
                                        <select
                                            style="width: 100%; padding: 0.7rem; border-radius: 8px; border: 1px solid #d1d5db; background: white; cursor: pointer; font-size: 0.95rem;">
                                            <option>Select a Map</option>
                                            <option>Map 1</option>
                                            <option>Map 2</option>
                                            <option>Map 3</option>
                                        </select>
                                    </div>
                                    <button
                                        style="padding: 0.7rem 2rem; background: #00bcd4; color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: 600; float: right; transition: all 0.3s;">
                                        Teleport
                                    </button>
                                    <div style="clear: both;"></div>
                                </div>
                            </div>

                            <!-- Exchanges Content -->
                            <div class="tool-content" id="exchanges-content" style="display: none;">
                                <p style="color: #6b7280;">There's no Exchanges yet. Please try again later.</p>
                            </div>

                            <div class="tool-content" id="donate-benefits-content" style="display: none;">
                                <!-- Total Donate Info -->
                                <div style="margin-bottom: 1.5rem;">
                                    <p style="margin: 0; color: #1a1a2e; font-size: 0.95rem; font-weight: 600;">
                                        Total Donate (All Time): <span style="color: #00bcd4; font-weight: 700;">IDR
                                            2.500.000</span>
                                    </p>
                                </div>

                                <!-- Donate Benefit 1 -->
                                <div
                                    style="display: flex; justify-content: space-between; align-items: flex-start; gap: 2rem; margin-bottom: 2rem; padding-bottom: 2rem; border-bottom: 1px solid #d1d5db;">
                                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; flex: 1;">
                                        <div>
                                            <h6
                                                style="color: #f59e0b; font-weight: 700; font-size: 0.95rem; margin-bottom: 1rem;">
                                                Total Donate</h6>
                                            <p
                                                style="color: #00bcd4; font-size: 1.1rem; font-weight: 700; margin-bottom: 0.5rem;">
                                                IDR 500.000</p>
                                            <p style="color: #1a1a2e; font-size: 0.9rem; margin: 0;">Bonus Title: <span
                                                    style="font-weight: 600;">Beginner Supporter</span></p>
                                        </div>
                                        <div>
                                            <h6
                                                style="color: #f59e0b; font-weight: 700; font-size: 0.95rem; margin-bottom: 1rem;">
                                                Rewards</h6>
                                            <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                                                <p style="margin: 0; color: #1a1a2e; font-size: 0.9rem;">1. Infinite Planet
                                                    Ransom #1 · 1000 pcs</p>
                                                <p style="margin: 0; color: #1a1a2e; font-size: 0.9rem;">2. Golden Chest Key
                                                    · 5 pcs</p>
                                                <p style="margin: 0; color: #1a1a2e; font-size: 0.9rem;">3. Premium Mount
                                                    Box · 1 pcs</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button
                                            style="padding: 0.7rem 2rem; background: #10b981; color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: 600; font-size: 0.95rem; white-space: nowrap;">
                                            Claim
                                        </button>
                                    </div>
                                </div>

                                <!-- Donate Benefit 2 -->
                                <div
                                    style="display: flex; justify-content: space-between; align-items: flex-start; gap: 2rem; margin-bottom: 2rem; padding-bottom: 2rem; border-bottom: 1px solid #d1d5db;">
                                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; flex: 1;">
                                        <div>
                                            <h6
                                                style="color: #f59e0b; font-weight: 700; font-size: 0.95rem; margin-bottom: 1rem;">
                                                Total Donate</h6>
                                            <p
                                                style="color: #00bcd4; font-size: 1.1rem; font-weight: 700; margin-bottom: 0.5rem;">
                                                IDR 1.000.000</p>
                                            <p style="color: #1a1a2e; font-size: 0.9rem; margin: 0;">Bonus Title: <span
                                                    style="font-weight: 600;">Bronze Supporter</span></p>
                                        </div>
                                        <div>
                                            <h6
                                                style="color: #f59e0b; font-weight: 700; font-size: 0.95rem; margin-bottom: 1rem;">
                                                Rewards</h6>
                                            <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                                                <p style="margin: 0; color: #1a1a2e; font-size: 0.9rem;">1. Infinite Planet
                                                    Ransom #1 · 3000 pcs</p>
                                                <p style="margin: 0; color: #1a1a2e; font-size: 0.9rem;">2. Infinite Planet
                                                    Ransom #2 · 3000 pcs</p>
                                                <p style="margin: 0; color: #1a1a2e; font-size: 0.9rem;">3. Golden Chest Key
                                                    · 10 pcs</p>
                                                <p style="margin: 0; color: #1a1a2e; font-size: 0.9rem;">4. Albereo's Jewely
                                                    Box · 5 pcs</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button
                                            style="padding: 0.7rem 2rem; background: #10b981; color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: 600; font-size: 0.95rem; white-space: nowrap;">
                                            Claim
                                        </button>
                                    </div>
                                </div>

                                <!-- Donate Benefit 3 -->
                                <div
                                    style="display: flex; justify-content: space-between; align-items: flex-start; gap: 2rem; margin-bottom: 2rem; padding-bottom: 2rem; border-bottom: 1px solid #d1d5db;">
                                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; flex: 1;">
                                        <div>
                                            <h6
                                                style="color: #f59e0b; font-weight: 700; font-size: 0.95rem; margin-bottom: 1rem;">
                                                Total Donate</h6>
                                            <p
                                                style="color: #00bcd4; font-size: 1.1rem; font-weight: 700; margin-bottom: 0.5rem;">
                                                IDR 2.500.000</p>
                                            <p style="color: #1a1a2e; font-size: 0.9rem; margin: 0;">Bonus Title: <span
                                                    style="font-weight: 600;">Silver Supporter</span></p>
                                        </div>
                                        <div>
                                            <h6
                                                style="color: #f59e0b; font-weight: 700; font-size: 0.95rem; margin-bottom: 1rem;">
                                                Rewards</h6>
                                            <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                                                <p style="margin: 0; color: #1a1a2e; font-size: 0.9rem;">1. Infinite Planet
                                                    Ransom #2 · 5000 pcs</p>
                                                <p style="margin: 0; color: #1a1a2e; font-size: 0.9rem;">2. Infinite Planet
                                                    Ransom #3 · 5000 pcs</p>
                                                <p style="margin: 0; color: #1a1a2e; font-size: 0.9rem;">3. Golden Chest Key
                                                    · 20 pcs</p>
                                                <p style="margin: 0; color: #1a1a2e; font-size: 0.9rem;">4. Albereo's Jewely
                                                    Box · 10 pcs</p>
                                                <p style="margin: 0; color: #1a1a2e; font-size: 0.9rem;">5. Legendary
                                                    Weapon
                                                    Box · 1 pcs</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button
                                            style="padding: 0.7rem 2rem; background: #9ca3af; color: white; border: none; border-radius: 8px; cursor: not-allowed; font-weight: 600; font-size: 0.95rem; white-space: nowrap;">
                                            Claimed
                                        </button>
                                    </div>
                                </div>

                                <!-- Donate Benefit 4 -->
                                <div
                                    style="display: flex; justify-content: space-between; align-items: flex-start; gap: 2rem; margin-bottom: 2rem; padding-bottom: 2rem; border-bottom: 1px solid #d1d5db;">
                                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; flex: 1;">
                                        <div>
                                            <h6
                                                style="color: #f59e0b; font-weight: 700; font-size: 0.95rem; margin-bottom: 1rem;">
                                                Total Donate</h6>
                                            <p
                                                style="color: #00bcd4; font-size: 1.1rem; font-weight: 700; margin-bottom: 0.5rem;">
                                                IDR 5.000.000</p>
                                            <p style="color: #1a1a2e; font-size: 0.9rem; margin: 0;">Bonus Title: <span
                                                    style="font-weight: 600;">Gold Supporter</span></p>
                                        </div>
                                        <div>
                                            <h6
                                                style="color: #f59e0b; font-weight: 700; font-size: 0.95rem; margin-bottom: 1rem;">
                                                Rewards</h6>
                                            <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                                                <p style="margin: 0; color: #1a1a2e; font-size: 0.9rem;">1. Infinite Planet
                                                    Ransom #3 · 10000 pcs</p>
                                                <p style="margin: 0; color: #1a1a2e; font-size: 0.9rem;">2. Golden Chest
                                                    Key · 50 pcs</p>
                                                <p style="margin: 0; color: #1a1a2e; font-size: 0.9rem;">3. Albereo's
                                                    Jewely Box · 25 pcs</p>
                                                <p style="margin: 0; color: #1a1a2e; font-size: 0.9rem;">4. Legendary
                                                    Weapon Box · 3 pcs</p>
                                                <p style="margin: 0; color: #1a1a2e; font-size: 0.9rem;">5. Exclusive Pet
                                                    Box · 1 pcs</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button
                                            style="padding: 0.7rem 2rem; background: #9ca3af; color: white; border: none; border-radius: 8px; cursor: not-allowed; font-weight: 600; font-size: 0.95rem; white-space: nowrap;">
                                            Not Eligible
                                        </button>
                                    </div>
                                </div>

                                <!-- Donate Benefit 5 -->
                                <div
                                    style="display: flex; justify-content: space-between; align-items: flex-start; gap: 2rem; margin-bottom: 1.5rem;">
                                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; flex: 1;">
                                        <div>
                                            <h6
                                                style="color: #f59e0b; font-weight: 700; font-size: 0.95rem; margin-bottom: 1rem;">
                                                Total Donate</h6>
                                            <p
                                                style="color: #00bcd4; font-size: 1.1rem; font-weight: 700; margin-bottom: 0.5rem;">
                                                IDR 10.000.000</p>
                                            <p style="color: #1a1a2e; font-size: 0.9rem; margin: 0;">Bonus Title: <span
                                                    style="font-weight: 600;">Diamond Supporter</span></p>
                                        </div>
                                        <div>
                                            <h6
                                                style="color: #f59e0b; font-weight: 700; font-size: 0.95rem; margin-bottom: 1rem;">
                                                Rewards</h6>
                                            <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                                                <p style="margin: 0; color: #1a1a2e; font-size: 0.9rem;">1. Infinite Planet
                                                    Ransom #3 · 25000 pcs</p>
                                                <p style="margin: 0; color: #1a1a2e; font-size: 0.9rem;">2. Golden Chest
                                                    Key · 100 pcs</p>
                                                <p style="margin: 0; color: #1a1a2e; font-size: 0.9rem;">3. Albereo's
                                                    Jewely Box · 50 pcs</p>
                                                <p style="margin: 0; color: #1a1a2e; font-size: 0.9rem;">4. Legendary
                                                    Weapon Box · 10 pcs</p>
                                                <p style="margin: 0; color: #1a1a2e; font-size: 0.9rem;">5. Exclusive Pet
                                                    Box · 3 pcs</p>
                                                <p style="margin: 0; color: #1a1a2e; font-size: 0.9rem;">6. Ultimate
                                                    Costume Set · 1 pcs</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button
                                            style="padding: 0.7rem 2rem; background: #9ca3af; color: white; border: none; border-radius: 8px; cursor: not-allowed; font-weight: 600; font-size: 0.95rem; white-space: nowrap;">
                                            Not Eligible
                                        </button>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <!-- Change Password Content -->
                        <div class="tab-content" id="password-content">
                            <h5 style="margin-bottom: 2rem; color: #4a148c; font-weight: 700;">Change Password</h5>

                            <form style="display: flex; flex-direction: column; gap: 1rem; max-width: 500px;">
                                <input type="password" placeholder="Old Password"
                                    style="padding: 0.8rem; border-radius: 8px; border: 1px solid #d1d5db; font-size: 0.95rem; background: white;">
                                <input type="password" placeholder="New Password"
                                    style="padding: 0.8rem; border-radius: 8px; border: 1px solid #d1d5db; font-size: 0.95rem; background: white;">
                                <input type="password" placeholder="Confirm New Password"
                                    style="padding: 0.8rem; border-radius: 8px; border: 1px solid #d1d5db; font-size: 0.95rem; background: white;">
                                <button type="submit"
                                    style="padding: 0.7rem 2rem; background: #00bcd4; color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: 600; width: fit-content; margin-top: 0.5rem; font-size: 0.95rem;">
                                    Submit
                                </button>
                            </form>

                            <!-- Divider -->
                            <div style="margin: 2.5rem 0; border-top: 1px solid #d1d5db;"></div>

                            <!-- Retrieve Bank Password -->
                            <h5 style="margin-bottom: 1.5rem; color: #4a148c; font-weight: 700;">Retrieve Bank Password
                            </h5>

                            <form style="display: flex; flex-direction: column; gap: 1rem; max-width: 500px;">
                                <input type="text" placeholder="PIN Code"
                                    style="padding: 0.8rem; border-radius: 8px; border: 1px solid #d1d5db; font-size: 0.95rem; background: white;">
                                <button type="submit"
                                    style="padding: 0.7rem 2rem; background: #00bcd4; color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: 600; width: fit-content; margin-top: 0.5rem; font-size: 0.95rem;">
                                    Submit
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
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
