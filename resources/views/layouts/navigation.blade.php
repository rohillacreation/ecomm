<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">

    <div class="flex px-10 py-4 navigation justify-between">

        <div class="flex">

            <div class="text-lg">Ecommerce</div>

        </div>

        <div class="flex-shrink-0 flex items-center">

            <input id="search" class="border-blue-600 p-2 w-96 text-sm rounded " type="text" name="serch" placeholder="i am serching for...." />
            <button id="search_get" class="text-blue-600 text-lg p-1"><i class="fa fa-search"></i></button>

        </div>

        <div class="flex">

            @auth

                <a href="#" class="text-sm text-gray-700 dark:text-gray-500 underline">Profile</a>

            @else

                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                @if (Route::has('register'))

                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>

                @endif

            @endauth

        </div>

    </div>




</nav>