@extends('master')

@section('title', 'Edit Pegawai')
@section('page-title', 'Edit Pegawai')

@section('content')
    <h2 class="text-2xl font-semibold text-white mb-6">Edit Data Pegawai</h2>

    <div class="card-gradient shadow-lg rounded-2xl p-8 border border-white/10">
        <form action="{{ route('employees.update', $employee->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-200">
                <!-- Nama Lengkap -->
                <div>
                    <label for="nama_lengkap" class="block text-gray-300 font-medium mb-2">Nama Lengkap</label>
                    <input type="text" id="nama_lengkap" name="nama_lengkap" 
                           class="w-full px-4 py-2 rounded-lg bg-white/10 border border-white/20 text-white focus:outline-none focus:ring-2 focus:ring-accent-purple"
                           value="{{ old('nama_lengkap', $employee->nama_lengkap) }}" required>
                    @error('nama_lengkap') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-gray-300 font-medium mb-2">Email</label>
                    <input type="email" id="email" name="email" 
                           class="w-full px-4 py-2 rounded-lg bg-white/10 border border-white/20 text-white focus:outline-none focus:ring-2 focus:ring-accent-purple"
                           value="{{ old('email', $employee->email) }}" required>
                    @error('email') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Nomor Telepon -->
                <div>
                    <label for="nomor_telepon" class="block text-gray-300 font-medium mb-2">Nomor Telepon</label>
                    <input type="text" id="nomor_telepon" name="nomor_telepon" 
                           class="w-full px-4 py-2 rounded-lg bg-white/10 border border-white/20 text-white focus:outline-none focus:ring-2 focus:ring-accent-purple"
                           value="{{ old('nomor_telepon', $employee->nomor_telepon) }}">
                    @error('nomor_telepon') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Tanggal Lahir -->
                <div>
                    <label for="tanggal_lahir" class="block text-gray-300 font-medium mb-2">Tanggal Lahir</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" 
                           class="w-full px-4 py-2 rounded-lg bg-white/10 border border-white/20 text-white focus:outline-none focus:ring-2 focus:ring-accent-purple"
                           value="{{ old('tanggal_lahir', $employee->tanggal_lahir) }}" required>
                    @error('tanggal_lahir') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Alamat -->
                <div class="md:col-span-2">
                    <label for="alamat" class="block text-gray-300 font-medium mb-2">Alamat</label>
                    <textarea id="alamat" name="alamat" rows="3"
                              class="w-full px-4 py-2 rounded-lg bg-white/10 border border-white/20 text-white focus:outline-none focus:ring-2 focus:ring-accent-purple">{{ old('alamat', $employee->alamat) }}</textarea>
                    @error('alamat') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Departemen -->
                <div>
                    <label for="departemen_id" class="block text-gray-300 font-medium mb-2">Departemen</label>
                    <select id="departemen_id" name="departemen_id"
                            class="w-full px-4 py-2 rounded-lg bg-white/10 border border-white/20 text-white focus:outline-none focus:ring-2 focus:ring-accent-purple" required>
                        <option value="">Pilih Departemen</option>
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}" {{ old('departemen_id', $employee->departemen_id) == $department->id ? 'selected' : '' }}>
                                {{ $department->nama_departemen }}
                            </option>
                        @endforeach
                    </select>
                    @error('departemen_id') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Jabatan -->
                <div>
                    <label for="jabatan_id" class="block text-gray-300 font-medium mb-2">Jabatan</label>
                    <select id="jabatan_id" name="jabatan_id"
                            class="w-full px-4 py-2 rounded-lg bg-white/10 border border-white/20 text-white focus:outline-none focus:ring-2 focus:ring-accent-purple" required>
                        <option value="">Pilih Jabatan</option>
                        @foreach($positions as $position)
                            <option value="{{ $position->id }}" {{ old('jabatan_id', $employee->jabatan_id) == $position->id ? 'selected' : '' }}>
                                {{ $position->nama_jabatan }}
                            </option>
                        @endforeach
                    </select>
                    @error('jabatan_id') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Tanggal Masuk -->
                <div>
                    <label for="tanggal_masuk" class="block text-gray-300 font-medium mb-2">Tanggal Masuk</label>
                    <input type="date" id="tanggal_masuk" name="tanggal_masuk" 
                           class="w-full px-4 py-2 rounded-lg bg-white/10 border border-white/20 text-white focus:outline-none focus:ring-2 focus:ring-accent-purple"
                           value="{{ old('tanggal_masuk', $employee->tanggal_masuk) }}" required>
                    @error('tanggal_masuk') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-gray-300 font-medium mb-2">Status</label>
                    <select id="status" name="status"
                            class="w-full px-4 py-2 rounded-lg bg-white/10 border border-white/20 text-white focus:outline-none focus:ring-2 focus:ring-accent-purple" required>
                        <option value="Aktif" {{ old('status', $employee->status) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="Nonaktif" {{ old('status', $employee->status) == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                    @error('status') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="mt-8 flex justify-end space-x-4">
                <a href="{{ route('employees.index') }}" 
                   class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-300">
                    <i class="fas fa-arrow-left mr-2"></i> Batal
                </a>
                <button type="submit" 
                        class="bg-accent-purple hover:bg-purple-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-300">
                    <i class="fas fa-save mr-2"></i> Perbarui
                </button>
            </div>
        </form>
    </div>
@endsection
