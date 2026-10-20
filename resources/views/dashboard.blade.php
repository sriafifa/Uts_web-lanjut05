
@extends('layouts.app')

@section('title', 'Dashboard — SIMPEG')
@section('heading', 'Dashboard Overview')

@section('content')
@php
    $totalPegawai = \App\Models\Employee::count();
    $totalDepartemen = \App\Models\Department::count();
    $pegawaiTerbaru = \App\Models\Employee::latest()->take(5)->get();
@endphp

<style>
    .dash-intro{margin-bottom:24px}
    .dash-intro h2{margin:0;color:#172033;font-size:25px;font-weight:800;letter-spacing:-.8px}
    .dash-intro p{margin:7px 0 0;color:#7b8498;font-size:12px}
    .welcome-banner{position:relative;overflow:hidden;padding:34px;border-radius:22px;color:#fff;background:linear-gradient(115deg,#171c3b,#37318a 58%,#7665ed);box-shadow:0 18px 38px #37318a20}
    .welcome-banner h2{margin:18px 0 10px;font-size:clamp(25px,3vw,36px);font-weight:800;line-height:1.3;letter-spacing:-1px}
    .welcome-banner p{max-width:540px;color:#e1dfff;font-size:12px;line-height:1.9}
    .welcome-label{display:inline-block;padding:7px 12px;border:1px solid #ffffff40;border-radius:30px;font-size:9px;font-weight:800;letter-spacing:1.2px}
    .welcome-actions{display:flex;flex-wrap:wrap;gap:10px;margin-top:22px}
    .welcome-actions a{padding:12px 16px;border:1px solid #ffffff50;border-radius:10px;color:white;text-decoration:none;font-size:11px;font-weight:800}
    .welcome-actions a:first-child{background:white;color:#37318a}
    .dash-section{margin-top:30px}
    .section-head{margin-bottom:16px}
    .section-kicker{margin:0 0 5px;color:#6558ce;font-size:9px;font-weight:800;letter-spacing:1.5px}
    .section-title{margin:0;color:#20243a;font-size:18px;font-weight:800}
    .section-desc{margin:6px 0 0;color:#858ba0;font-size:11px}
    .stats-grid,.quick-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:16px}
    .stat-card{padding:23px;border:1px solid #e9ebf3;border-radius:18px;background:#fff;box-shadow:0 6px 22px #1a203c09}
    .stat-top{display:flex;align-items:center;justify-content:space-between}
    .stat-label{color:#737c91;font-size:11px;font-weight:700}
    .stat-icon,.quick-icon{display:grid;place-items:center;width:45px;height:45px;border-radius:14px;background:#f0edff;color:#6551d0;font-size:21px}
    .stat-number{margin-top:17px;color:#1c2340;font-size:36px;font-weight:800;letter-spacing:-1px}
    .stat-foot{margin-top:7px;color:#9299aa;font-size:10px}
    .quick-card{display:flex;align-items:center;gap:13px;padding:18px;border:1px solid #e9ebf3;border-radius:16px;background:#fff;text-decoration:none;transition:.2s}
    .quick-card:hover{border-color:#c9c2ff;transform:translateY(-2px);box-shadow:0 10px 24px #221f550f}
    .quick-icon{flex-shrink:0}
    .quick-card strong{display:block;color:#272b45;font-size:11px}
    .quick-card small{display:block;margin-top:5px;color:#858ba0;font-size:10px;line-height:1.6}
    .quick-arrow{margin-left:auto;color:#9289d7}
    .directory-panel{overflow:hidden;padding:0}
    .directory-head{padding:20px 23px;border-bottom:1px solid #edf0f5}
    .directory-head h3{margin:0;font-size:13px;font-weight:800}
    .employee-cell{display:flex;align-items:center;gap:11px}
    .employee-avatar{display:grid;place-items:center;width:36px;height:36px;flex-shrink:0;border-radius:11px;background:#f0edff;color:#6551d0;font-weight:800}
    .employee-name{color:#292d45;font-size:11px;font-weight:800}
    .empty-state{padding:35px;text-align:center;color:#858ba0;font-size:11px}
    .dash-footer{margin-top:30px;padding:20px 0;border-top:1px solid #e8edf3;color:#98a2b3;text-align:center;font-size:10px}
    @media(max-width:600px){.welcome-banner{padding:24px 20px}.stats-grid,.quick-grid{grid-template-columns:1fr}}
</style>

<div class="dash-intro">
    <h2>Ringkasan Kepegawaian</h2>
    <p>Selamat datang, {{ auth()->user()->name ?? 'Administrator' }}. Pantau data kepegawaian dari satu tempat.</p>
</div>

<section class="welcome-banner">
    <span class="welcome-label">✦ HUMAN RESOURCE MANAGEMENT</span>
    <h2>Halo, {{ auth()->user()->name ?? 'Administrator' }}!<br>Kelola tim dengan lebih terarah.</h2>
    <p>Informasi pegawai dan departemen tersusun dalam satu dashboard agar pekerjaan administratif lebih praktis, rapi, dan efisien.</p>
    <div class="welcome-actions">
        <a href="{{ route('employees.index') }}">Lihat Data Pegawai →</a>
        <a href="{{ route('departments.index') }}">Kelola Departemen</a>
    </div>
</section>

<section class="dash-section">
    <div class="section-head">
        <p class="section-kicker">OVERVIEW</p>
        <h3 class="section-title">Statistik Sistem</h3>
        <p class="section-desc">Jumlah data aktual yang tersimpan di database.</p>
    </div>
    <div class="stats-grid">
        <article class="stat-card">
            <div class="stat-top"><span class="stat-label">Total Pegawai</span><span class="stat-icon">♙</span></div>
            <div class="stat-number">{{ number_format($totalPegawai, 0, ',', '.') }}</div>
            <div class="stat-foot">Pegawai yang terdaftar dalam sistem</div>
        </article>
        <article class="stat-card">
            <div class="stat-top"><span class="stat-label">Total Departemen</span><span class="stat-icon">▦</span></div>
            <div class="stat-number">{{ number_format($totalDepartemen, 0, ',', '.') }}</div>
            <div class="stat-foot">Departemen yang terdaftar dalam sistem</div>
        </article>
    </div>
</section>

<section class="dash-section">
    <div class="section-head">
        <p class="section-kicker">QUICK ACCESS</p>
        <h3 class="section-title">Akses Cepat</h3>
        <p class="section-desc">Pilih aktivitas yang ingin kamu lakukan.</p>
    </div>
    <div class="quick-grid">
        <a class="quick-card" href="{{ route('employees.create') }}"><span class="quick-icon">＋</span><span><strong>Tambah Pegawai</strong><small>Daftarkan pegawai baru ke sistem.</small></span><span class="quick-arrow">→</span></a>
        <a class="quick-card" href="{{ route('departments.create') }}"><span class="quick-icon">▦</span><span><strong>Tambah Departemen</strong><small>Tambahkan departemen perusahaan.</small></span><span class="quick-arrow">→</span></a>
        <a class="quick-card" href="{{ route('employees.index') }}"><span class="quick-icon">☷</span><span><strong>Direktori Pegawai</strong><small>Lihat dan kelola data pegawai.</small></span><span class="quick-arrow">→</span></a>
        <a class="quick-card" href="{{ route('departments.index') }}"><span class="quick-icon">⌘</span><span><strong>Struktur Departemen</strong><small>Lihat dan kelola departemen.</small></span><span class="quick-arrow">→</span></a>
    </div>
</section>

<section class="dash-section">
    <div class="section-head">
        <p class="section-kicker">DIRECTORY</p>
        <h3 class="section-title">Pegawai Terbaru</h3>
        <p class="section-desc">Lima data pegawai terbaru yang tercatat di sistem.</p>
    </div>
    <div class="panel directory-panel">
        <div class="directory-head">
            <h3>Daftar Pegawai Terbaru</h3>
        </div>
        @if ($pegawaiTerbaru->isEmpty())
            <div class="empty-state">
                <p>Belum ada data pegawai.</p>
                <a class="btn" href="{{ route('employees.create') }}">＋ Tambah Pegawai</a>
            </div>
        @else
            <div class="table-wrap">
                <table>
                    <thead><tr><th>Nama Pegawai</th><th>Informasi</th><th>Terdaftar</th></tr></thead>
                    <tbody>
                    @foreach ($pegawaiTerbaru as $pegawai)
                        <tr>
                            <td><div class="employee-cell"><span class="employee-avatar">{{ strtoupper(substr($pegawai->name ?? $pegawai->nama ?? 'P', 0, 1)) }}</span><span class="employee-name">{{ $pegawai->name ?? $pegawai->nama ?? 'Nama tidak tersedia' }}</span></div></td>
                            <td>{{ $pegawai->email ?? $pegawai->nip ?? $pegawai->employee_id ?? '—' }}</td>
                            <td>{{ $pegawai->created_at ? $pegawai->created_at->format('d M Y') : '—' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</section>

<footer class="dash-footer">SIMPEG · Sistem Informasi Kepegawaian · Kelola data dengan lebih mudah</footer>
@endsection
