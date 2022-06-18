<!--Nav-->
<nav id="header" class="w-full z-30 top-0 text-white">
    <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
        <div class="pl-4 flex items-center">
            <div
                class="toggleColour text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl flex flex-row">
                <!--Icon from: http://www.potlabicons.com/ -->
                <a href="/"><img src="{{ asset('/images/carikerja_logo.png') }}" alt="logo"
                        style="height:40px"></a>
                <span class="text-black">CARIKERJA</span>
            </div>
        </div>
        <div class="block lg:hidden pr-4">
            <button id="nav-toggle"
                class="flex items-center p-1 text-pink-800 hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                </svg>
            </button>
        </div>


    </div>
    <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
</nav>
