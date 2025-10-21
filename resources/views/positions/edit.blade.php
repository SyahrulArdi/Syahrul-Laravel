@extends('master')

@section('title', 'Edit Jabatan')
@section('page-title', 'Edit Jabatan')

@section('content')
    <div class="card-gradient max-w-2xl mx-auto p-8 rounded-2xl shadow-lg border border-white/10 text-gray-200">
        <h2 class="text-2xl font-semibold text-white mb-6">Formulir Edit Jabatan</h2>

        @if ($errors->any())
            <div class="bg-red-900/40 border border-red-500 text-red-200 px-4 py-3 rounded-md mb-4" role="alert">
                <strong class="font-bold">Oops!</strong>
                <span class="block sm:inline">Ada beberapa masalah dengan input Anda.</span>
                <ul class="mt-3 list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('positions.update', $position->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label for="nama_jabatan" class="block text-gray-300 text-sm font-medium mb-2">Nama Jabatan</label>
                <input type="text" name="nama_jabatan" id="nama_jabatan"
                    class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-2 text-white placeholder-gray-400 focus:ring-2 focus:ring-accent-purple focus:outline-none @error('nama_jabatan') border-red-500 @enderror"
                    value="{{ old('nama_jabatan', $position->nama_jabatan) }}">
                @error('nama_jabatan')
                    <p class="text-red-400 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="gaji_pokok" class="block text-gray-300 text-sm font-medium mb-2">Gaji Pokok</label>
                <input type="number" name="gaji_pokok" id="gaji_pokok"
                    class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-2 text-white placeholder-gray-400 focus:ring-2 focus:ring-accent-purple focus:outline-none @error('gaji_pokok') border-red-500 @enderror"
                    value="{{ old('gaji_pokok', $position->gaji_pokok) }}">
                @error('gaji_pokok')
                    <p class="text-red-400 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end space-x-4 mt-8">
                <a href="{{ route('positions.index') }}"
                    class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-md transition duration-300 ease-in-out">
                    <i class="fas fa-arrow-left mr-2"></i> Batal
                </a>
                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-md transition duration-300 ease-in-out">
                    <i class="fas fa-save mr-2"></i> Perbarui
                </button>
            </div>
        </form>
    </div>
@endsection
