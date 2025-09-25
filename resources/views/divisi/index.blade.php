<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">Manajemen Divisi</h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('success'))
                        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">{{ session('error') }}</div>
                    @endif

                    <a href="{{ route('divisi.create') }}" class="inline-flex items-center px-4 py-2 mb-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-blue-500 border border-transparent rounded-md hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25">Tambah Divisi</a>

                    <table class="min-w-full text-sm bg-white divide-y-2 divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">Nama Divisi</th>
                                <th class="px-4 py-2"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($divisis as $divisi)
                                <tr>
                                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">{{ $divisi->nama_divisi }}</td>
                                    <td class="flex justify-end gap-2 px-4 py-2 whitespace-nowrap">
                                        <a href="{{ route('divisi.edit', $divisi) }}" class="inline-block px-4 py-2 text-xs font-medium text-white bg-indigo-600 rounded hover:bg-indigo-700">Edit</a>
                                        <form method="POST" action="{{ route('divisi.destroy', $divisi) }}" onsubmit="return confirm('Yakin hapus?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-block px-4 py-2 text-xs font-medium text-white bg-red-600 rounded hover:bg-red-700">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="2" class="py-4 text-center text-gray-500">Data belum ada.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-4">{{ $divisis->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
