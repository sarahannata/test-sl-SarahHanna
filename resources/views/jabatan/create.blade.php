<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">Tambah Jabatan Baru</h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('jabatan.store') }}">
                        @csrf
                        <div>
                            <x-input-label for="nama_jabatan" value="Nama Jabatan" />
                            <x-text-input id="nama_jabatan" class="block w-full mt-1" type="text" name="nama_jabatan" :value="old('nama_jabatan')" required autofocus />
                            <x-input-error :messages="$errors->get('nama_jabatan')" class="mt-2" />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">Simpan</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
