@extends('master')

@section('title', 'Detail Jabatan')
@section('page-title', 'Detail Jabatan')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-white">Detail Jabatan</h2>
        <a href="{{ route('positions.index') }}" class="text-accent-purple hover:text-purple-400 font-medium transition">
            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar
        </a>
    </div>

    <div class="card-gradient rounded-2xl shadow-lg border border-white/10 p-8 text-gray-200 max-w-2xl mx-auto">
        <div class="space-y-6">
            <div>
                <strong class="text-gray-300 block">ID:</strong>
                <p class="text-white">{{ $position->id }}</p>
            </div>

            <div class="border-t border-white/10"></div>

            <div>
                <strong class="text-gray-300 block">Nama Jabatan:</strong>
                <p class="text-white text-lg font-medium">{{ $position->nama_jabatan }}</p>
            </div>

            <div class="border-t border-white/10"></div>

            <div>
                <strong class="text-gray-300 block">Gaji Pokok:</strong>
                <p class="text-white text-lg font-medium">Rp {{ number_format($position->gaji_pokok, 2, ',', '.') }}</p>
            </div>

            <div class="border-t border-white/10"></div>

            <div>
                <strong class="text-gray-300 block">Tanggal Dibuat:</strong>
                <p class="text-white">{{ $position->created_at->format('d F Y, H:i:s') }}</p>
            </div>

            <div class="border-t border-white/10"></div>

            <div>
                <strong class="text-gray-300 block">Tanggal Diperbarui:</strong>
                <p class="text-white">{{ $position->updated_at->format('d F Y, H:i:s') }}</p>
            </div>
        </div>

        <div class="mt-8 pt-6 border-t border-white/10 text-right">
            <a href="{{ route('positions.edit', $position->id) }}" 
               class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded-md transition duration-300 ease-in-out">
                <i class="fas fa-edit mr-2"></i> Edit Jabatan
            </a>
        </div>
    </div>
@endsection
