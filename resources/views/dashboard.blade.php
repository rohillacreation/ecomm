<x-app-layout>
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-2 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 bg-white border-b border-gray-200">

                    <div id="result">
                        None
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="search_result" class="bg-black bg-opacity-50 min-w-full absolute inset-0 hidden justify-center items-center">

        <div class="bg-gray-100 max-w-prose py-1 px-1 rounded shadow-xl" style="width: 80%;">

            <div class="flex m-1 justify-between items-center header">

                <span>Results</span>
                <span id="hide_result" class="cursor-pointer"><i class="fa fa-times" aria-hidden="true"></i></span>

            </div>
            <hr>
            <br>
            <div class="m-1 Modal-content" id="search_content">
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aperiam veritatis beatae itaque porro nobis numquam voluptas sunt. Eligendi sed deserunt perspiciatis quidem cum repellat totam cumque non commodi! Iure, ullam.
                    Facilis incidunt nihil pariatur. Velit, quod earum! Voluptatibus, corporis ratione! Dolore nemo libero quibusdam cumque laborum, labore in, iste, saepe iure quod facere eveniet dolores. Adipisci deleniti obcaecati nisi voluptatem?
                    Fuga provident
                </p>
            </div>

        </div>
    </div>

</x-app-layout>