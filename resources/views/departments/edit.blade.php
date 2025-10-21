@extends('master')

@section('title', 'Edit Departemen')
@section('page-title', 'Edit Departemen')

@section('content')
    <h2 class="text-2xl font-semibold text-white mb-6">Formulir Edit Departemen</h2>

    <div class="card-gradient rounded-2xl shadow-lg border border-white/10 p-8 max-w-2xl mx-auto text-gray-200">
        @if ($errors->any())
            <div class="bg-red-500/10 border border-red-400 text-red-300 px-4 py-3 rounded-md mb-6" role="alert">
                <strong class="font-semibold">Oops!</strong>
                <span class="block sm:inline">Ada beberapa masalah dengan input Anda.</span>
                <ul class="mt-3 list-disc list-inside text-sm text-red-200">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('departments.update', $department->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label for="nama_departemen" class="block text-gray-300 font-medium mb-2">Nama Departemen</label>
                <input type="text" name="nama_departemen" id="nama_departemen"
                       class="w-full px-4 py-2 rounded-lg bg-white/10 border border-white/20 text-white focus:outline-none focus:ring-2 focus:ring-accent-purple @error('nama_departemen') border-red-500 @enderror"
                       value="{{ old('nama_departemen', $department->nama_departemen) }}" required>
                @error('nama_departemen')
                    <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('departments.index') }}"
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
