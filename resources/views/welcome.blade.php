<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <script src="http://127.0.0.1:8000/js/app.js"></script>

    <link rel="stylesheet" href="http://127.0.0.1:8000/css/app.css">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('/js/app.js')}}"></script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>

<body class="antialiased">

    @include('layouts.navigation')

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

</body>
@include('layouts.search-js')

</html>