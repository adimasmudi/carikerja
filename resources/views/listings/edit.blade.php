<x-layout>
    <x-card class="max-w-lg" style="margin:auto">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Edit Postingan Pekerjaan</h2>
            <p class="mb-4">Posting pekerjaan dan temukan developer</p>
        </header>

        <form method="POST" action="/listings/{{ $listing->id }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="company" class="inline-block text-lg mb-2">Nama Perusahaan</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="company"
                    value="{{ $listing->company }}" />

                @error('company')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">Judul Pekerjaan</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
                    placeholder="Example: Senior Laravel Developer" value="{{ $listing->title }}" />

                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="location" class="inline-block text-lg mb-2">Lokasi Pekerjaan</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location"
                    placeholder="Contoh: Remote, Surabaya, dsb" value="{{ $listing->location }}" />

                @error('location')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">
                    Contact Email
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email"
                    value="{{ $listing->email }}" />

                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="website" class="inline-block text-lg mb-2">
                    Website/Application URL
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="website"
                    value="{{ $listing->website }}" />

                @error('website')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">
                    Tags (Terpisah koma)
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags"
                    placeholder="Contoh: Laravel, Backend, Postgres, etc" value="{{ $listing->tags }}" />

                @error('tags')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="logo" class="inline-block text-lg mb-2">
                    Logo Perusahaan
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo" />
                <img class="w-48 mr-6 mb-6"
                    src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png') }}"
                    alt="" />

                @error('logo')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">
                    Deskripsi Pekerjaan
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
                    placeholder="Termasuk tugas, Prasyarat, Gaji, dsb">{{ $listing->description }}</textarea>

                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Edit Pekerjaan
                </button>

                <a href="/recruiter/dashboard" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
</x-layout>
