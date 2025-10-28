@extends('layouts.app')

@section('title', 'Account Manager')

@push('styles')
    <style>
        .hero {
            position: relative;
            min-height: 120vh;
            color: #eef3ff;
            background: url("{{ asset('images/background/hero-1.jpg') }}") center/cover no-repeat;
            z-index: 66;
        }

        .hero::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 200px;
            background: linear-gradient(to bottom, transparent, #000);
            pointer-events: none;
            z-index: 99;
        }

        .hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(1200px 600px at 25% 40%, rgba(36, 79, 170, .35), transparent 60%),
                linear-gradient(180deg,
                    rgba(0, 0, 0, .85) 0%,
                    rgba(7, 11, 22, .3) 25%,
                    rgba(7, 11, 22, .25) 50%,
                    rgba(7, 11, 22, .4) 75%,
                    rgba(0, 0, 0, .9) 100%);
            pointer-events: none;
        }

        .account-card {
            position: relative;
            z-index: 2;
            background: rgba(240, 240, 245, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            padding: 2.5rem 2.5rem 2rem;
            width: 100%;
            max-width: 900px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, .6),
                inset 0 1px 0 rgba(255, 255, 255, .8);
            margin: 3rem auto;
        }

        .account-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #1a1a2e;
            margin-bottom: 1.5rem;
            font-family: 'Orbitron', sans-serif;
            letter-spacing: 0.05em;
        }

        .account-row {
            display: flex;
            gap: 2rem;
        }

        .account-menu {
            min-width: 160px;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .account-menu-btn {
            background: #e5e7eb;
            border: none;
            border-radius: 8px;
            padding: 0.7rem 1.2rem;
            font-weight: 600;
            color: #1a1a2e;
            cursor: pointer;
            font-size: 1rem;
            margin-bottom: 0.5rem;
            transition: all 0.3s;
        }

        .account-menu-btn.active {
            background: #d1d5db;
            color: #4a148c;
            border: 2px solid #4a148c;
        }

        .account-menu-btn:not(.active):hover {
            background: #f3f4f6;
        }

        .account-divider {
            width: 2px;
            background: #d1d5db;
            margin: 0 1rem;
        }

        .account-info {
            flex: 1;
            font-size: 1.05rem;
            color: #1a1a2e;
        }

        .account-info a {
            color: #4a148c;
            font-weight: 600;
            text-decoration: none;
        }

        .account-info a:hover {
            color: #1a237e;
        }

        .account-point-red {
            color: #d32f2f;
            font-weight: 700;
        }

        .account-point-blue {
            color: #1565c0;
            font-weight: 700;
        }

        .account-point-indigo {
            color: #4a148c;
            font-weight: 700;
        }

        .tab-content {
            display: none;
            animation: fadeIn 0.3s;
        }

        .tab-content.active {
            display: block;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
@endpush

@section('content')
    <section class="hero">
        <div class="container" style="padding-top: 10rem">
            <div class="account-card">
                <div class="account-title">Account Manager</div>
                <div class="account-row">
                    <div class="account-menu">
                        <button class="account-menu-btn active" data-tab="panel">Panel Member</button>
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
                            <h3 style="margin-bottom: 1rem; color: #4a148c;">Game Management</h3>
                            <p>Manage your game characters and settings here.</p>
                            <p style="margin-top: 1rem;">Total Characters: <b>3</b></p>
                            <p>Active Server: <b>Aquilae</b></p>
                        </div>

                        <!-- Change Password Content -->
                        <div class="tab-content" id="password-content">
                            <h3 style="margin-bottom: 1rem; color: #4a148c;">Change Password</h3>
                            <form style="display: flex; flex-direction: column; gap: 1rem;">
                                <input type="password" placeholder="Current Password"
                                    style="padding: 0.7rem; border-radius: 8px; border: 1px solid #d1d5db;">
                                <input type="password" placeholder="New Password"
                                    style="padding: 0.7rem; border-radius: 8px; border: 1px solid #d1d5db;">
                                <input type="password" placeholder="Confirm New Password"
                                    style="padding: 0.7rem; border-radius: 8px; border: 1px solid #d1d5db;">
                                <button type="submit"
                                    style="padding: 0.7rem; background: #4a148c; color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: 600;">
                                    Update Password
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
                    // Remove active class from all buttons
                    menuButtons.forEach(btn => btn.classList.remove('active'));

                    // Add active class to clicked button
                    this.classList.add('active');

                    // Hide all tab contents
                    tabContents.forEach(content => content.classList.remove('active'));

                    // Show corresponding tab content
                    const tabId = this.getAttribute('data-tab') + '-content';
                    document.getElementById(tabId).classList.add('active');
                });
            });
        });
    </script>
@endpush
