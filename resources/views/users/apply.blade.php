<x-layout>
    <div class="flex flex-row justify-around">
        <div class="ml-2">
            {{ $listing->id }}
        </div>
        <x-card class="max-w-lg">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">Apply Pekerjaan</h2>
                <p class="mb-4">Apply langsung pekerjaan yang anda inginkan</p>
            </header>

            <form enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                    <label for="SeekerName" class="inline-block text-lg mb-2">Nama Lengkap</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="SeekerName"
                        value="{{ old('SeekerName') }}" />

                    @error('SeekerName')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="subject" class="inline-block text-lg mb-2">Subjek Lamaran</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="subject"
                        placeholder="Contoh: Melamar sebagai fullstack developer" value="{{ old('subject') }}" />

                    @error('subject')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="address" class="inline-block text-lg mb-2">Alamat Pelamar</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="address"
                        placeholder="Contoh : kamal, Bangkalan" value="{{ old('address') }}" />

                    @error('address')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="email" class="inline-block text-lg mb-2">
                        Contact Email
                    </label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email"
                        value="{{ old('email') }}" />

                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="file" class="inline-block text-lg mb-2">
                        Unggah file lamaran (opsional)
                    </label>
                    <input type="file" class="border border-gray-200 rounded p-2 w-full" name="file" />

                    @error('file')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="applyText" class="inline-block text-lg mb-2">
                        Tulis uraian lamaran pekerjaan
                    </label>
                    <textarea class="border border-gray-200 rounded p-2 w-full" name="applyText" rows="10"
                        placeholder="Termasuk perkenalan diri, alasan melamar, dll">{{ old('applyText') }}</textarea>

                    @error('applyText')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                        Lamar Pekerjaan
                    </button>

                    <a href="/" class="text-black ml-4"> Back </a>
                </div>
            </form>
        </x-card>
    </div>
</x-layout>
