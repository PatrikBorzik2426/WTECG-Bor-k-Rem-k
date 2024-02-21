<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-black font-manrope">
    <main class=" bg-gradient-to-b from-dark-purple to-black via-black h-full">
        <x-navbar />

        <div class="grid grid-cols-3 w-8/12 mx-auto gap-x-16 gap-y-16 my-20 h-f">
            @foreach ($array as $item)
                <div class="flex flex-col items-center">
                    <div
                        class="w-60 h-60 flex flex-col justify-start items-center shadow-custom shadow-purple mx-auto rounded-[3rem]">
                        <p class="text-white mt-2 text-lg">{{ $item->name }}</p>
                    </div>
                    <div class=" relative bottom-6 bg-light-purple text-center w-5/12 py-2 rounded-3xl">
                        <a class=" text-light-green font-bold text-lg">{{ $item->price }} €</a>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
    {{ $array->links() }}
</body>

</html>
