@extends('master')

@section('title', 'Daftar Pegawai')
@section('page-title', 'Daftar Pegawai')

@section('content')
    @if (session('success'))
        <div id="success-alert" class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md relative" role="alert">
            <p class="font-bold">Sukses!</p>
            <p>{{ session('success') }}</p>
            <button onclick="document.getElementById('success-alert').style.display='none'" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <i class="fas fa-times text-green-500"></i>
            </button>
        </div>
    @endif

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-white">Daftar Pegawai</h2>
        <a href="{{ route('employees.create') }}" 
           class="bg-accent-purple hover:bg-purple-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">
            <i class="fas fa-plus mr-2"></i> Tambah Pegawai
        </a>
    </div>

    <div class="card-gradient rounded-2xl overflow-hidden shadow-lg border border-white/10">
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-gray-200">
                <thead class="bg-accent-purple text-white uppercase text-xs">
                    <tr>
                        <th class="text-left py-3 px-4 font-semibold">Nama Lengkap</th>
                        <th class="text-left py-3 px-4 font-semibold">Departemen</th>
                        <th class="text-left py-3 px-4 font-semibold">Jabatan</th>
                        <th class="text-left py-3 px-4 font-semibold">Email</th>
                        <th class="text-left py-3 px-4 font-semibold">Status</th>
                        <th class="text-left py-3 px-4 font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/10">
                    @forelse ($employees as $employee)
                        <tr class="hover:bg-white/5 transition">
                            <td class="py-3 px-4">{{ $employee->nama_lengkap }}</td>
                            <td class="py-3 px-4">{{ $employee->department->nama_departemen ?? 'N/A' }}</td>
                            <td class="py-3 px-4">{{ $employee->position->nama_jabatan ?? 'N/A' }}</td>
                            <td class="py-3 px-4">{{ $employee->email }}</td>
                            <td class="py-3 px-4">
                                @if (strtolower($employee->status) == 'aktif')
                                    <span class="bg-green-200 text-green-800 font-semibold py-1 px-3 rounded-full text-xs">Aktif</span>
                                @else
                                    <span class="bg-red-200 text-red-800 font-semibold py-1 px-3 rounded-full text-xs">Nonaktif</span>
                                @endif
                            </td>
                            <td class="py-3 px-4 space-x-1">
                                <a href="{{ route('employees.show', $employee->id) }}" 
                                   class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded-md text-xs font-semibold">
                                   <i class="fas fa-eye mr-1"></i> Detail
                                </a>
                                <a href="{{ route('employees.edit', $employee->id) }}" 
                                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-md text-xs font-semibold">
                                   <i class="fas fa-edit mr-1"></i> Edit
                                </a>
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" 
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-md text-xs font-semibold">
                                        <i class="fas fa-trash-alt mr-1"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-gray-400">Tidak ada data pegawai.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($employees->hasPages())
            <div class="p-4 bg-white/5 border-t border-white/10">
                {{ $employees->links() }}
            </div>
        @endif
    </div>
@endsection
