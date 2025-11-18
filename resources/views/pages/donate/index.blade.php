@extends('layouts.default')

@section('title', 'Donation')

@push('styles')
    <style>
        .btn-primary {
            background: linear-gradient(90deg, #0ea5e9 0%, #06b6d4 100%);
            border: none;
            padding: 15px;
            font-weight: 600;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(14, 165, 233, 0.4);
        }

        .form-control,
        .form-select {
            border-radius: 10px;
            border: 1px solid #e2e8f0;
            padding: 12px 16px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #0ea5e9;
            box-shadow: 0 0 0 0.2rem rgba(14, 165, 233, 0.15);
        }

        .rounded-4 {
            border-radius: 20px !important;
        }
    </style>
@endpush

@section('hide-title', true)

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-4 p-md-5">
                    <h2 class="fw-bold mb-4">Donation</h2>

                    <!-- Payment Methods -->
                    <div class="d-flex flex-wrap gap-3 mb-4 align-items-center">
                        <img src="{{ asset('images/dana.png') }}" alt="DANA" height="30">
                        <img src="{{ asset('images/gopay.png') }}" alt="GoPay" height="30">
                        <img src="{{ asset('images/linkaja.png') }}" alt="LinkAja" height="30">
                        <img src="{{ asset('images/ovo.png') }}" alt="OVO" height="30">
                        <img src="{{ asset('images/shopeepay.png') }}" alt="ShopeePay" height="30">
                        <img src="{{ asset('images/bca.png') }}" alt="BCA" height="30">
                        <img src="{{ asset('images/cimb.svg') }}" alt="CIMB Niaga" height="30">
                    </div>

                    <!-- Voucher Selection -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Voucher</label>
                        <select class="form-select form-select-lg" id="voucherSelect">
                            <option selected disabled>Select Voucher</option>
                            <option value="10000">Rp 10.000</option>
                            <option value="25000">Rp 25.000</option>
                            <option value="50000">Rp 50.000</option>
                            <option value="100000">Rp 100.000</option>
                            <option value="250000">Rp 250.000</option>
                            <option value="500000">Rp 500.000</option>
                            <option value="1000000">Rp 1.000.000</option>
                        </select>
                    </div>

                    <!-- Referral Code -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Referral Code</label>
                        <input type="text" class="form-control form-control-lg" id="referralCode" placeholder="*******">
                    </div>

                    <!-- Submit Button -->
                    <button type="button" class="btn btn-primary btn-lg w-100 mb-4" id="payButton">
                        Bayar dengan Qris
                    </button>

                    <!-- Instructions -->
                    <ul class="text-muted small">
                        <li class="mb-2">After Generate QR, please scan it using your favorite digital wallet
                            before
                            expired in 10 minutes.</li>
                        <li>Please reload this page and your will be automatically sent into your account (real
                            time).
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const payButton = document.getElementById('payButton');
            const voucherSelect = document.getElementById('voucherSelect');
            const referralCode = document.getElementById('referralCode');

            payButton.addEventListener('click', function() {
                const voucher = voucherSelect.value;
                const referral = referralCode.value;

                if (!voucher || voucher === 'Select Voucher') {
                    alert('Please select a voucher amount');
                    return;
                }

                // Simulasi proses pembayaran
                const confirmPayment = confirm(
                    `Confirm payment of Rp ${parseInt(voucher).toLocaleString('id-ID')}?`);

                if (confirmPayment) {
                    // Kirim data ke server
                    // Contoh menggunakan fetch API
                    /*
                    fetch('/donation/process', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({
                            voucher: voucher,
                            referral_code: referral
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('QR Code generated successfully!');
                            // Redirect atau tampilkan QR
                        }
                    });
                    */

                    alert('Processing payment... QR Code will be generated.');
                }
            });

            // Format input referral code
            referralCode.addEventListener('input', function(e) {
                this.value = this.value.toUpperCase();
            });
        });
    </script>
@endpush
