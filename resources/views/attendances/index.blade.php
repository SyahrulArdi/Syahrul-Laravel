@extends('master')
@section('title', 'Daftar Absensi')
@section('page-title', 'Manajemen Absensi')

@section('content')
    <div class="card-gradient p-6 rounded-2xl shadow-lg border border-white/10 text-gray-200">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-white">Daftar Absensi Karyawan</h2>
            <a href="{{ route('attendances.create') }}"
                class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 ease-in-out">
                <i class="fas fa-plus mr-2"></i> Tambah Absensi
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-900/40 border border-green-500 text-green-200 px-4 py-3 rounded-md mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white/10 backdrop-blur-md rounded-lg overflow-hidden text-gray-100">
                <thead class="bg-gradient-to-r from-indigo-800 to-purple-800 text-white">
                    <tr>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Nama Karyawan</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Tanggal</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Status</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Waktu Masuk</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Waktu Keluar</th>
                        <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/10">
                    @forelse ($attendances as $attendance)
                        <tr class="hover:bg-white/5 transition duration-200">
                            <td class="py-3 px-4">{{ $attendance->employee->nama_lengkap ?? 'Karyawan Dihapus' }}</td>
                            <td class="py-3 px-4">{{ \Carbon\Carbon::parse($attendance->tanggal)->format('d F Y') }}</td>
                            <td class="py-3 px-4">
                                <span class="px-2 py-1 font-semibold leading-tight rounded-full text-xs
                                    @if($attendance->status_absensi == 'Hadir') bg-green-600/30 text-green-300
                                    @elseif($attendance->status_absensi == 'Izin') bg-blue-600/30 text-blue-300
                                    @elseif($attendance->status_absensi == 'Sakit') bg-yellow-600/30 text-yellow-300
                                    @else bg-red-600/30 text-red-300 @endif">
                                    {{ $attendance->status_absensi }}
                                </span>
                            </td>
                            <td class="py-3 px-4">{{ $attendance->waktu_masuk ?? '-' }}</td>
                            <td class="py-3 px-4">{{ $attendance->waktu_keluar ?? '-' }}</td>
                            <td class="py-3 px-4 text-center">
                                <form action="{{ route('attendances.destroy', $attendance->id) }}" method="POST"
                                    onsubmit="return confirm('Anda yakin ingin menghapus data ini?');" class="inline-flex">
                                    <a href="{{ route('attendances.show', $attendance->id) }}"
                                        class="text-blue-400 hover:text-blue-300 mr-3" title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('attendances.edit', $attendance->id) }}"
                                        class="text-yellow-400 hover:text-yellow-300 mr-3" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-300" title="Hapus">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-gray-400">
                                Tidak ada data absensi.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $attendances->links() }}
        </div>
    </div>
@endsection
