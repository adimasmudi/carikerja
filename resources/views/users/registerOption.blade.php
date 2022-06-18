<x-layout>
    <div class="mt-4">
        <h1 class="font-bold text-center text-lg">Pilih opsi registrasi kamu</h1><br>
        <div class="flex flex-row w-1/2 mx-auto">
            <div class="w-1/2">
                <x-card>
                    <div class="flex bg-gray-100">
                        <div>
                            <div class="text-xl font-bold mb-4">Register sebagai pencari kerja</div>

                            <div class="text-lg mt-4">
                                Jika anda register sebagai role ini, maka anda akan memiliki kesempatan
                                untuk melihat daftar pekerjaan yang ada. kemudian bisa untuk menghubungi melalui email
                                atau
                                apply langsung.
                            </div>
                            <div>
                                <a href="/register/seeker"
                                    class="block bg-laravel text-white text-center mt-6 py-2 rounded-xl hover:opacity-80">
                                    Register</a>
                            </div>
                        </div>
                    </div>
                </x-card>
            </div>
            <div class="w-1/2">
                <x-card>
                    <div class="flex bg-gray-100">
                        <div>
                            <div class="text-xl font-bold mb-4">Register sebagai recruiter</div>

                            <div class="text-lg mt-4">
                                Jika anda register sebagai role ini, maka anda akan memiliki kesempatan
                                untuk melihat memposting pekerjaan. kemudian bisa untuk memilih untuk menerima
                                lamaran atau tidak.
                            </div>
                            <div>
                                <a href="/register/recruiter"
                                    class="block bg-laravel text-center text-white mt-6 py-2 rounded-xl hover:opacity-80">
                                    Register</a>
                            </div>
                        </div>
                    </div>
                </x-card>
            </div>
        </div>
    </div>
</x-layout>
