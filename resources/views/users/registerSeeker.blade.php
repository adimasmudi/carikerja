<x-layout>
    <x-navigation />
    <x-card class="p-10 max-w-lg mt-24" style="margin:auto">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Register Pencari Kerja</h2>
            <p class="mb-4">Buat akun untuk mencari pekerjaan</p>
        </header>

        <form method="POST" action="/seekers">
            @csrf
            <div class="mb-6">
                <label for="nama" class="inline-block text-lg mb-2"> Nama </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="nama"
                    value="{{ old('name') }}" />

                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="contact" class="inline-block text-lg mb-2"> Contact </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="contact"
                    value="{{ old('contact') }}" />

                @error('contact')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Email</label>
                <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email"
                    value="{{ old('email') }}" />

                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="alamat" class="inline-block text-lg mb-2">Alamat</label>
                <input type="alamat" class="border border-gray-200 rounded p-2 w-full" name="alamat"
                    value="{{ old('alamat') }}" />

                @error('alamat')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password" class="inline-block text-lg mb-2">
                    Password
                </label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password"
                    value="{{ old('password') }}" />

                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password2" class="inline-block text-lg mb-2">
                    Confirm Password
                </label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password_confirmation"
                    value="{{ old('password_confirmation') }}" />

                @error('password_confirmation')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Sign Up
                </button>
            </div>

            <div class="mt-8">
                <p>
                    Sudah punya akun?
                    <a href="/login/seeker" class="text-laravel">Login</a>
                </p>
            </div>
        </form>
    </x-card>
    <x-footer />
</x-layout>
