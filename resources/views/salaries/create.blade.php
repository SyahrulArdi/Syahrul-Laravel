@extends('master')
@section('title', 'Input Gaji Baru')
@section('page-title', 'Input Gaji')

@section('content')
    <div class="card-gradient p-8 rounded-2xl shadow-lg border border-white/10 text-gray-200 max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-white">Formulir Input Gaji</h2>
            <a href="{{ route('salaries.index') }}"
                class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-lg inline-flex items-center transition duration-300 ease-in-out">
                <i class="fa fa-arrow-left mr-2"></i>
                <span>Kembali</span>
            </a>
        </div>

        @if ($errors->any())
            <div class="bg-red-500/10 border border-red-500/50 text-red-400 p-4 mb-4 rounded-md" role="alert">
                <strong class="font-bold">Oops! Ada kesalahan:</strong>
                <ul class="list-disc pl-5 mt-2 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('salaries.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="karyawan_id" class="block text-sm font-medium text-gray-300 mb-1">Karyawan</label>
                    <select id="karyawan_id" name="karyawan_id"
                        class="block w-full px-3 py-2 bg-white/10 border border-white/20 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                        required>
                        <option value="">Pilih Karyawan</option>
                        @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}"
                                {{ old('karyawan_id') == $employee->id ? 'selected' : '' }}>
                                {{ $employee->nama_lengkap }} ({{ $employee->nik ?? $employee->id }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="bulan_input" class="block text-sm font-medium text-gray-300 mb-1">Bulan</label>
                    <select id="bulan_input" name="bulan_input"
                        class="block w-full px-3 py-2 bg-white/10 border border-white/20 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                        required>
                        <option value="">Pilih Bulan</option>
                        @foreach ($months as $key => $name)
                            <option value="{{ $key }}" {{ old('bulan_input') == $key ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="gaji_pokok" class="block text-sm font-medium text-gray-300 mb-1">Gaji Pokok (Rp)</label>
                    <input type="number" id="gaji_pokok" name="gaji_pokok"
                        value="{{ old('gaji_pokok') }}"
                        class="block w-full px-3 py-2 bg-white/10 border border-white/20 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                        required min="0">
                </div>

                <div>
                    <label for="tunjangan" class="block text-sm font-medium text-gray-300 mb-1">Tunjangan (Rp)</label>
                    <input type="number" id="tunjangan" name="tunjangan"
                        value="{{ old('tunjangan', 0) }}"
                        class="block w-full px-3 py-2 bg-white/10 border border-white/20 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                        required min="0">
                </div>

                <div>
                    <label for="potongan" class="block text-sm font-medium text-gray-300 mb-1">Potongan (Rp)</label>
                    <input type="number" id="potongan" name="potongan"
                        value="{{ old('potongan', 0) }}"
                        class="block w-full px-3 py-2 bg-white/10 border border-white/20 rounded-md text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                        required min="0">
                </div>
            </div>

            <div class="mt-8 text-right border-t border-white/10 pt-6">
                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-6 rounded-lg inline-flex items-center transition duration-300 ease-in-out">
                    <i class="fa fa-save mr-2"></i>
                    <span>Simpan Data</span>
                </button>
            </div>
        </form>
    </div>
@endsection
