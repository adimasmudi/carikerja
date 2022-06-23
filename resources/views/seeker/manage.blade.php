<x-layout>
    <x-navigation />
    <div class="flex h-screen">
        <div class="px-4 py-2 bg-gray-200 bg-laravel lg:w-1/4">
            <svg xmlns="http://www.w3.org/2000/svg" class="inline w-8 h-8 text-white lg:hidden" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <div class="flex flex-column hidden lg:block">

                <div>
                    <div class="my-2 mb-6">
                        <h1 class="text-2xl font-bold text-white">Dashboard Pencari Kerja</h1>
                    </div>

                    <ul>
                        <li class="mb-2 rounded">
                            <a href="/seeker/profile" class="inline-block w-full h-full px-3 py-2 font-bold text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-6 h-6 mr-2 -mt-2"
                                    fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path fill-rule="evenodd"
                                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                </svg>
                                @if (session()->has('seeker'))
                                    {{ explode('@', session()->get('seeker'))[0] }}
                                @endif
                            </a>
                        </li>

                        <li class="mb-2 rounded hover:shadow hover:bg-gray-800">
                            <a href="/seeker/dashboard"
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
                            <a href="/seeker/manage" class="inline-block w-full h-full px-3 py-2 font-bold text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-6 h-6 mr-2 -mt-2"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                Application
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
            <div class="container mx-auto mt-12">
                <h1 class="font-bold text-lg mt-4">Daftar Application</h1>
                <div class="flex flex-col mt-8">
                    <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                        <div
                            class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                            @unless($applies->isEmpty())

                                <table class="min-w-full">
                                    <thead>
                                        <tr>
                                            <th
                                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                Tujuan</th>
                                            <th
                                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                Nama Pekerjaan</th>
                                            <th
                                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                Subject</th>
                                            <th
                                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                File</th>
                                            <th
                                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                Tanggal</th>
                                            <th
                                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                Status</th>
                                            <th
                                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                Delete</th>
                                        </tr>
                                    </thead>

                                    <tbody class="bg-white">

                                        @foreach ($applies as $apply)
                                            @php
                                                $listing = DB::table('listings')
                                                    ->where('id', $apply->listing_id)
                                                    ->first();
                                                
                                                $status = '';
                                                if ($apply->status == 'menunggu') {
                                                    $status = 'yellow';
                                                } elseif ($apply->status == 'ditolak') {
                                                    $status = 'red';
                                                } else {
                                                    $status = 'green';
                                                }
                                            @endphp
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
                                                    <a href="/seeker/details/{{ $apply->id }}/{{ $listing->id }}"
                                                        class="text-sm leading-5 text-gray-500">{{ $apply->subjek }}
                                                    </a>
                                                </td>

                                                <td class="flex justify-center text-sm font-medium leading-5 text-gray-900">
                                                    <a href="{{ $apply->file ? '/viewpdf/' . $apply->id : null }}">
                                                        @if ($apply->file)
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                                class="bi bi-file-pdf h-6 w-6 mt-4" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
                                                                <path
                                                                    d="M4.603 12.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.701 19.701 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.187-.012.395-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.065.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.716 5.716 0 0 1-.911-.95 11.642 11.642 0 0 0-1.997.406 11.311 11.311 0 0 1-1.021 1.51c-.29.35-.608.655-.926.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.27.27 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.647 12.647 0 0 1 1.01-.193 11.666 11.666 0 0 1-.51-.858 20.741 20.741 0 0 1-.5 1.05zm2.446.45c.15.162.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.881 3.881 0 0 0-.612-.053zM8.078 5.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z" />
                                                            </svg>
                                                        @else
                                                            <span>NULL</span>
                                                        @endif
                                                    </a>
                                                </td>
                                                <td>
                                                    <div
                                                        class="flex justify-center text-sm font-medium leading-5 text-gray-900">
                                                        {{ $apply->tgl }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                    <span
                                                        class="inline-flex px-2 text-xs font-semibold leading-5 text-{{ $status }}-800 bg-{{ $status }}-100 rounded-full">{{ $apply->status }}</span>
                                                </td>


                                                <td
                                                    class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                                    <form method="POST" action="/seeker/apply/{{ $apply->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button><svg xmlns="http://www.w3.org/2000/svg"
                                                                fill="currentColor"
                                                                class="bi bi-trash3-fill fill-red-500 w-6 h-6"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                                            </svg></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach



                                    </tbody>
                                </table>
                            @else
                                <p>Belum ada lamaran</p>
                            @endunless
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <x-footer />
</x-layout>
