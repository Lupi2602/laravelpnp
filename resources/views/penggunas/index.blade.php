<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Daftar Pengguna
            </h2>
            <a href="{{ route('penggunas.create') }}"
                class="bg-indigo-600 dark:bg-indigo-500 hover:bg-indigo-700 dark:hover:bg-indigo-600 text-white px-4 py-2 rounded-lg">
                Tambah Pengguna
            </a>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
                    {{ session('success') }}
                </div>
            @endif


            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Nama</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Email</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Telepon</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Photo</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200">
                                @foreach ($penggunas as $user)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">
                                            {{ $user->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">
                                            {{ $user->email }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">
                                            {{ $user->phone }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if ($user->file_upload)
                                                <img src="{{ asset('storage/' . $user->file_upload) }}" alt="foto"
                                                    class="max-w-[100px] max-h-[100px] object-cover rounded">
                                            @else
                                                <span class="text-gray-400 dark:text-gray-500">(tidak ada photo)</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('penggunas.edit', $user->id) }}"
                                                    class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400">
                                                    Edit
                                                </a>
                                                <form action="{{ route('penggunas.destroy', $user->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Yakin hapus?')"
                                                        class="text-red-600 hover:text-red-900 dark:text-red-400">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4 px-6">
                        <div class="mt-6 px-6">
                            @if ($penggunas->hasPages())
                                <div class="flex justify-center items-center space-x-2">
                                    {{-- Previous Page Link --}}
                                    @if ($penggunas->onFirstPage())
                                        <span
                                            class="px-3 py-1 text-sm text-gray-400 dark:text-gray-500 bg-gray-100 dark:bg-gray-700 rounded">&laquo;</span>
                                    @else
                                        <a href="{{ $penggunas->previousPageUrl() }}"
                                            class="px-3 py-1 text-sm text-indigo-600 dark:text-indigo-400 hover:bg-indigo-100 dark:hover:bg-gray-600 rounded">&laquo;</a>
                                    @endif

                                    {{-- Pagination Elements --}}
                                    @foreach ($penggunas->links()->elements[0] as $page => $url)
                                        @if ($page == $penggunas->currentPage())
                                            <span
                                                class="px-3 py-1 text-sm font-semibold text-white bg-indigo-600 dark:bg-indigo-500 rounded">{{ $page }}</span>
                                        @else
                                            <a href="{{ $url }}"
                                                class="px-3 py-1 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-600 rounded">{{ $page }}</a>
                                        @endif
                                    @endforeach

                                    {{-- Next Page Link --}}
                                    @if ($penggunas->hasMorePages())
                                        <a href="{{ $penggunas->nextPageUrl() }}"
                                            class="px-3 py-1 text-sm text-indigo-600 dark:text-indigo-400 hover:bg-indigo-100 dark:hover:bg-gray-600 rounded">&raquo;</a>
                                    @else
                                        <span
                                            class="px-3 py-1 text-sm text-gray-400 dark:text-gray-500 bg-gray-100 dark:bg-gray-700 rounded">&raquo;</span>
                                    @endif
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
