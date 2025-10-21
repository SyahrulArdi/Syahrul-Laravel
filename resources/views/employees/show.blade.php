@extends('master')

@section('title', 'Detail Pegawai')
@section('page-title', 'Detail Pegawai')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-white">Detail Pegawai</h2>
        <a href="{{ route('employees.index') }}" class="text-accent-purple hover:text-purple-400 font-medium transition">
            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar
        </a>
    </div>

    <div class="card-gradient rounded-2xl shadow-lg border border-white/10 p-8 text-gray-200">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-6 border-t border-white/10 pt-6">
            <!-- Kolom Kiri -->
            <div class="space-y-6">
                <div>
                    <strong class="text-gray-300 block">Nama Lengkap:</strong>
                    <p class="text-white text-lg font-medium">{{ $employee->nama_lengkap }}</p>
                </div>
                <div>
                    <strong class="text-gray-300 block">Nomor Telepon:</strong>
                    <p class="text-white">{{ $employee->nomor_telepon ?? 'N/A' }}</p>
                </div>
                <div>
                    <strong class="text-gray-300 block">Departemen:</strong>
                    <p class="text-white">{{ $employee->department->nama_departemen ?? 'N/A' }}</p>
                </div>
                <div>
                    <strong class="text-gray-300 block">Tanggal Masuk:</strong>
                    <p class="text-white">{{ \Carbon\Carbon::parse($employee->tanggal_masuk)->format('d F Y') }}</p>
                </div>
            </div>

            <!-- Kolom Kanan -->
            <div class="space-y-6">
                <div>
                    <strong class="text-gray-300 block">Email:</strong>
                    <p class="text-white">{{ $employee->email }}</p>
                </div>
                <div>
                    <strong class="text-gray-300 block">Tanggal Lahir:</strong>
                    <p class="text-white">{{ \Carbon\Carbon::parse($employee->tanggal_lahir)->format('d F Y') }}</p>
                </div>
                <div>
                    <strong class="text-gray-300 block">Jabatan:</strong>
                    <p class="text-white">{{ $employee->position->nama_jabatan ?? 'N/A' }}</p>
                </div>
                <div>
                    <strong class="text-gray-300 block">Status:</strong>
                    <p class="mt-1">
                        @if (strtolower($employee->status) == 'aktif')
                            <span class="bg-green-200 text-green-900 font-semibold py-1 px-3 rounded-full text-xs">Aktif</span>
                        @else
                            <span class="bg-red-200 text-red-900 font-semibold py-1 px-3 rounded-full text-xs">Nonaktif</span>
                        @endif
                    </p>
                </div>
            </div>

            <!-- Alamat -->
            <div class="md:col-span-2">
                <strong class="text-gray-300 block">Alamat:</strong>
                <p class="text-white">{{ $employee->alamat ?? 'N/A' }}</p>
            </div>
        </div>

        <div class="mt-8 pt-6 border-t border-white/10 text-right">
            <a href="{{ route('employees.edit', $employee->id) }}" 
               class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded-md transition duration-300 ease-in-out">
                <i class="fas fa-edit mr-2"></i> Edit Pegawai
            </a>
        </div>
    </div>
@endsection
