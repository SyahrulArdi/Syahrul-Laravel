@extends('master')
@section('title', 'Daftar Gaji Karyawan')
@section('page-title', 'Daftar Gaji')

@section('content')
    <div class="card-gradient p-6 rounded-2xl shadow-lg border border-white/10 text-gray-200">
        @if (session('success'))
            <div class="bg-green-900/40 border border-green-500 text-green-200 px-4 py-3 rounded-md mb-4" role="alert">
                <strong class="font-bold">Sukses!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-900/40 border border-red-500 text-red-200 px-4 py-3 rounded-md mb-4" role="alert">
                <strong class="font-bold">Gagal!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-white">Manajemen Gaji</h2>
            <a href="{{ route('salaries.create') }}"
                class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg inline-flex items-center transition duration-300 ease-in-out">
                <i class="fa fa-plus-circle mr-2"></i>
                <span>Input Gaji Baru</span>
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white/10 backdrop-blur-md rounded-lg overflow-hidden text-gray-100">
                <thead class="bg-gradient-to-r from-indigo-800 to-purple-800 text-white">
                    <tr>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">No</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Karyawan</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Bulan</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Gaji Pokok</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Tunjangan</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Potongan</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Total Gaji</th>
                        <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/10">
                    @forelse ($salaries as $key => $salary)
                        <tr class="hover:bg-white/5 transition duration-200">
                            <td class="text-left py-3 px-4">{{ $salaries->firstItem() + $key }}</td>
                            <td class="text-left py-3 px-4">{{ $salary->employee->nama_lengkap ?? 'N/A' }}</td>
                            <td class="text-left py-3 px-4">{{ $salary->bulan_name }}</td>
                            <td class="text-left py-3 px-4">Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}</td>
                            <td class="text-left py-3 px-4">Rp {{ number_format($salary->tunjangan, 0, ',', '.') }}</td>
                            <td class="text-left py-3 px-4">Rp {{ number_format($salary->potongan, 0, ',', '.') }}</td>
                            <td class="text-left py-3 px-4 font-bold text-green-400">Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}</td>
                            <td class="text-center py-3 px-4">
                                <div class="flex item-center justify-center space-x-2">
                                    <a href="{{ route('salaries.show', $salary->id) }}"
                                        class="text-blue-400 hover:text-blue-300 font-semibold text-sm">Detail</a>
                                    <a href="{{ route('salaries.edit', $salary->id) }}"
                                        class="text-yellow-400 hover:text-yellow-300 font-semibold text-sm">Edit</a>
                                    <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data gaji ini?');"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-400 hover:text-red-300 font-semibold text-sm">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-4 text-gray-400">Tidak ada data gaji.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($salaries->hasPages())
            <div class="mt-6">
                {{ $salaries->links() }}
            </div>
        @endif
    </div>
@endsection
