<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Data Pegawai') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if (session('success'))
                        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    {{-- Tombol Tambah Pegawai --}}
                    <a href="{{ route('pegawai.create') }}"
                        class="inline-flex items-center px-4 py-2 mb-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-blue-500 border border-transparent rounded-md hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25">
                        Tambah Pegawai
                    </a>

                    {{-- Tabel Data Pegawai --}}
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm bg-white divide-y-2 divide-gray-200">
                            <thead class="text-left">
                                <tr>
                                    <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">Nama Lengkap</th>
                                    <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">Jabatan</th>
                                    <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">Divisi</th>
                                    <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">Email</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200">
                                @forelse ($pegawais as $pegawai)
                                    <tr>
                                        <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $pegawai->nama }}</td>
                                        <td class="px-4 py-2 text-gray-700 whitespace-nowrap">
                                            {{ $pegawai->jabatan->nama_jabatan }}</td>
                                            <td class="px-4 py-2 text-gray-700 whitespace-nowrap">
                                            {{ $pegawai->divisi->nama_divisi }}</td>
                                        <td class="px-4 py-2 text-gray-700 whitespace-nowrap">{{ $pegawai->email }}</td>
                                        <td class="flex justify-end gap-2 px-4 py-2 whitespace-nowrap">
                                            <a href="{{ route('pegawai.edit', $pegawai) }}"
                                                class="inline-block px-4 py-2 text-xs font-medium text-white bg-indigo-600 rounded hover:bg-indigo-700">
                                                Edit
                                            </a>
                                            <form method="POST" action="{{ route('pegawai.destroy', $pegawai) }}"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="inline-block px-4 py-2 text-xs font-medium text-white bg-red-600 rounded hover:bg-red-700">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="py-4 text-center text-gray-500">Data belum tersedia.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Link Paginasi --}}
                    <div class="mt-4">
                        {{ $pegawais->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
