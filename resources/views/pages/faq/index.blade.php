@extends('layouts.default')

@section('title', 'FAQ')

@push('styles')
    <style>
        /* ==================== RESET & BASE STYLES ==================== */
        .faq-background {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                linear-gradient(180deg,
                    rgba(0, 0, 0, 0.95) 0%,
                    rgba(10, 20, 40, 0.85) 30%,
                    rgba(20, 40, 80, 0.75) 50%,
                    rgba(10, 20, 40, 0.85) 70%,
                    rgba(0, 0, 0, 0.95) 100%),
                url('https://images.unsplash.com/photo-1614732414444-096e5f1122d5?w=1920') center/cover no-repeat;
            z-index: -1;
        }

        .faq-background::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(ellipse at 30% 20%, rgba(30, 100, 200, 0.3), transparent 50%),
                radial-gradient(ellipse at 70% 80%, rgba(50, 80, 150, 0.2), transparent 50%);
        }

        /* ==================== FAQ CONTAINER ==================== */
        .faq-container {
            position: relative;
            z-index: 10;
            padding-top: 3rem;
            padding-bottom: 5rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* ==================== FAQ TITLE ==================== */
        .faq-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 4.5rem;
            font-weight: 900;
            color: #fff;
            margin-bottom: 2rem;
            letter-spacing: 4px;
            text-align: center;
            text-shadow:
                0 0 20px rgba(100, 150, 255, 0.8),
                0 0 40px rgba(50, 100, 200, 0.6),
                2px 2px 4px rgba(0, 0, 0, 0.8);
        }

        /* ==================== FAQ ITEMS ==================== */
        .faq-wrapper {
            background: rgba(10, 10, 15, 0.85);
            border: 2px solid rgba(60, 80, 110, 0.3);
            border-radius: 12px;
            overflow: hidden;
            box-shadow:
                0 8px 30px rgba(0, 0, 0, 0.6),
                inset 0 1px 0 rgba(255, 255, 255, 0.03);
        }

        .faq-item {
            border-bottom: 1px solid rgba(40, 50, 70, 0.25);
            transition: all 0.3s ease;
        }

        .faq-item:last-child {
            border-bottom: none;
        }

        .faq-item:hover {
            background: rgba(30, 45, 70, 0.2);
        }

        .faq-question {
            background: transparent;
            border: none;
            width: 100%;
            text-align: left;
            padding: 1.5rem 2rem;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            transition: all 0.3s ease;
        }

        .faq-question:hover {
            background: rgba(30, 45, 70, 0.3);
        }

        .faq-question-text {
            font-family: 'Orbitron', sans-serif;
            font-size: 1.1rem;
            font-weight: 600;
            color: #6dd5ff;
            letter-spacing: 0.5px;
            flex: 1;
        }

        .faq-icon {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: #6dd5ff;
            transition: transform 0.3s ease;
            flex-shrink: 0;
        }

        .faq-item.active .faq-icon {
            transform: rotate(45deg);
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease, padding 0.3s ease;
            padding: 0 2rem;
        }

        .faq-item.active .faq-answer {
            max-height: 500px;
            padding: 0 2rem 1.5rem 2rem;
        }

        .faq-answer-text {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1rem;
            color: #d0dae5;
            line-height: 1.8;
            padding: 1rem;
            background: rgba(20, 30, 45, 0.5);
            border-left: 3px solid rgba(100, 150, 255, 0.5);
            border-radius: 6px;
        }

        /* ==================== RESPONSIVE DESIGN ==================== */
        @media (max-width: 768px) {
            .faq-title {
                font-size: 2.5rem;
                margin-bottom: 1.5rem;
                letter-spacing: 2px;
            }

            .faq-question {
                padding: 1.2rem 1.5rem;
            }

            .faq-question-text {
                font-size: 1rem;
            }

            .faq-answer-text {
                font-size: 0.95rem;
            }

            .faq-item.active .faq-answer {
                padding: 0 1.5rem 1.2rem 1.5rem;
            }
        }

        @media (max-width: 576px) {
            .faq-container {
                padding-top: 2rem;
                padding-left: 1rem;
                padding-right: 1rem;
            }

            .faq-title {
                font-size: 2rem;
                letter-spacing: 1px;
            }

            .faq-question {
                padding: 1rem 1rem;
            }

            .faq-question-text {
                font-size: 0.9rem;
            }

            .faq-icon {
                font-size: 1.3rem;
            }

            .faq-answer {
                padding: 0 1rem;
            }

            .faq-item.active .faq-answer {
                padding: 0 1rem 1rem 1rem;
            }

            .faq-answer-text {
                font-size: 0.85rem;
                padding: 0.8rem;
            }
        }

        @media (max-width: 375px) {
            .faq-title {
                font-size: 1.6rem;
            }

            .faq-question-text {
                font-size: 0.85rem;
            }

            .faq-answer-text {
                font-size: 0.8rem;
                line-height: 1.6;
            }
        }
    </style>
