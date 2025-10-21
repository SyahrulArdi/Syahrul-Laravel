@extends('master')
@section('title', 'Detail Gaji Karyawan')
@section('page-title', 'Detail Gaji')

@section('content')
    <div class="card-gradient p-8 rounded-2xl shadow-lg border border-white/10 text-gray-200 max-w-3xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-white">Detail Gaji Karyawan</h2>
            <a href="{{ route('salaries.index') }}"
                class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-lg inline-flex items-center transition duration-300 ease-in-out">
                <i class="fa fa-arrow-left mr-2"></i>
                <span>Kembali ke Daftar</span>
            </a>
        </div>

        <div class="divide-y divide-white/10">
            <div class="py-4 grid grid-cols-3 gap-4">
                <dt class="text-sm font-medium text-gray-400">Nama Karyawan</dt>
                <dd class="col-span-2 text-sm text-gray-100">{{ $salary->employee->nama_lengkap ?? 'N/A' }}</dd>
            </div>
            <div class="py-4 grid grid-cols-3 gap-4">
                <dt class="text-sm font-medium text-gray-400">Bulan Gaji</dt>
                <dd class="col-span-2 text-sm text-gray-100">{{ $salary->bulan_name }}</dd>
            </div>
            <div class="py-4 grid grid-cols-3 gap-4">
                <dt class="text-sm font-medium text-gray-400">Gaji Pokok</dt>
                <dd class="col-span-2 text-sm text-gray-100">Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}</dd>
            </div>
            <div class="py-4 grid grid-cols-3 gap-4">
                <dt class="text-sm font-medium text-gray-400">Tunjangan</dt>
                <dd class="col-span-2 text-sm text-gray-100">Rp {{ number_format($salary->tunjangan, 0, ',', '.') }}</dd>
            </div>
            <div class="py-4 grid grid-cols-3 gap-4">
                <dt class="text-sm font-medium text-gray-400">Potongan</dt>
                <dd class="col-span-2 text-sm text-gray-100">Rp {{ number_format($salary->potongan, 0, ',', '.') }}</dd>
            </div>
            <div class="py-4 grid grid-cols-3 gap-4">
                <dt class="text-sm font-bold text-gray-300">Total Gaji (Take Home Pay)</dt>
                <dd class="col-span-2 text-sm font-bold text-green-400">Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}</dd>
            </div>
            <div class="py-4 grid grid-cols-3 gap-4">
                <dt class="text-sm font-medium text-gray-400">Tanggal Input</dt>
                <dd class="col-span-2 text-sm text-gray-100">{{ $salary->created_at->format('d F Y \p\u\k\u\l H:i') }}</dd>
            </div>
            <div class="py-4 grid grid-cols-3 gap-4">
                <dt class="text-sm font-medium text-gray-400">Terakhir Diperbarui</dt>
                <dd class="col-span-2 text-sm text-gray-100">{{ $salary->updated_at->format('d F Y \p\u\k\u\l H:i') }}</dd>
            </div>
        </div>

        <div class="mt-8 flex justify-end space-x-3 border-t border-white/10 pt-6">
            <a href="{{ route('salaries.edit', $salary->id) }}"
                class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-5 rounded-lg inline-flex items-center transition duration-300 ease-in-out">
                <i class="fa fa-pencil-alt mr-2"></i>
                <span>Edit</span>
            </a>
            <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST"
                onsubmit="return confirm('Apakah Anda yakin ingin menghapus data gaji ini?');">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-5 rounded-lg inline-flex items-center transition duration-300 ease-in-out">
                    <i class="fa fa-trash mr-2"></i>
                    <span>Hapus</span>
                </button>
            </form>
        </div>
    </div>
@endsection
