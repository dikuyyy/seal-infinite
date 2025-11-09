@extends('layouts.app')

@section('title', 'Seal Infinite - Download')

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

        .download-container {
            position: relative;
            z-index: 100;
        }

        .download-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 30px;
            padding: 50px 40px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.2);
            animation: fadeInUp 0.8s ease;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .download-title {
            font-size: 3rem;
            font-weight: 800;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 15px;
            animation: slideInLeft 0.8s ease;
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .download-subtitle {
            color: #64748b;
            font-size: 1.1rem;
            margin-bottom: 40px;
            animation: slideInRight 0.8s ease;
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .server-buttons {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-top: 40px;
        }

        .server-btn {
            position: relative;
            padding: 25px 35px;
            font-size: 1.1rem;
            font-weight: 700;
            border: none;
            border-radius: 18px;
            overflow: hidden;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            animation: scaleIn 0.6s ease backwards;
        }

        .server-btn:nth-child(1) {
            animation-delay: 0.2s;
        }

        .server-btn:nth-child(2) {
            animation-delay: 0.3s;
        }

        .server-btn:nth-child(3) {
            animation-delay: 0.4s;
        }

        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.8);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .server-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: left 0.6s;
        }

        .server-btn:hover::before {
            left: 100%;
        }

        .server-btn::after {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 18px;
            padding: 3px;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.5));
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0;
            transition: opacity 0.4s;
        }

        .server-btn:hover::after {
            opacity: 1;
        }

        .server-btn-1 {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .server-btn-1:hover {
            transform: translateY(-8px) scale(1.05);
            box-shadow: 0 20px 40px rgba(102, 126, 234, 0.4);
        }

        .server-btn-2 {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
        }

        .server-btn-2:hover {
            transform: translateY(-8px) scale(1.05);
            box-shadow: 0 20px 40px rgba(240, 147, 251, 0.4);
        }

        .server-btn-3 {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            color: white;
        }

        .server-btn-3:hover {
            transform: translateY(-8px) scale(1.05);
            box-shadow: 0 20px 40px rgba(79, 172, 254, 0.4);
        }

        .server-btn:active {
            transform: translateY(-5px) scale(1.02);
        }

        .server-icon {
            font-size: 1.5rem;
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .server-btn:hover .server-icon {
            transform: rotate(360deg) scale(1.2);
        }

        .download-info {
            margin-top: 40px;
            padding: 25px;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
            border-radius: 18px;
            border-left: 4px solid #667eea;
            animation: fadeIn 1s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .download-info h5 {
            color: #1e293b;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .download-info ul {
            margin: 0;
            padding-left: 20px;
        }

        .download-info li {
            color: #64748b;
            margin-bottom: 10px;
            line-height: 1.6;
        }

        .badge-new {
            position: absolute;
            top: -10px;
            right: -10px;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 700;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }
        }

        .server-status {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9rem;
            margin-top: 8px;
        }

        .status-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            animation: blink 2s infinite;
        }

        .status-online {
            background: #10b981;
        }

        .status-offline {
            background: #ef4444;
        }

        @keyframes blink {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.3;
            }
        }

        @media (max-width: 768px) {
            .download-title {
                font-size: 2rem;
            }

            .download-card {
                padding: 35px 25px;
            }

            .server-buttons {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endpush

@section('content')
    <section class="hero">
        <div class="container download-container" style="padding-top: 10rem">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-9">
                    <div class="download-card">
                        <div class="text-center">
                            <h1 class="download-title">Download Game</h1>
                            <p class="download-subtitle">Choose your preferred server to start downloading</p>
                        </div>

                        <div class="server-buttons">
                            <!-- Server 1 -->
                            <a href="#" class="server-btn server-btn-1" data-server="1">
                                <span class="server-icon">🚀</span>
                                <div>
                                    <div>Server 1</div>
                                    <div class="server-status">
                                        <span class="status-dot status-online"></span>
                                        <small>Online - Fast</small>
                                    </div>
                                </div>
                                <span class="badge-new">NEW</span>
                            </a>

                            <!-- Server 2 -->
                            <a href="#" class="server-btn server-btn-2" data-server="2">
                                <span class="server-icon">⚡</span>
                                <div>
                                    <div>Server 2</div>
                                    <div class="server-status">
                                        <span class="status-dot status-online"></span>
                                        <small>Online - Stable</small>
                                    </div>
                                </div>
                            </a>

                            <!-- Server 3 -->
                            <a href="#" class="server-btn server-btn-3" data-server="3">
                                <span class="server-icon">💎</span>
                                <div>
                                    <div>Server 3</div>
                                    <div class="server-status">
                                        <span class="status-dot status-online"></span>
                                        <small>Online - Premium</small>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="download-info">
                            <h5>📋 Download Instructions:</h5>
                            <ul>
                                <li>Select any server above to start downloading the game</li>
                                <li>File size: Approximately 2.5 GB</li>
                                <li>Recommended: Use download manager for faster downloads</li>
                                <li>After download completes, extract and run the installer</li>
                                <li>Make sure you have stable internet connection</li>
                            </ul>
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
            const serverButtons = document.querySelectorAll('.server-btn');

            serverButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const serverNumber = this.getAttribute('data-server');

                    // Add click animation
                    this.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        this.style.transform = '';
                    }, 150);

                    // Show loading state
                    const originalContent = this.innerHTML;
                    this.innerHTML =
                        '<span class="spinner-border spinner-border-sm me-2"></span>Preparing Download...';
                    this.style.pointerEvents = 'none';

                    // Simulate download preparation
                    setTimeout(() => {
                        // Create temporary link
                        const link = document.createElement('a');
                        link.href =
                            `/download/server${serverNumber}`; // Replace with actual download URL
                        link.download = `seal-infinite-setup-server${serverNumber}.exe`;
                        document.body.appendChild(link);
                        link.click();
                        document.body.removeChild(link);

                        // Restore button
                        this.innerHTML = originalContent;
                        this.style.pointerEvents = '';

                        // Show success message
                        showNotification(`Download started from Server ${serverNumber}!`,
                            'success');
                    }, 1500);
                });

                // Add ripple effect on click
                button.addEventListener('mousedown', function(e) {
                    const ripple = document.createElement('span');
                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;

                    ripple.style.cssText = `
                        position: absolute;
                        width: ${size}px;
                        height: ${size}px;
                        border-radius: 50%;
                        background: rgba(255, 255, 255, 0.5);
                        left: ${x}px;
                        top: ${y}px;
                        pointer-events: none;
                        animation: ripple 0.6s ease-out;
                    `;

                    this.appendChild(ripple);

                    setTimeout(() => ripple.remove(), 600);
                });
            });

            // Add ripple animation
            const style = document.createElement('style');
            style.textContent = `
                @keyframes ripple {
                    to {
                        transform: scale(4);
                        opacity: 0;
                    }
                }
            `;
            document.head.appendChild(style);

            // Notification function
            function showNotification(message, type = 'success') {
                const notification = document.createElement('div');
                notification.style.cssText = `
                    position: fixed;
                    top: 20px;
                    right: 20px;
                    padding: 15px 25px;
                    background: ${type === 'success' ? 'linear-gradient(135deg, #10b981 0%, #059669 100%)' : 'linear-gradient(135deg, #ef4444 0%, #dc2626 100%)'};
                    color: white;
                    border-radius: 10px;
                    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
                    z-index: 10000;
                    animation: slideInRight 0.3s ease, slideOutRight 0.3s ease 2.7s;
                    font-weight: 600;
                `;
                notification.textContent = message;

                const closeStyle = document.createElement('style');
                closeStyle.textContent = `
                    @keyframes slideInRight {
                        from {
                            transform: translateX(400px);
                            opacity: 0;
                        }
                        to {
                            transform: translateX(0);
                            opacity: 1;
                        }
                    }
                    @keyframes slideOutRight {
                        from {
                            transform: translateX(0);
                            opacity: 1;
                        }
                        to {
                            transform: translateX(400px);
                            opacity: 0;
                        }
                    }
                `;
                document.head.appendChild(closeStyle);

                document.body.appendChild(notification);

                setTimeout(() => notification.remove(), 3000);
            }

            // Add parallax effect on mouse move
            const downloadCard = document.querySelector('.download-card');
            document.addEventListener('mousemove', function(e) {
                const x = (e.clientX - window.innerWidth / 2) / 50;
                const y = (e.clientY - window.innerHeight / 2) / 50;
                downloadCard.style.transform = `perspective(1000px) rotateY(${x}deg) rotateX(${-y}deg)`;
            });

            document.addEventListener('mouseleave', function() {
                downloadCard.style.transform = '';
            });
        });
    </script>
@endpush
