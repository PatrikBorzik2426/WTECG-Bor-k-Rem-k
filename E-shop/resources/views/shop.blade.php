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
        <div class="flex flex-col items-center mt-12 text-light-green">
            <h1 class=" font-bold text-5xl mb-8">Katalóg produktov</h1>
            <p class=" font-light text-xl">Všeobecný prehľad všetkých produktov, ktoré momentálne poskytujeme.</p>
        </div>
        <div class="grid grid-cols-3 w-6/12 mx-auto gap-x-16 my-20 text-center text-light-green">
            <a href="/home">
                <div class="flex justify-center items-center bg-light-purple w-52 h-52 mx-auto rounded-3xl">
                    <p>iOS</p>
                </div>
            </a>
            <a href="/home">
                <div class="flex justify-center items-center bg-light-purple w-52 h-52 mx-auto rounded-3xl">
                    <p>Android</p>
                </div>
            </a>
            <a href="/home">
                <div class="flex justify-center items-center bg-light-purple w-52 h-52 mx-auto rounded-3xl">
                    <p>Gadgets</p>
                </div>
            </a>

        </div>
        <div class="grid grid-cols-4 w-8/12 mx-auto gap-x-16 gap-y-16 my-20">
            @foreach ($array as $item)
                <div class="flex flex-col items-center">
                    <div
                        class="w-60 h-60 flex flex-col justify-start items-center shadow-custom shadow-purple mx-auto rounded-[3rem]">
                        <p class="text-white mt-2 text-lg">{{ $item->name }}</p>
                        <img src="{{ $item->image }}" class=" scale-75 rounded-2xl">
                    </div>
                    <div class=" relative bottom-6 bg-light-purple text-center w-6/12 py-2 rounded-3xl mx-auto">
                        <a class=" text-light-green font-bold text-lg">{{ $item->price }} €</a>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
    {{ $array->links() }}
</body>

</html>
