@extends('layouts.app')

@section('title', 'Seal Infinite')

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

        .register-card {
            position: relative;
            z-index: 2;
            background: rgba(240, 240, 245, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            padding: 2.5rem 2.5rem 2rem;
            width: 100%;
            max-width: 820px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, .6),
                inset 0 1px 0 rgba(255, 255, 255, .8);
        }

        .register-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #1a1a2e;
            margin-bottom: 1.5rem;
            font-family: 'Orbitron', sans-serif;
            letter-spacing: 0.05em;
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-label {
            display: block;
            color: #2d2d44;
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .form-input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 2px solid #d1d5db;
            border-radius: 8px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: #fff;
            color: #1a1a2e;
        }

        .form-input:focus {
            outline: none;
            border-color: #4a148c;
            box-shadow: 0 0 0 3px rgba(74, 20, 140, 0.1);
        }

        .form-input::placeholder {
            color: #9ca3af;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .form-checkbox {
            display: flex;
            align-items: start;
            gap: 0.75rem;
            margin: 1.5rem 0;
        }

        .form-checkbox input[type="checkbox"] {
            margin-top: 0.25rem;
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: #4a148c;
        }

        .form-checkbox label {
            color: #4b5563;
            font-size: 0.85rem;
            line-height: 1.4;
            cursor: pointer;
        }

        .submit-btn {
            width: 100%;
            padding: 0.9rem;
            background: linear-gradient(135deg, #4a148c 0%, #1a237e 50%, #0d47a1 100%);
            color: #fff;
            border: none;
            border-radius: 10px;
            font-weight: 700;
            font-size: 1.05rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(74, 20, 140, .4);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(74, 20, 140, .5);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .register-footer {
            text-align: center;
            margin-top: 1.5rem;
            color: #6b7280;
            font-size: 0.9rem;
        }

        .register-footer a {
            color: #4a148c;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .register-footer a:hover {
            color: #1a237e;
        }
    </style>
@endpush

@section('content')
    <section class="hero">
        <div class="container" style="padding-top: 10rem">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="register-card">
                        <h2 class="register-title">Daftar Sekarang</h2>
                        <form>
                            <div class="form-group">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-input" placeholder="username Anda">
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-input" placeholder="*************">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" class="form-input" placeholder="*************">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-input" placeholder="emailanda@gmail.com">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Pin Code</label>
                                <input type="password" class="form-input" placeholder="******">
                            </div>
                            <div class="form-checkbox">
                                <input type="checkbox" id="agree" required>
                                <label for="agree">Saya setuju bahwa data diri yang terdaftar akan digunakan untuk
                                    melanjutkan registrasi</label>
                            </div>
                            <button type="submit" class="submit-btn">
                                Submit
                                <i class="bi bi-send-fill"></i>
                            </button>
                            <div class="register-footer">
                                Sudah punya akun ? <a href="#">Login disini</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
