@extends('master')
@section('title', 'Edit Absensi')
@section('page-title', 'Edit Data Absensi')

@section('content')
    <div class="card-gradient p-8 rounded-2xl shadow-lg border border-white/10 max-w-2xl mx-auto text-gray-200">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-white">Formulir Edit Absensi</h2>
            <a href="{{ route('attendances.index') }}" class="text-indigo-400 hover:text-indigo-300 font-semibold transition">
                &larr; Kembali
            </a>
        </div>

        <form action="{{ route('attendances.update', $attendance->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label for="karyawan_id" class="block text-gray-300 font-semibold mb-2">Karyawan</label>
                    <select id="karyawan_id" name="karyawan_id"
                        class="w-full px-4 py-2 bg-white/10 border border-white/20 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 text-gray-100"
                        required>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}"
                                {{ old('karyawan_id', $attendance->karyawan_id) == $employee->id ? 'selected' : '' }}>
                                {{ $employee->nama_lengkap }}
                            </option>
                        @endforeach
                    </select>
                    @error('karyawan_id') <span class="text-red-400 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="tanggal" class="block text-gray-300 font-semibold mb-2">Tanggal</label>
                    <input type="date" id="tanggal" name="tanggal"
                        value="{{ old('tanggal', $attendance->tanggal) }}"
                        class="w-full px-4 py-2 bg-white/10 border border-white/20 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 text-gray-100"
                        required>
                    @error('tanggal') <span class="text-red-400 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="status_absensi" class="block text-gray-300 font-semibold mb-2">Status Absensi</label>
                    <select id="status_absensi" name="status_absensi"
                        class="w-full px-4 py-2 bg-white/10 border border-white/20 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 text-gray-100"
                        required>
                        <option value="Hadir" {{ old('status_absensi', $attendance->status_absensi) == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                        <option value="Izin" {{ old('status_absensi', $attendance->status_absensi) == 'Izin' ? 'selected' : '' }}>Izin</option>
                        <option value="Sakit" {{ old('status_absensi', $attendance->status_absensi) == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                        <option value="Alpha" {{ old('status_absensi', $attendance->status_absensi) == 'Alpha' ? 'selected' : '' }}>Alpha</option>
                    </select>
                    @error('status_absensi') <span class="text-red-400 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="waktu_masuk" class="block text-gray-300 font-semibold mb-2">Waktu Masuk</label>
                    <input type="time" id="waktu_masuk" name="waktu_masuk"
                        value="{{ old('waktu_masuk', $attendance->waktu_masuk) }}"
                        pattern="[0-2][0-9]:[0-5][0-9]"
                        class="w-full px-4 py-2 bg-white/10 border border-white/20 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 text-gray-100">
                    @error('waktu_masuk') <span class="text-red-400 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="waktu_keluar" class="block text-gray-300 font-semibold mb-2">Waktu Keluar</label>
                    <input type="time" id="waktu_keluar" name="waktu_keluar"
                        value="{{ old('waktu_keluar', $attendance->waktu_keluar) }}"
                        pattern="[0-2][0-9]:[0-5][0-9]"
                        class="w-full px-4 py-2 bg-white/10 border border-white/20 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 text-gray-100">
                    @error('waktu_keluar') <span class="text-red-400 text-sm mt-1">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="mt-8 flex justify-end space-x-4 border-t border-white/10 pt-6">
                <a href="{{ route('attendances.index') }}"
                    class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-300">
                    Batal
                </a>
                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-300">
                    Perbarui
                </button>
            </div>
        </form>
    </div>
@endsection
