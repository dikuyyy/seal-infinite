    <section class="hero-5">
        <!-- Logo Container - Tambahkan di sini -->
        <div class="logo-container-hero5">
            <img src="{{ asset('images/seal-infinite.png') }}" alt="Seal Infinite Logo" class="hero5-logo">
        </div>

        <div class="container">
            <div class="row justify-content-end">
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
                                <input type="text" class="form-input" placeholder="******">
                            </div>

                            <div class="form-checkbox">
                                <input type="checkbox" id="agree">
                                <label for="agree">
                                    Saya setuju bahwa data diri yang terdaftar akan digunakan untuk melanjutkan
                                    registrasi
                                </label>
                            </div>

                            <button type="submit" class="submit-btn">
                                Submit
                                <i class="bi bi-send-fill"></i>
                            </button>

                            <div class="register-footer">
                                Sudah punya akun? <a href="#">Login disini</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
