@extends('layouts.app')

@section('title', 'Guild War Hall Season 2 - Event Detail')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/event-detail.css') }}">
@endpush

@section('content')
    <section class="event-detail-hero">
        <div class="container-fluid px-2 px-md-3 px-lg-4" style="padding-top: 8rem; padding-bottom: 4rem;">
            <div class="container">
                <!-- Back Button -->
                <a href="{{ url('/') }}" class="btn-back mb-4">
                    <i class="bi bi-arrow-left me-2"></i> Back to Home
                </a>

                <!-- Event Header -->
                <div class="event-header text-center mb-5">
                    <span class="event-badge">Live Event</span>
                    <h1 class="event-title">GUILD WAR HALL SEASON 2</h1>
                    <div class="event-meta">
                        <span class="event-date">
                            <i class="bi bi-calendar-event me-2"></i>
                            08 Mei - 29 Mei 2025
                        </span>
                        <span class="event-time mx-3">|</span>
                        <span class="event-time">
                            <i class="bi bi-clock me-2"></i>
                            Every Thursday, 20:30 WIB
                        </span>
                    </div>
                </div>

                <!-- Event Image -->
                <div class="event-image-container mb-5">
                    <img src="{{ asset('images/event-1.png') }}" alt="Guild War Hall Season 2" class="event-image">
                    <div class="image-overlay">
                        <div class="overlay-content">
                            <i class="bi bi-trophy-fill"></i>
                            <p>Compete for Glory!</p>
                        </div>
                    </div>
                </div>

                <!-- Event Content - Single Card -->
                <div class="event-content">
                    <div class="content-card-single">
                        <div class="markdown-content">
                            {{-- Content dari backend akan di-render di sini --}}
                            {{-- Contoh jika menggunakan variable $event->description --}}
                            {{-- {!! Str::markdown($event->description) !!} --}}

                            {{-- Hardcoded content untuk demo --}}
                            <h2>GUILD WAR HALL SEAL INFINITE SEASON 2</h2>

                            <h3>PERIODE SEASON 2: Tanggal 08 Mei - 29 Mei 2025</h3>
                            <ul>
                                <li>Jadwal GWH Setiap Hari Kamis</li>
                                <li>Waktu : Start Pukul 20.30 WIB - Selesai</li>
                                <li>GWH Minggu Pertama : 08 Mei 2025</li>
                            </ul>

                            <h3>GWH INFORMATION</h3>
                            <ul>
                                <li>Pemenang GWH Season 1 ditentukan oleh poin akumulasi selama season periode</li>
                                <li>Minimal Level peserta GWH adalah Level 271</li>
                                <li>Minimal syarat jumlah anggota agar GWH berjalan adalah 12 member guild aktif/online (2
                                    party)</li>
                                <li>Maksimal jumlah anggota GWH bisa berpartisipasi : 24 member aktif (4 party)</li>
                                <li>Poin Guild War Hall. Menang 2 Poin. Kalah 0 Poin.</li>
                                <li>Pastikan menaruh 10.000.000 cegel di bank Guild</li>
                            </ul>

                            <h3>GWH REQUIREMENT</h3>
                            <ol>
                                <li>Guild yang tidak siap dimohon tidak mendaftar. Sanksi bagi Guild yang mengundurkan diri.
                                </li>
                                <li>Guild yang berpartisipasi apabila absen sebanyak 2x selama season periode berjalan maka
                                    guild tersebut di diskualifikasi.</li>
                                <li>Setiap Guild yg mendaftar GWH WAJIB menerima tantangan dari Guild lain yg terdaftar pada
                                    saat GWH.</li>
                                <li>Masing-masing match antar Guild berlangsung 1x Match</li>
                                <li>
                                    Ketua Guild silahkan register GWH pada channel
                                    <a href="https://discord.com/channels/1327296909307678800/1359564367074426880"
                                        target="_blank">Discord</a>
                                    dengan format:
                                    <blockquote>
                                        <strong>Nama Guild :</strong><br>
                                        <strong>IGN Ketua :</strong>
                                    </blockquote>
                                </li>
                            </ol>

                            <h3>Guild War Hall Setting</h3>
                            <blockquote>
                                <ul>
                                    <li>Guild War Type : All-out War</li>
                                    <li>Guild War Map : Aleph's Alter</li>
                                    <li>Guild War K.O : 100</li>
                                    <li>Guild War Time : 5 Minutes</li>
                                    <li>Level Count : NO</li>
                                    <li>Golden War : NO</li>
                                </ul>
                            </blockquote>

                            <h3>PERATURAN GWH ON FIELD</h3>
                            <ul>
                                <li>Attack Base tidak aktif pada saat pertempuran dimulai. Area Base hanya akan aktif
                                    menjadi Warzone ketika waktu pertempuran memasuki 1 menit terakhir.</li>
                                <li>Guild yang Chicken Mode didalam kandang / jembatan lebih dari 1 Menit dinyatakan LOSE
                                </li>
                                <li>Untuk ke 2 guild yang bertanding tidak boleh berdiri di jembatan musuh lebih dari 20
                                    detik (bila ada yg diam lebih dari 20 detik silahkan kirim video full 1 match ke GM.
                                    Jika benar terjadi maka guild akan dianggap AUTO LOSE)</li>
                                <li><strong class="text-danger">Dilarang menggunakan Bug, cheat, Skill Appraisal atau Trade.
                                        (JIKA TERJADI MAKA SS DAN KIRIM KE GM) = DISKUALIFIKASI</strong></li>
                                <li><strong class="text-warning">Dilarang menggunakan Guardian jenis apapun selama GWH.
                                        Minus -1 point apabila ada anggota guild yang tetap memakai guardian saat
                                        GWH.</strong></li>
                                <li><strong class="text-danger">Dilarang keras melakukan Fake GWH</strong></li>
                                <li><strong class="text-danger">Dilarang me-REVIVE lawan yang sudah mati dan meng-kill
                                        berulang kali agar poin kill naik dengan sengaja.</strong></li>
                                <li><strong class="text-danger">Dilarang menggunakan GUARDIAN/VROOMY/SKILL FLUSH</strong>
                                </li>
                                <li>Hak masing-masing Pribadi/Guild untuk TAUNTING selama GWH berjalan dengan batasan yang
                                    wajar dan tidak mengandung Suku/Agama/Ras/Gender</li>
                                <li>Dilarang membuang item/barang apapun yang bisa mengganggu jalannya GWH</li>
                                <li>Ketua Guild yang out game/disconnected saat pertandingan GWH sudah berlangsung,
                                    pertandingan tidak diulang dan score kemenangan untuk tim lawan.</li>
                            </ul>

                            <div class="note-box">
                                <p><strong>NOTE: RULES BISA BERUBAH SEWAKTU-WAKTU BERDASARKAN KEPUTUSAN GM</strong></p>
                            </div>
                        </div>
                    </div>

                    <!-- CTA Section -->
                    <div class="cta-section text-center">
                        <h3>Ready to Join the Battle?</h3>
                        <p>Register your guild now and compete for glory!</p>
                        <a href="https://discord.com/channels/1327296909307678800/1359564367074426880" target="_blank"
                            class="btn-register">
                            <i class="bi bi-discord me-2"></i> Register Now on Discord
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
