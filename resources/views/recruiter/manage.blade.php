<x-layout>
    <x-navigation />
    <div class="flex h-screen">
        <div class="px-4 py-2 bg-gray-200 bg-laravel lg:w-1/4">
            <svg xmlns="http://www.w3.org/2000/svg" class="inline w-8 h-8 text-white lg:hidden" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <div class="hidden lg:block">
                <div>
                    <div class="my-2 mb-6">
                        <h1 class="text-2xl font-bold text-white">Dashboard Recruiter</h1>
                    </div>
                    <ul>
                        <li class="mb-2 rounded">
                            <a href="/recruiter/profile"
                                class="inline-block w-full h-full px-3 py-2 font-bold text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-6 h-6 mr-2 -mt-2"
                                    fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path fill-rule="evenodd"
                                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                </svg>
                                @if (session()->has('recruiter'))
                                    {{ explode('@', session()->get('recruiter'))[0] }}
                                @endif
                            </a>
                        </li>

                        <li class="mb-2 rounded hover:shadow hover:bg-gray-800">
                            <a href="/recruiter/dashboard"
                                class="inline-block w-full h-full px-3 py-2 font-bold text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-6 h-6 mr-2 -mt-2"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                Home
                            </a>
                        </li>

                        <li class="mb-2 rounded bg-gray-800">
                            <a href="/recruiter/manage"
                                class="inline-block w-full h-full px-3 py-2 font-bold text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-6 h-6 mr-2 -mt-2"
                                    fill="currentColor" class="bi bi-file-earmark-arrow-up-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM6.354 9.854a.5.5 0 0 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 8.707V12.5a.5.5 0 0 1-1 0V8.707L6.354 9.854z" />
                                </svg>
                                Manage Listings
                            </a>
                        </li>
                        <li class="mb-2 rounded hover:shadow hover:bg-gray-800">
                            <a href="/recruiter/application"
                                class="inline-block w-full h-full px-3 py-2 font-bold text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-6 h-6 mr-2 -mt-2"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                Applications
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="absolute bottom-0">
                    <ul>
                        <li class="mb-2 rounded hover:shadow hover:bg-gray-800">
                            <form class="inline" method="POST" action="/logout">
                                @csrf
                                <button type="submit"
                                    class="inline-block w-full h-full px-3 py-2 font-bold text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-6 h-6 mr-2 -mt-2"
                                        fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                        <path fill-rule="evenodd"
                                            d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                                    </svg>
                                    Logout
                                </button>
                            </form>

                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="w-full px-4 py-2 bg-gray-200 lg:w-full">
            <div class="container mx-auto mt-8">
                <a href="/listings/create" class="bg-laravel hover:bg-laravel text-white font-bold py-2 px-4 rounded">
                    Tambah Pekerjaan
                </a>

                <h1 class="font-bold text-lg mt-4">Daftar Pekerjaan diupload</h1>
                <div class="flex flex-col mt-8">
                    <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                        <div
                            class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                            @unless($listings->isEmpty())
                                <table class="min-w-full">
                                    <thead>
                                        <tr>
                                            <th
                                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                Nama Perusahaan</th>
                                            <th
                                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                Nama Pekerjaan</th>
                                            <th
                                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                Email</th>
                                            <th
                                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                Website</th>
                                            <th
                                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                Edit</th>
                                            <th
                                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                Delete</th>
                                        </tr>
                                    </thead>

                                    <tbody class="bg-white">

                                        @foreach ($listings as $listing)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                    <div class="flex justify-center">
                                                        <div class="flex items-center">
                                                            <div class="flex-shrink-0 w-10 h-10">
                                                                <img class="w-10 h-10 rounded-full"
                                                                    src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png') }}"
                                                                    alt="{{ $listing->title }}">
                                                            </div>

                                                            <div class="ml-4">
                                                                <div class="text-sm font-medium leading-5 text-gray-900">
                                                                    {{ $listing->company }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div
                                                        class="flex justify-center text-sm font-medium leading-5 text-gray-900">
                                                        {{ $listing->title }}
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                    <div class="flex justify-center text-sm leading-5 text-gray-500">
                                                        {{ $listing->email }}
                                                    </div>
                                                </td>

                                                <td
                                                    class="flex justify-center px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                    <a href="{{ $listing->website }}">{{ $listing->website }}</a>
                                                </td>
                                                <td
                                                    class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                                    <a href="/listings/{{ $listing->id }}/edit">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="fill-blue-600 bi bi-pencil-square w-6 h-6"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                            <path fill-rule="evenodd"
                                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                        </svg>
                                                    </a>
                                                </td>

                                                <td
                                                    class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                                    <button type="button" class="ease-in-out" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal"><svg
                                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                            class="bi bi-trash3-fill fill-red-500 w-6 h-6"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                                        </svg></button>
                                                    <!-- Modal -->
                                                    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
                                                        id="exampleModal" tabindex="-1"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog relative w-auto pointer-events-none">
                                                            <div
                                                                class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                                                                <div
                                                                    class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                                                                    <h5 class="text-xl font-medium leading-normal text-gray-800"
                                                                        id="exampleModalLabel">Modal</h5>
                                                                    <button type="button"
                                                                        class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body relative p-4">
                                                                    Apakah anda yakin ingin menghapus listing ini?
                                                                </div>
                                                                <div
                                                                    class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                                                                    <button type="button"
                                                                        class="px-6
                                                                                py-2.5
                                                                                bg-blue-600
                                                                                text-white
                                                                                font-medium
                                                                                text-xs
                                                                                leading-tight
                                                                                uppercase
                                                                                rounded
                                                                                shadow-md
                                                                                hover:bg-blue-700 hover:shadow-lg
                                                                                focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                                                                                active:bg-blue-800 active:shadow-lg
                                                                                transition
                                                                                duration-150
                                                                                ease-in-out"
                                                                        data-bs-dismiss="modal">Tutup</button>
                                                                    <form method="POST"
                                                                        action="/listings/{{ $listing->id }}">
                                                                        @csrf
                                                                        @method('DELETE')

                                                                        <button
                                                                            class="px-6
                                                                                py-2.5
                                                                                bg-red-600
                                                                                text-white
                                                                                font-medium
                                                                                text-xs
                                                                                leading-tight
                                                                                uppercase
                                                                                rounded
                                                                                shadow-md
                                                                                hover:bg-red-700 hover:shadow-lg
                                                                                focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0
                                                                                active:bg-red-800 active:shadow-lg
                                                                                transition
                                                                                duration-150
                                                                                ease-in-out
                                                                                ml-1">Hapus</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <p>Belum ada pekerjaan di upload</p>
                                    @endunless


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-footer />
</x-layout>