@endpush

@section('content')
    <div class="">
        <!-- FAQ Items -->
        <div class="faq-wrapper">
            <div class="faq-item" data-id="1">
                <button class="faq-question" onclick="toggleFAQ(1)">
                    <span class="faq-question-text">Q: Apakah bisa dual login ?</span>
                    <span class="faq-icon">+</span>
                </button>
                <div class="faq-answer">
                    <div class="faq-answer-text">A: Tidak bisa</div>
                </div>
            </div>

            <div class="faq-item" data-id="2">
                <button class="faq-question" onclick="toggleFAQ(2)">
                    <span class="faq-question-text">Q: Berapa batas level PK di Seal Online Infinite?</span>
                    <span class="faq-icon">+</span>
                </button>
                <div class="faq-answer">
                    <div class="faq-answer-text">A: PK ON Level 100</div>
                </div>
            </div>

            <div class="faq-item" data-id="3">
                <button class="faq-question" onclick="toggleFAQ(3)">
                    <span class="faq-question-text">Q: Apakah RMT / Jual Beli di perbolehkan di Seal Online Infinite?</span>
                    <span class="faq-icon">+</span>
                </button>
                <div class="faq-answer">
                    <div class="faq-answer-text">A: Ya, Real Money Trading (RMT) diperbolehkan tapi dihimbau kepada player
                        untuk dapat berhati - hati dari segala jenis modus penipuan.</div>
                </div>
            </div>

            <div class="faq-item" data-id="4">
                <button class="faq-question" onclick="toggleFAQ(4)">
                    <span class="faq-question-text">Q: Apakah ada fitur Vending Offline?</span>
                    <span class="faq-icon">+</span>
                </button>
                <div class="faq-answer">
                    <div class="faq-answer-text">A: Ya!! Seal Online Infinite menyediakan fitur Vending Offline, minimal
                        power 20.000</div>
                </div>
            </div>

            <div class="faq-item" data-id="5">
                <button class="faq-question" onclick="toggleFAQ(5)">
                    <span class="faq-question-text">Q: Bagaimana cara untuk Vending Offline?</span>
                    <span class="faq-icon">+</span>
                </button>
                <div class="faq-answer">
                    <div class="faq-answer-text">A: Buka vending seperti biasa , lalu klik start Sell / Buy , kemudian ketik
                        /offline dan enter</div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function toggleFAQ(faqId) {
            const faqItem = document.querySelector(`.faq-item[data-id="${faqId}"]`);

            if (!faqItem) return;

            const isActive = faqItem.classList.contains('active');

            // Close all other FAQs
            document.querySelectorAll('.faq-item').forEach(item => {
                item.classList.remove('active');
            });

            // Toggle current FAQ
            if (!isActive) {
                faqItem.classList.add('active');
            }
        }
    </script>
@endpush
