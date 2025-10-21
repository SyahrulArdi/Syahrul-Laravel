@extends('master')
@section('title', 'Detail Absensi')
@section('page-title', 'Detail Absensi Pegawai')

@section('content')
    <div class="card-gradient p-8 rounded-2xl shadow-lg border border-white/10 max-w-2xl mx-auto text-gray-200">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-white">Detail Absensi</h2>
            <a href="{{ route('attendances.index') }}" class="text-indigo-400 hover:text-indigo-300 font-semibold transition">
                &larr; Kembali ke Daftar
            </a>
        </div>

        <div class="space-y-5 border-t border-white/10 pt-6">
            <div>
                <strong class="text-gray-300 block">Nama Karyawan:</strong>
                <p class="text-gray-100 text-lg">{{ $attendance->employee->nama_lengkap ?? 'Karyawan Dihapus' }}</p>
            </div>

            <div class="border-t border-white/10 pt-4">
                <strong class="text-gray-300 block">Tanggal:</strong>
                <p class="text-gray-100">{{ \Carbon\Carbon::parse($attendance->tanggal)->format('d F Y') }}</p>
            </div>

            <div class="border-t border-white/10 pt-4">
                <strong class="text-gray-300 block">Status Absensi:</strong>
                <p class="mt-2">
                    <span class="px-2 py-1 font-semibold leading-tight rounded-full text-sm
                        @if($attendance->status_absensi == 'Hadir') bg-green-600/30 text-green-300
                        @elseif($attendance->status_absensi == 'Izin') bg-blue-600/30 text-blue-300
                        @elseif($attendance->status_absensi == 'Sakit') bg-yellow-600/30 text-yellow-300
                        @else bg-red-600/30 text-red-300 @endif">
                        {{ $attendance->status_absensi }}
                    </span>
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 border-t border-white/10 pt-4">
                <div>
                    <strong class="text-gray-300 block">Waktu Masuk:</strong>
                    <p class="text-gray-100">{{ $attendance->waktu_masuk ?? 'Tidak tercatat' }}</p>
                </div>
                <div>
                    <strong class="text-gray-300 block">Waktu Keluar:</strong>
                    <p class="text-gray-100">{{ $attendance->waktu_keluar ?? 'Tidak tercatat' }}</p>
                </div>
            </div>
        </div>

        <div class="mt-8 pt-6 border-t border-white/10 text-right">
            <a href="{{ route('attendances.edit', $attendance->id) }}"
                class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-300">
                Edit Absensi
            </a>
        </div>
    </div>
@endsection
