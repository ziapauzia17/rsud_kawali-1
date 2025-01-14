@extends('backend.layouts.app')

@section('title', 'Dashboard Atasan')

@section('header')
{{ __('Dashboard Atasan') }}
@endsection

@section('content')
<div class="row g-4 mb-4">

    <div class="col-12 col-lg-3">
        <div class="card shadow-sm text-center border-0">
            <div class="card-body">
                <!-- Profile Image -->
                <img src="{{ Auth::user()->image ? url('storage/' . Auth::user()->image) : url('storage/images/default.png') }}"
                    alt="User Profile" class="img-fluid rounded-circle mb-3 profile-img">

                <!-- User Name -->
                <h5 class="card-title mb-2">{{ Auth::user()->name }}</h5>

                <!-- NIP -->
                <p class="text-muted mb-3">{{ Auth::user()->nip }}</p>

                <hr />

                <!-- User Details -->
                <p class="small mb-1">
                    <strong>Pangkat:</strong> {{ Auth::user()->pangkat->name ?? 'Unknown Pangkat' }}
                </p>
                <p class="small mb-1">
                    <strong>Unit Kerja:</strong> {{ Auth::user()->unit_kerja ?? 'Unknown Unit' }}
                </p>
                <p class="small mb-1">
                    <strong>TMT Jabatan:</strong> {{ Auth::user()->tmt_jabatan ?? 'Unknown TMT' }}
                </p>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-9">
        <div class="card shadow-sm rounded">
            <div class="card-header">
                <h6 class="m-0">Pilih Pegawai</h6>
            </div>
            <div class="card-body">
                <select id="select-pegawai" class="form-select">
                    <option value="">--Pilih--</option>
                    @foreach($pegawaiList as $pegawai)
                    <option value="{{ $pegawai->user_id }}">
                        {{ $pegawai->user->name }} -
                        {{ $pegawai->user->nip }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-12 mt-4">
            <div id="grafik-container" class="mt-4">
                <p class="text-center text-muted">Pilih pegawai untuk melihat grafik evaluasi.</p>
            </div>
        </div>
    </div>

</div>
@endsection

@push('js')
<script src="{{ asset('assets/backend/js/dash_atasan.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>
@endpush