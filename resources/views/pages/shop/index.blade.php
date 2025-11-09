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
            padding-bottom: 20rem
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

        /* ==================== RESET & BASE STYLES ==================== */
        .shop-background {
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

        .shop-background::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(ellipse at 30% 20%, rgba(30, 100, 200, 0.3), transparent 50%),
                radial-gradient(ellipse at 70% 80%, rgba(50, 80, 150, 0.2), transparent 50%);
        }

        /* ==================== SHOP CONTAINER ==================== */
        .shop-container {
            position: relative;
            z-index: 10;
            padding-top: 3rem;
            padding-bottom: 5rem;
            max-width: 1400px;
        }

        /* ==================== SHOP TITLE ==================== */
        .shop-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 4.5rem;
            font-weight: 900;
            color: #fff;
            margin-bottom: 2rem;
            letter-spacing: 4px;
            text-shadow:
                0 0 20px rgba(100, 150, 255, 0.8),
                0 0 40px rgba(50, 100, 200, 0.6),
                2px 2px 4px rgba(0, 0, 0, 0.8);
        }

        /* ==================== CATEGORY NAVIGATION ==================== */
        .category-nav-wrapper {
            margin-bottom: 1.5rem;
        }

        .category-nav {
            background: rgba(15, 15, 20, 0.95);
            border: 2px solid rgba(80, 100, 140, 0.4);
            border-radius: 10px;
            padding: 1rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 0.5rem;
            box-shadow:
                0 4px 20px rgba(0, 0, 0, 0.5),
                inset 0 1px 0 rgba(255, 255, 255, 0.05);
        }

        .category-tab {
            background: transparent;
            border: none;
            color: #aabbcc;
            padding: 0.6rem 1.3rem;
            cursor: pointer;
            font-family: 'Orbitron', sans-serif;
            font-size: 0.9rem;
            font-weight: 600;
            transition: all 0.3s ease;
            border-radius: 6px;
            white-space: nowrap;
            letter-spacing: 0.5px;
        }

        .category-tab:hover {
            color: #fff;
            background: rgba(50, 100, 180, 0.2);
            transform: translateY(-1px);
        }

        .category-tab.active {
            color: #6dd5ff;
            background: rgba(50, 100, 180, 0.3);
            box-shadow: 0 0 15px rgba(100, 180, 255, 0.3);
        }

        /* ==================== SEARCH BAR ==================== */
        .search-wrapper {
            display: flex;
            justify-content: center;
            gap: 0.6rem;
            margin-bottom: 1.5rem;
        }

        .search-box {
            width: 450px;
            background: rgba(15, 15, 20, 0.95);
            border: 2px solid rgba(80, 100, 140, 0.5);
            color: #fff;
            padding: 0.7rem 1.2rem;
            border-radius: 8px;
            font-family: 'Rajdhani', sans-serif;
            font-size: 1rem;
            transition: all 0.3s ease;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.4);
        }

        .search-box:focus {
            outline: none;
            border-color: rgba(100, 150, 255, 0.7);
            box-shadow:
                inset 0 2px 4px rgba(0, 0, 0, 0.4),
                0 0 15px rgba(100, 150, 255, 0.3);
        }

        .search-box::placeholder {
            color: rgba(255, 255, 255, 0.3);
        }

        .btn-clear,
        .btn-search {
            background: rgba(15, 15, 20, 0.95);
            border: 2px solid rgba(80, 100, 140, 0.5);
            color: #fff;
            padding: 0.7rem 1.5rem;
            cursor: pointer;
            border-radius: 8px;
            font-family: 'Orbitron', sans-serif;
            font-size: 0.9rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
        }

        .btn-clear {
            min-width: 50px;
            font-size: 1.1rem;
        }

        .btn-search {
            min-width: 100px;
        }

        .btn-clear:hover,
        .btn-search:hover {
            background: rgba(40, 60, 100, 0.8);
            border-color: rgba(100, 150, 255, 0.7);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(50, 100, 200, 0.4);
        }

        .btn-clear:active,
        .btn-search:active {
            transform: translateY(0);
        }

        /* ==================== SHOP TABLE ==================== */
        .table-wrapper {
            background: rgba(10, 10, 15, 0.85);
            border: 2px solid rgba(60, 80, 110, 0.3);
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 2rem;
            box-shadow:
                0 8px 30px rgba(0, 0, 0, 0.6),
                inset 0 1px 0 rgba(255, 255, 255, 0.03);
        }

        .shop-table {
            width: 100%;
            border-collapse: collapse;
        }

        .shop-table thead {
            background: rgba(5, 5, 10, 0.95);
            border-bottom: 1px solid rgba(60, 80, 110, 0.3);
        }

        .shop-table th {
            padding: 1.2rem 1.5rem;
            text-align: left;
            color: #b0c0d0;
            font-family: 'Orbitron', sans-serif;
            font-weight: 600;
            font-size: 0.95rem;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .shop-table th:first-child {
            padding-left: 2rem;
        }

        .shop-table td {
            padding: 1.3rem 1.5rem;
            color: #d0dae5;
            font-family: 'Rajdhani', sans-serif;
            font-size: 1rem;
            border-bottom: 1px solid rgba(40, 50, 70, 0.25);
        }

        .shop-table td:first-child {
            padding-left: 2rem;
        }

        .shop-table tbody tr {
            background: rgba(15, 20, 30, 0.5);
            transition: all 0.3s ease;
        }

        .shop-table tbody tr:hover {
            background: rgba(30, 45, 70, 0.4);
            box-shadow: inset 0 0 20px rgba(40, 80, 140, 0.15);
        }

        /* Item Cell with Image */
        .item-cell {
            display: flex;
            align-items: center;
            gap: 1.2rem;
        }

        .item-image {
            width: 55px;
            height: 55px;
            background: rgba(30, 40, 55, 0.6);
            border: 2px solid rgba(60, 80, 110, 0.4);
            border-radius: 6px;
            flex-shrink: 0;
            box-shadow:
                0 2px 8px rgba(0, 0, 0, 0.4),
                inset 0 1px 2px rgba(255, 255, 255, 0.08);
            transition: all 0.3s ease;
        }

        .shop-table tbody tr:hover .item-image {
            border-color: rgba(80, 120, 180, 0.5);
            box-shadow:
                0 0 12px rgba(80, 120, 180, 0.3),
                inset 0 1px 2px rgba(255, 255, 255, 0.1);
        }

        /* Buy Button */
        .btn-buy {
            background: rgba(15, 15, 20, 0.95);
            border: 2px solid rgba(200, 180, 100, 0.6);
            color: #ffd700;
            padding: 0.55rem 1.3rem;
            cursor: pointer;
            border-radius: 6px;
            font-family: 'Orbitron', sans-serif;
            font-size: 0.85rem;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            margin-left: 1rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.4);
        }

        .btn-buy:hover {
            background: rgba(40, 35, 20, 0.95);
            border-color: rgba(255, 215, 0, 0.9);
            color: #ffed4e;
            transform: translateY(-2px);
            box-shadow:
                0 4px 15px rgba(255, 215, 0, 0.3),
                0 0 20px rgba(255, 215, 0, 0.2);
        }

        .btn-buy:active {
            transform: translateY(0);
        }

        .btn-buy i {
            font-size: 1rem;
        }

        /* No Items Message */
        .no-items {
            padding: 4rem 2rem;
            text-align: center;
            color: #8899aa;
            font-size: 1.3rem;
            font-family: 'Orbitron', sans-serif;
        }

        /* ==================== PAGINATION ==================== */
        .pagination-wrapper {
            display: flex;
            justify-content: center;
            padding: 2rem 0;
        }

        .pagination-custom {
            display: flex;
            list-style: none;
            gap: 0.4rem;
            margin: 0;
            padding: 0;
        }

        .pagination-custom li {
            margin: 0;
        }

        .pagination-custom button {
            background: rgba(15, 15, 20, 0.95);
            border: 2px solid rgba(80, 100, 140, 0.5);
            color: #aabbcc;
            padding: 0.6rem 1rem;
            cursor: pointer;
            border-radius: 6px;
            font-family: 'Orbitron', sans-serif;
            font-size: 0.9rem;
            font-weight: 600;
            min-width: 42px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
        }

        .pagination-custom button:hover:not(:disabled) {
            background: rgba(40, 60, 100, 0.8);
            border-color: rgba(100, 150, 255, 0.7);
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(50, 100, 200, 0.4);
        }

        .pagination-custom button.active {
            background: rgba(50, 80, 140, 0.9);
            border-color: rgba(100, 150, 255, 0.8);
            color: #6dd5ff;
            box-shadow: 0 0 20px rgba(100, 150, 255, 0.4);
        }

        .pagination-custom button:disabled {
            opacity: 0.3;
            cursor: not-allowed;
        }

        .pagination-custom button:disabled:hover {
            background: rgba(15, 15, 20, 0.95);
            border-color: rgba(80, 100, 140, 0.5);
            transform: none;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
        }

        /* ==================== PAYMENT MODAL ==================== */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.85);
            z-index: 9999;
            justify-content: center;
            align-items: center;
            backdrop-filter: blur(5px);
        }

        .modal-overlay.active {
            display: flex;
        }

        .payment-modal {
            background: linear-gradient(135deg, #f5f7fa 0%, #e8ecf1 100%);
            border-radius: 20px;
            width: 90%;
            max-width: 400px;
            padding: 2rem;
            box-shadow:
                0 20px 60px rgba(0, 0, 0, 0.5),
                0 0 100px rgba(100, 150, 255, 0.2);
            animation: modalSlideIn 0.3s ease-out;
        }

        @keyframes modalSlideIn {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .modal-header {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .modal-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 1.8rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }

        .modal-body {
            margin-bottom: 1.5rem;
        }

        .description-section {
            background: rgba(255, 255, 255, 0.8);
            padding: 1.2rem;
            border-radius: 12px;
            margin-bottom: 1.2rem;
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        .description-label {
            font-family: 'Rajdhani', sans-serif;
            font-size: 0.9rem;
            color: #7f8c8d;
            margin-bottom: 0.3rem;
        }

        .item-name {
            font-family: 'Orbitron', sans-serif;
            font-size: 1.1rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 0.3rem;
        }

        .item-price {
            font-family: 'Orbitron', sans-serif;
            font-size: 1.2rem;
            font-weight: 700;
            color: #3498db;
        }

        .stock-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1.2rem;
        }

        .stock-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-family: 'Rajdhani', sans-serif;
            font-size: 0.95rem;
        }

        .stock-icon {
            font-size: 1.2rem;
        }

        .stock-label {
            color: #7f8c8d;
        }

        .stock-value {
            font-weight: 700;
            color: #f39c12;
        }

        .sold-value {
            font-weight: 700;
            color: #e74c3c;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-label {
            font-family: 'Rajdhani', sans-serif;
            font-size: 0.95rem;
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 0.5rem;
            display: block;
        }

        .form-select {
            width: 100%;
            padding: 0.8rem 1rem;
            background: white;
            border: 2px solid #dfe6e9;
            border-radius: 8px;
            font-family: 'Rajdhani', sans-serif;
            font-size: 1rem;
            color: #2c3e50;
            cursor: pointer;
            transition: all 0.3s ease;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%232c3e50' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            padding-right: 2.5rem;
        }

        .form-select:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
        }

        .form-input {
            width: 100%;
            padding: 0.8rem 1rem;
            background: white;
            border: 2px solid #dfe6e9;
            border-radius: 8px;
            font-family: 'Rajdhani', sans-serif;
            font-size: 1rem;
            color: #2c3e50;
            transition: all 0.3s ease;
        }

        .form-input:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
        }

        .form-input::placeholder {
            color: #bdc3c7;
        }

        .modal-actions {
            display: flex;
            gap: 0.8rem;
        }

        .btn-modal {
            flex: 1;
            padding: 0.9rem 1.5rem;
            border: none;
            border-radius: 10px;
            font-family: 'Orbitron', sans-serif;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-cancel {
            background: #ecf0f1;
            color: #7f8c8d;
        }

        .btn-cancel:hover {
            background: #bdc3c7;
            color: #2c3e50;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .btn-confirm {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3);
        }

        .btn-confirm:hover {
            background: linear-gradient(135deg, #2980b9 0%, #2471a3 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(52, 152, 219, 0.4);
        }

        .btn-confirm:active,
        .btn-cancel:active {
            transform: translateY(0);
        }

        /* ==================== RESPONSIVE DESIGN ==================== */
        @media (max-width: 1200px) {
            .shop-title {
                font-size: 3.5rem;
            }

            .category-nav {
                justify-content: center;
            }
        }

        @media (max-width: 768px) {
            .shop-title {
                font-size: 2.5rem;
                margin-bottom: 1.5rem;
                letter-spacing: 2px;
            }

            .category-nav {
                padding: 0.8rem;
                gap: 0.3rem;
            }

            .category-tab {
                font-size: 0.75rem;
                padding: 0.5rem 0.9rem;
            }

            .search-wrapper {
                flex-direction: column;
                align-items: stretch;
                gap: 0.5rem;
            }

            .search-box {
                width: 100%;
            }

            .btn-clear,
            .btn-search {
                width: 100%;
            }

            /* Hide table on mobile, show card layout */
            .table-wrapper {
                border: none;
                background: transparent;
            }

            .shop-table thead {
                display: none;
            }

            .shop-table,
            .shop-table tbody,
            .shop-table tr,
            .shop-table td {
                display: block;
                width: 100%;
            }

            .shop-table tr {
                background: rgba(15, 20, 30, 0.85);
                border: 2px solid rgba(60, 80, 110, 0.3);
                border-radius: 12px;
                margin-bottom: 1rem;
                padding: 1.2rem;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
            }

            .shop-table td {
                padding: 0.5rem 0;
                border: none;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .shop-table td:first-child {
                padding-left: 0;
                margin-bottom: 0.8rem;
                border-bottom: 1px solid rgba(60, 80, 110, 0.3);
                padding-bottom: 0.8rem;
            }

            .shop-table td::before {
                content: attr(data-label);
                font-weight: 700;
                color: #b0c0d0;
                font-family: 'Orbitron', sans-serif;
                font-size: 0.85rem;
                letter-spacing: 0.5px;
                text-transform: uppercase;
            }

            .shop-table td:first-child::before {
                display: none;
            }

            .item-cell {
                flex-direction: column;
                text-align: center;
                gap: 0.8rem;
                width: 100%;
            }

            .item-image {
                width: 70px;
                height: 70px;
                margin: 0 auto;
            }

            .btn-buy {
                padding: 0.6rem 1.2rem;
                font-size: 0.85rem;
                margin-left: 0;
                width: 100%;
                justify-content: center;
            }

            .pagination-custom {
                flex-wrap: wrap;
                gap: 0.3rem;
            }

            .pagination-custom button {
                padding: 0.5rem 0.8rem;
                font-size: 0.85rem;
                min-width: 38px;
            }
        }

        @media (max-width: 576px) {
            .shop-container {
                padding-top: 2rem;
                padding-left: 1rem;
                padding-right: 1rem;
            }

            .shop-title {
                font-size: 2rem;
                letter-spacing: 1px;
            }

            .category-nav {
                padding: 0.6rem;
            }

            .category-tab {
                font-size: 0.7rem;
                padding: 0.4rem 0.7rem;
            }

            .search-box {
                font-size: 0.9rem;
                padding: 0.6rem 1rem;
            }

            .btn-clear,
            .btn-search {
                padding: 0.6rem 1rem;
                font-size: 0.85rem;
            }

            .shop-table tr {
                padding: 1rem;
            }

            .shop-table td {
                font-size: 0.9rem;
            }

            .shop-table td::before {
                font-size: 0.75rem;
            }

            .item-cell span {
                font-size: 0.95rem;
            }

            .item-image {
                width: 60px;
                height: 60px;
            }

            .btn-buy {
                padding: 0.5rem 1rem;
                font-size: 0.8rem;
            }

            .no-items {
                font-size: 1.1rem;
                padding: 3rem 1rem;
            }

            /* Modal Responsive */
            .payment-modal {
                width: 95%;
                max-width: 100%;
                padding: 1.5rem;
                margin: 1rem;
            }

            .modal-title {
                font-size: 1.4rem;
            }

            .description-section {
                padding: 1rem;
            }

            .item-name {
                font-size: 0.95rem;
            }

            .item-price {
                font-size: 1rem;
            }

            .stock-info {
                flex-direction: column;
                gap: 0.5rem;
            }

            .stock-item {
                justify-content: space-between;
                width: 100%;
                padding: 0.5rem;
                background: rgba(255, 255, 255, 0.5);
                border-radius: 6px;
            }

            .form-select,
            .form-input {
                font-size: 0.9rem;
                padding: 0.7rem 0.9rem;
            }

            .modal-actions {
                flex-direction: column;
                gap: 0.6rem;
            }

            .btn-modal {
                padding: 0.8rem 1.2rem;
                font-size: 0.9rem;
            }

            .pagination-custom button {
                padding: 0.4rem 0.6rem;
                font-size: 0.75rem;
                min-width: 32px;
            }
        }

        @media (max-width: 375px) {
            .shop-title {
                font-size: 1.6rem;
            }

            .category-tab {
                font-size: 0.65rem;
                padding: 0.35rem 0.6rem;
            }

            .shop-table tr {
                padding: 0.8rem;
            }

            .item-image {
                width: 50px;
                height: 50px;
            }

            .pagination-custom button {
                padding: 0.35rem 0.5rem;
                font-size: 0.7rem;
                min-width: 28px;
            }
        }
    </style>
@endpush

@section('content')
    <section class="hero">

        <div class="container shop-container" style="padding-top: 10rem">
            <!-- Shop Title -->
            <h3 class="shop-title">SHOP</h1>

                <!-- Category Navigation -->
                <div class="category-nav-wrapper">
                    <div class="category-nav" id="categoryNav">
                        <button class="category-tab active" data-category="all">All Category</button>
                        <button class="category-tab" data-category="Item Mall">Item Mall</button>
                        <button class="category-tab" data-category="Weapon">Weapon</button>
                        <button class="category-tab" data-category="Pet">Pet</button>
                        <button class="category-tab" data-category="Accessories">Accessories</button>
                        <button class="category-tab" data-category="Quest">Quest</button>
                        <button class="category-tab" data-category="Ransum">Ransum</button>
                        <button class="category-tab" data-category="Bahan Evo">Bahan Evo</button>
                    </div>
                </div>

                <!-- Search Bar -->
                <div class="search-wrapper">
                    <input type="text" class="search-box" id="searchBox" placeholder="">
                    <button class="btn-clear" id="btnClear">X</button>
                    <button class="btn-search" id="btnSearch">Search</button>
                </div>

                <!-- Shop Table -->
                <div class="table-wrapper">
                    <table class="shop-table" id="shopTable">
                        <thead>
                            <tr>
                                <th class="col-item-name">Item Name</th>
                                <th class="col-category">Category</th>
                                <th class="col-stock">Stock</th>
                                <th class="col-price">Price</th>
                            </tr>
                        </thead>
                        <tbody id="shopTableBody">
                            <!-- Table rows will be generated by JavaScript -->
                        </tbody>
                    </table>

                    <!-- No Items Message -->
                    <div class="no-items" id="noItemsMessage" style="display: none;">
                        <p>No items found.</p>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="pagination-wrapper">
                    <nav>
                        <ul class="pagination-custom" id="pagination">
                            <!-- Pagination will be generated by JavaScript -->
                        </ul>
                    </nav>
                </div>
        </div>
        </div>
    </section>

    <div class="modal-overlay" id="paymentModal">
        <div class="payment-modal">
            <div class="modal-header">
                <h3 class="modal-title">Payment</h3>
            </div>

            <div class="modal-body">
                <div class="description-section">
                    <div class="description-label">Description:</div>
                    <div class="item-name" id="modalItemName">-</div>
                    <div class="item-price" id="modalItemPrice">0 Donate Point</div>
                </div>

                <!-- Stock Info -->
                <div class="stock-info">
                    <div class="stock-item">
                        <span class="stock-icon">📦</span>
                        <span class="stock-label">Stock:</span>
                        <span class="stock-value" id="modalStock">0</span>
                    </div>
                    <div class="stock-item">
                        <span class="stock-icon">📊</span>
                        <span class="stock-label">Sold:</span>
                        <span class="sold-value" id="modalSold">0</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Payment Method:</label>
                    <select class="form-select" id="paymentMethod">
                        <option value="">Select Payment Method</option>
                        <option value="donate_point">Donate Point</option>
                        <option value="bank_transfer">Bank Transfer</option>
                        <option value="e_wallet">E-Wallet</option>
                        <option value="credit_card">Credit Card</option>
                    </select>
                </div>

                <!-- Bank Password -->
                <div class="form-group">
                    <label class="form-label">Bank Password</label>
                    <input type="password" class="form-input" id="bankPassword" placeholder="••••••">
                </div>
            </div>

            <div class="modal-actions">
                <button class="btn-modal btn-cancel" onclick="closePaymentModal()">
                    Cancel
                </button>
                <button class="btn-modal btn-confirm" onclick="confirmPurchase()">
                    Buy
                </button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const SHOP_ITEMS = [
            // Refinement Items (10 items)
            {
                id: 1,
                name: "Albereo ToolBox - 10 Pcs",
                category: "Refinement",
                stock: "In stock",
                price: 50000
            },
            {
                id: 2,
                name: "Procyon Refinement Stone",
                category: "Refinement",
                stock: "In stock",
                price: 75000
            },
            {
                id: 3,
                name: "Deneb Enhancement Crystal",
                category: "Refinement",
                stock: "In stock",
                price: 60000
            },
            {
                id: 4,
                name: "Vega Upgrade Kit",
                category: "Refinement",
                stock: "In stock",
                price: 85000
            },
            {
                id: 5,
                name: "Sirius Fortification Set",
                category: "Refinement",
                stock: "Limited",
                price: 95000
            },
            {
                id: 6,
                name: "Capella Reinforcement Box",
                category: "Refinement",
                stock: "In stock",
                price: 55000
            },
            {
                id: 7,
                name: "Rigel Tempering Stone",
                category: "Refinement",
                stock: "In stock",
                price: 70000
            },
            {
                id: 8,
                name: "Betelgeuse Crafting Kit",
                category: "Refinement",
                stock: "In stock",
                price: 65000
            },
            {
                id: 9,
                name: "Antares Enhancement Pack",
                category: "Refinement",
                stock: "Limited",
                price: 80000
            },
            {
                id: 10,
                name: "Aldebaran Upgrade Bundle",
                category: "Refinement",
                stock: "In stock",
                price: 72000
            },

            // Weapon Items (8 items)
            {
                id: 11,
                name: "Legendary Sword of Valor",
                category: "Weapon",
                stock: "In stock",
                price: 250000
            },
            {
                id: 12,
                name: "Dragon Slayer Blade",
                category: "Weapon",
                stock: "Limited",
                price: 300000
            },
            {
                id: 13,
                name: "Mystic Staff of Elements",
                category: "Weapon",
                stock: "In stock",
                price: 220000
            },
            {
                id: 14,
                name: "Shadow Assassin Daggers",
                category: "Weapon",
                stock: "In stock",
                price: 180000
            },
            {
                id: 15,
                name: "Divine Bow of Light",
                category: "Weapon",
                stock: "Limited",
                price: 270000
            },
            {
                id: 16,
                name: "Thunder Hammer Mjolnir",
                category: "Weapon",
                stock: "In stock",
                price: 290000
            },
            {
                id: 17,
                name: "Crimson Battle Axe",
                category: "Weapon",
                stock: "In stock",
                price: 235000
            },
            {
                id: 18,
                name: "Celestial Wand",
                category: "Weapon",
                stock: "Limited",
                price: 260000
            },

            // Pet Items (6 items)
            {
                id: 19,
                name: "Baby Dragon Egg",
                category: "Pet",
                stock: "In stock",
                price: 150000
            },
            {
                id: 20,
                name: "Phoenix Companion",
                category: "Pet",
                stock: "Limited",
                price: 200000
            },
            {
                id: 21,
                name: "White Tiger Cub",
                category: "Pet",
                stock: "In stock",
                price: 120000
            },
            {
                id: 22,
                name: "Celestial Fox",
                category: "Pet",
                stock: "In stock",
                price: 140000
            },
            {
                id: 23,
                name: "Thunder Wolf Pup",
                category: "Pet",
                stock: "Limited",
                price: 180000
            },
            {
                id: 24,
                name: "Crystal Butterfly",
                category: "Pet",
                stock: "In stock",
                price: 110000
            },
            {
                id: 25,
                name: "Ring of Eternal Wisdom",
                category: "Accessories",
                stock: "In stock",
                price: 95000
            },
            {
                id: 26,
                name: "Amulet of Protection",
                category: "Accessories",
                stock: "In stock",
                price: 85000
            },
            {
                id: 27,
                name: "Crown of Kings",
                category: "Accessories",
                stock: "Limited",
                price: 350000
            },
            {
                id: 28,
                name: "Earrings of Swift Movement",
                category: "Accessories",
                stock: "In stock",
                price: 75000
            },
            {
                id: 29,
                name: "Bracelet of Strength",
                category: "Accessories",
                stock: "In stock",
                price: 80000
            },
            {
                id: 30,
                name: "Necklace of Vitality",
                category: "Accessories",
                stock: "In stock",
                price: 90000
            },
            {
                id: 31,
                name: "Belt of the Warrior",
                category: "Accessories",
                stock: "Limited",
                price: 105000
            },

            // Item Mall Items (5 items)
            {
                id: 32,
                name: "Premium Package Bundle",
                category: "Item Mall",
                stock: "In stock",
                price: 500000
            },
            {
                id: 33,
                name: "VIP Membership Card",
                category: "Item Mall",
                stock: "In stock",
                price: 300000
            },
            {
                id: 34,
                name: "Experience Boost Potion x10",
                category: "Item Mall",
                stock: "In stock",
                price: 120000
            },
            {
                id: 35,
                name: "Teleport Scroll Bundle",
                category: "Item Mall",
                stock: "In stock",
                price: 80000
            },
            {
                id: 36,
                name: "Storage Expansion Ticket",
                category: "Item Mall",
                stock: "Limited",
                price: 150000
            },

            // Quest Items (4 items)
            {
                id: 37,
                name: "Ancient Map Fragment",
                category: "Quest",
                stock: "In stock",
                price: 45000
            },
            {
                id: 38,
                name: "Sacred Relic of Old",
                category: "Quest",
                stock: "Limited",
                price: 65000
            },
            {
                id: 39,
                name: "Mysterious Key",
                category: "Quest",
                stock: "In stock",
                price: 35000
            },
            {
                id: 40,
                name: "Royal Seal",
                category: "Quest",
                stock: "In stock",
                price: 55000
            },

            // Ransum Items (5 items)
            {
                id: 41,
                name: "Health Potion Bundle x50",
                category: "Ransum",
                stock: "In stock",
                price: 25000
            },
            {
                id: 42,
                name: "Mana Elixir Pack x30",
                category: "Ransum",
                stock: "In stock",
                price: 30000
            },
            {
                id: 43,
                name: "Stamina Recovery Set",
                category: "Ransum",
                stock: "In stock",
                price: 20000
            },
            {
                id: 44,
                name: "Full Restore Package",
                category: "Ransum",
                stock: "Limited",
                price: 45000
            },
            {
                id: 45,
                name: "Emergency Heal Kit",
                category: "Ransum",
                stock: "In stock",
                price: 35000
            },

            // Bahan Evo Items (5 items)
            {
                id: 46,
                name: "Dragon Scale x10",
                category: "Bahan Evo",
                stock: "In stock",
                price: 90000
            },
            {
                id: 47,
                name: "Phoenix Feather x5",
                category: "Bahan Evo",
                stock: "Limited",
                price: 125000
            },
            {
                id: 48,
                name: "Mythril Ore Bundle",
                category: "Bahan Evo",
                stock: "In stock",
                price: 70000
            },
            {
                id: 49,
                name: "Ethereal Crystal x3",
                category: "Bahan Evo",
                stock: "In stock",
                price: 110000
            },
            {
                id: 50,
                name: "Divine Essence",
                category: "Bahan Evo",
                stock: "Limited",
                price: 150000
            }
        ];

        /**
         * Fungsi untuk mengambil data dari backend (ready untuk integrasi)
         * Uncomment fungsi ini dan comment SHOP_ITEMS untuk integrasi backend
         */
        /*
        async function fetchShopItems() {
            try {
                const response = await fetch('/api/shop-items');
                if (!response.ok) throw new Error('Failed to fetch shop items');
                const data = await response.json();
                return data;
            } catch (error) {
                console.error('Error fetching shop items:', error);
                return [];
            }
        }
        */

        /**
         * SHOP SCRIPT - Main functionality
         * Handles filtering, search, pagination, and rendering
         */

        // ==================== GLOBAL STATE ====================
        let currentPage = 1;
        let itemsPerPage = 6;
        let currentCategory = 'all';
        let searchQuery = '';
        let allItems = [...SHOP_ITEMS]; // Clone untuk tidak memodifikasi data asli
        let filteredItems = [...allItems];

        // ==================== DOM ELEMENTS ====================
        const shopTableBody = document.getElementById('shopTableBody');
        const paginationContainer = document.getElementById('pagination');
        const searchBox = document.getElementById('searchBox');
        const btnSearch = document.getElementById('btnSearch');
        const btnClear = document.getElementById('btnClear');
        const categoryTabs = document.querySelectorAll('.category-tab');
        const noItemsMessage = document.getElementById('noItemsMessage');

        // ==================== INITIALIZATION ====================
        /**
         * Initialize shop on page load
         */
        function initShop() {
            // Setup event listeners
            setupEventListeners();

            // Initial render
            applyFilters();
        }

        // ==================== EVENT LISTENERS ====================
        /**
         * Setup all event listeners
         */
        function setupEventListeners() {
            // Category tabs
            categoryTabs.forEach(tab => {
                tab.addEventListener('click', handleCategoryClick);
            });

            // Search functionality
            btnSearch.addEventListener('click', handleSearch);
            searchBox.addEventListener('keypress', (e) => {
                if (e.key === 'Enter') handleSearch();
            });

            // Clear search
            btnClear.addEventListener('click', handleClearSearch);
        }

        /**
         * Handle category tab click
         */
        function handleCategoryClick(e) {
            const tab = e.currentTarget;
            const category = tab.getAttribute('data-category');

            // Update active tab
            categoryTabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');

            // Update category and reset page
            currentCategory = category;
            currentPage = 1;

            // Apply filters
            applyFilters();
        }

        /**
         * Handle search button click
         */
        function handleSearch() {
            searchQuery = searchBox.value.trim().toLowerCase();
            currentPage = 1;
            applyFilters();
        }

        /**
         * Handle clear search button
         */
        function handleClearSearch() {
            searchBox.value = '';
            searchQuery = '';
            currentPage = 1;
            applyFilters();
        }

        // ==================== FILTERING & SEARCH ====================
        /**
         * Apply all filters (category + search)
         */
        function applyFilters() {
            filteredItems = allItems.filter(item => {
                // Category filter
                const categoryMatch = currentCategory === 'all' || item.category === currentCategory;

                // Search filter
                const searchMatch = searchQuery === '' ||
                    item.name.toLowerCase().includes(searchQuery) ||
                    item.category.toLowerCase().includes(searchQuery);

                return categoryMatch && searchMatch;
            });

            // Render table and pagination
            renderShopItems();
            renderPagination();
        }

        // ==================== RENDERING ====================
        /**
         * Render shop items in table
         */
        function renderShopItems() {
            // Clear table
            shopTableBody.innerHTML = '';

            // Check if no items
            if (filteredItems.length === 0) {
                noItemsMessage.style.display = 'block';
                paginationContainer.parentElement.style.display = 'none';
                return;
            }

            noItemsMessage.style.display = 'none';
            paginationContainer.parentElement.style.display = 'flex';

            // Calculate pagination
            const startIndex = (currentPage - 1) * itemsPerPage;
            const endIndex = startIndex + itemsPerPage;
            const itemsToShow = filteredItems.slice(startIndex, endIndex);

            // Render each item
            itemsToShow.forEach(item => {
                const row = createItemRow(item);
                shopTableBody.appendChild(row);
            });
        }

        /**
         * Create table row for an item
         */
        function createItemRow(item) {
            const tr = document.createElement('tr');

            tr.innerHTML = `
        <td>
            <div class="item-cell">
                <div class="item-image"></div>
                <span>${item.name}</span>
            </div>
        </td>
        <td data-label="Category">${item.category}</td>
        <td data-label="Stock">${item.stock}</td>
        <td data-label="Price">
            ${item.price.toLocaleString()}
            <button class="btn-buy" onclick="handleBuyItem(${item.id})">
                <i class="bi bi-cart"></i> BUY
            </button>
        </td>
    `;

            return tr;
        }

        /**
         * Render pagination controls
         */
        function renderPagination() {
            paginationContainer.innerHTML = '';

            const totalPages = Math.ceil(filteredItems.length / itemsPerPage);

            if (totalPages <= 1) {
                return; // No pagination needed
            }

            // Previous button
            const prevBtn = createPaginationButton('&lt;', currentPage === 1, () => {
                if (currentPage > 1) {
                    currentPage--;
                    applyFilters();
                }
            });
            paginationContainer.appendChild(prevBtn);

            // Page numbers
            const pageNumbers = generatePageNumbers(currentPage, totalPages);

            pageNumbers.forEach(pageNum => {
                if (pageNum === '...') {
                    const li = document.createElement('li');
                    const span = document.createElement('span');
                    span.textContent = '...';
                    span.style.padding = '0.6rem';
                    span.style.color = '#aabbcc';
                    li.appendChild(span);
                    paginationContainer.appendChild(li);
                } else {
                    const btn = createPaginationButton(
                        pageNum,
                        false,
                        () => {
                            currentPage = pageNum;
                            applyFilters();
                        },
                        pageNum === currentPage
                    );
                    paginationContainer.appendChild(btn);
                }
            });

            // Next button
            const nextBtn = createPaginationButton('&gt;', currentPage === totalPages, () => {
                if (currentPage < totalPages) {
                    currentPage++;
                    applyFilters();
                }
            });
            paginationContainer.appendChild(nextBtn);
        }

        /**
         * Create pagination button
         */
        function createPaginationButton(text, disabled, onClick, active = false) {
            const li = document.createElement('li');
            const btn = document.createElement('button');

            btn.innerHTML = text;
            btn.disabled = disabled;
            if (active) btn.classList.add('active');

            if (!disabled) {
                btn.addEventListener('click', onClick);
            }

            li.appendChild(btn);
            return li;
        }

        /**
         * Generate smart page numbers for pagination
         */
        function generatePageNumbers(current, total) {
            const pages = [];

            if (total <= 7) {
                // Show all pages if total is 7 or less
                for (let i = 1; i <= total; i++) {
                    pages.push(i);
                }
            } else {
                // Always show first page
                pages.push(1);

                if (current > 3) {
                    pages.push('...');
                }

                // Show pages around current
                for (let i = Math.max(2, current - 1); i <= Math.min(current + 1, total - 1); i++) {
                    pages.push(i);
                }

                if (current < total - 2) {
                    pages.push('...');
                }

                // Always show last page
                pages.push(total);
            }

            return pages;
        }

        // ==================== BUY FUNCTIONALITY ====================
        /**
         * Handle buy item button click
         * TODO: Integrate with backend API
         */
        function handleBuyItem(itemId) {
            const item = allItems.find(i => i.id === itemId);

            if (!item) {
                console.error('Item not found:', itemId);
                return;
            }

            // Open payment modal
            openPaymentModal(item);
        }

        // ==================== MODAL FUNCTIONALITY ====================
        let selectedItem = null;

        /**
         * Open payment modal
         */
        function openPaymentModal(item) {
            selectedItem = item;

            // Update modal content
            document.getElementById('modalItemName').textContent = item.name;
            document.getElementById('modalItemPrice').textContent = `${item.price.toLocaleString()} Donate Point`;
            document.getElementById('modalStock').textContent = Math.floor(Math.random() * 900) + 100; // Random stock
            document.getElementById('modalSold').textContent = Math.floor(Math.random() * 500) + 50; // Random sold

            // Reset form
            document.getElementById('paymentMethod').value = '';
            document.getElementById('bankPassword').value = '';

            // Show modal
            document.getElementById('paymentModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        /**
         * Close payment modal
         */
        function closePaymentModal() {
            document.getElementById('paymentModal').classList.remove('active');
            document.body.style.overflow = 'auto';
            selectedItem = null;
        }

        /**
         * Confirm purchase
         */
        function confirmPurchase() {
            const paymentMethod = document.getElementById('paymentMethod').value;
            const bankPassword = document.getElementById('bankPassword').value;

            // Validation
            if (!paymentMethod) {
                alert('Please select a payment method');
                return;
            }

            if (!bankPassword) {
                alert('Please enter your bank password');
                return;
            }

            if (!selectedItem) {
                alert('No item selected');
                return;
            }

            // TODO: Integrate with backend API
            console.log('Purchase Details:', {
                item: selectedItem,
                paymentMethod,
                bankPassword: '***hidden***'
            });

            // Success message
            alert(
                `✅ Purchase Successful!\n\nItem: ${selectedItem.name}\nPrice: ${selectedItem.price.toLocaleString()} Donate Point\nPayment: ${paymentMethod}`
            );

            // Close modal
            closePaymentModal();

            /*
            // Example backend integration:
            async function processPurchase() {
                try {
                    const response = await fetch('/api/shop/purchase', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({
                            item_id: selectedItem.id,
                            payment_method: paymentMethod,
                            bank_password: bankPassword
                        })
                    });
                    
                    const result = await response.json();
                    
                    if (response.ok) {
                        alert('✅ Purchase successful!');
                        closePaymentModal();
                        // Refresh data or update UI
                    } else {
                        alert('❌ Purchase failed: ' + result.message);
                    }
                } catch (error) {
                    console.error('Purchase error:', error);
                    alert('❌ Purchase failed. Please try again.');
                }
            }
            */
        }

        /**
         * Close modal when clicking outside
         */
        document.getElementById('paymentModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closePaymentModal();
            }
        });

        /**
         * Close modal with ESC key
         */
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closePaymentModal();
            }
        });

        // ==================== START APPLICATION ====================
        // Initialize shop when DOM is ready
        document.addEventListener('DOMContentLoaded', initShop);
    </script>
@endpush
