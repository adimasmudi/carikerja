<x-layout>
    <a href="/seeker/dashboard" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back to
        Dashboard
    </a>
    <div class="flex flex-row justify-around">
        <div class="ml-2">
            <h3 class="text-lg mb-2 font-bold">Detail pekerjaan yang anda lamar</h3>
            <table class="table-auto">


                <tr>
                    <td class="text-lg mb-2">Judul Pekerjaan</td>
                    <td class="text-lg mb-2">:</td>
                    <td class="text-lg mb-2">{{ $listing->title }}</td>
                </tr>
                <tr>
                    <td class="text-lg mb-2">Perusahaan</td>
                    <td class="text-lg mb-2">:</td>
                    <td class="text-lg mb-2">{{ $listing->company }}</td>
                </tr>
                <tr>
                    <td class="text-lg mb-2">Lokasi</td>
                    <td class="text-lg mb-2">:</td>
                    <td class="text-lg mb-2">{{ $listing->location }}</td>
                </tr>

            </table>
        </div>
        <x-card class="max-w-lg">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">Apply Pekerjaan</h2>
                <p class="mb-4">Apply langsung pekerjaan yang anda inginkan</p>
            </header>

            <form method="POST" action="/seeker/apply" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="listing_id" value="{{ $listing->id }}">
                <div class="mb-6">
                    <label for="subjek" class="inline-block text-lg mb-2">Subjek Lamaran</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="subjek"
                        placeholder="Contoh: Melamar sebagai fullstack developer" value="{{ old('subjek') }}" />

                    @error('subjek')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-6">
                    <label for="file" class="inline-block text-lg mb-2">
                        Unggah CV (wajib)
                    </label>
                    <input type="file" class="border border-gray-200 rounded p-2 w-full" name="file" />

                    @error('file')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="uraian" class="inline-block text-lg mb-2">
                        Tulis uraian lamaran pekerjaan
                    </label>
                    <textarea class="border border-gray-200 rounded p-2 w-full" name="uraian" rows="10"
                        placeholder="Termasuk perkenalan diri, alasan melamar, dll">{{ old('uraian') }}</textarea>

                    @error('uraian')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                        Lamar Pekerjaan
                    </button>

                    <a href="/seeker/dashboard" class="text-black ml-4"> Back </a>
                </div>
            </form>
        </x-card>
    </div>
</x-layout>
