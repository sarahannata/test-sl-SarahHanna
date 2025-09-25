<x-app-layout>
    <x-slot name="header"><h2 class="text-xl font-semibold leading-tight text-gray-800">Tambah Divisi Baru</h2></x-slot>
    <div class="py-12"><div class="mx-auto max-w-7xl sm:px-6 lg:px-8"><div class="overflow-hidden bg-white shadow-sm sm:rounded-lg"><div class="p-6 bg-white border-b border-gray-200">
        <form method="POST" action="{{ route('divisi.store') }}">
            @csrf
            <div><x-input-label for="nama_divisi" value="Nama Divisi" /><x-text-input id="nama_divisi" class="block w-full mt-1" type="text" name="nama_divisi" :value="old('nama_divisi')" required autofocus /><x-input-error :messages="$errors->get('nama_divisi')" class="mt-2" /></div>
            <div class="flex items-center justify-end mt-4"><x-primary-button>Simpan</x-primary-button></div>
        </form>
    </div></div></div></div>
</x-app-layout>
