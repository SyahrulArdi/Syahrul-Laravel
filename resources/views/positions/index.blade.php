@extends('master')

@section('title', 'Daftar Jabatan')
@section('page-title', 'Daftar Jabatan')

@section('content')
    @if (session('success'))
        <div id="success-alert" class="bg-green-100 border-l-4 border-green-500 text-green-800 p-4 mb-6 rounded-md relative" role="alert">
            <strong class="font-bold">Sukses!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
            <button onclick="document.getElementById('success-alert').style.display='none'" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <i class="fas fa-times text-green-500"></i>
            </button>
        </div>
    @endif

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-white">Manajemen Jabatan</h2>
        <a href="{{ route('positions.create') }}"
           class="bg-accent-purple hover:bg-purple-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out inline-flex items-center">
            <i class="fas fa-plus-circle mr-2"></i>
            <span>Tambah Jabatan</span>
        </a>
    </div>

    <div class="card-gradient rounded-2xl shadow-lg border border-white/10 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-gray-200">
                <thead class="bg-accent-purple text-white uppercase text-xs">
                    <tr>
                        <th class="text-left py-3 px-4 font-semibold">No</th>
                        <th class="text-left py-3 px-4 font-semibold">Nama Jabatan</th>
                        <th class="text-left py-3 px-4 font-semibold">Gaji Pokok</th>
                        <th class="text-center py-3 px-4 font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/10">
                    @forelse ($positions as $key => $position)
                        <tr class="hover:bg-white/5 transition">
                            <td class="py-3 px-4">{{ $positions->firstItem() + $key }}</td>
                            <td class="py-3 px-4 text-white">{{ $position->nama_jabatan }}</td>
                            <td class="py-3 px-4 text-gray-300">Rp {{ number_format($position->gaji_pokok, 2, ',', '.') }}</td>
                            <td class="py-3 px-4 text-center">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('positions.show', $position->id) }}"
                                       class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded-md text-xs font-semibold">
                                       <i class="fas fa-eye mr-1"></i> Detail
                                    </a>
                                    <a href="{{ route('positions.edit', $position->id) }}"
                                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-md text-xs font-semibold">
                                       <i class="fas fa-edit mr-1"></i> Edit
                                    </a>
                                    <form action="{{ route('positions.destroy', $position->id) }}" method="POST"
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus jabatan ini?');"
                                          class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-md text-xs font-semibold">
                                            <i class="fas fa-trash-alt mr-1"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-gray-400">Tidak ada data jabatan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($positions->hasPages())
            <div class="p-4 bg-white/5 border-t border-white/10">
                {{ $positions->links() }}
            </div>
        @endif
    </div>
@endsection
