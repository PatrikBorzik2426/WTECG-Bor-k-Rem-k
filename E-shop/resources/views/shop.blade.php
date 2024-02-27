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
            <h1 class=" font-bold text-5xl mb-8 max-sm:text-3xl">Katalóg produktov</h1>
            <p class=" font-light text-xl max-md:text-lg max-sm:text-md text-center">Všeobecný prehľad všetkých
                produktov, ktoré momentálne poskytujeme.</p>
        </div>
        <div
            class="grid grid-cols-3 max-sm:grid-cols-1 max-sm:gap-y-4 w-7/12 max-lg:w-8/12 max-md:w-10/12 mx-auto my-20 text-center text-light-green">
            <a href="/home">
                <div
                    class="flex justify-center items-center h-48 max-sm:h-24 w-10/12 max-xl:w-11/12 bg-light-purple mx-auto rounded-3xl">
                    <p>iOS</p>
                </div>
                <p>Produktov: xxxx</p>
            </a>
            <a href="/home">
                <div
                    class="flex justify-center items-center h-48 max-sm:h-24 w-10/12 max-xl:w-11/12 bg-light-purple mx-auto rounded-3xl">
                    <p>Android</p>
                </div>
                <p>Produktov: xxxx</p>

            </a>
            <a href="/home">
                <div
                    class="flex justify-center items-center h-48 max-sm:h-24 w-10/12 max-xl:w-11/12 bg-light-purple mx-auto rounded-3xl">
                    <p>Gadgets</p>
                </div>
                <p>Produktov: xxxx</p>

            </a>

        </div>
        <x-filter />
        <div class="grid grid-cols-3 max-lg:grid-cols-2 max-md:grid-cols-1 w-8/12 mx-auto gap-x-16 gap-y-16 my-20">
            @foreach ($array as $item)
                <div class="flex flex-col">
                    <div
                        class=" w-fit h-fit flex flex-col justify-start items-center shadow-custom shadow-purple mx-auto rounded-[2rem]">
                        <p class="text-white font-medium mt-2 text-lg">{{ $item->name }}</p>
                        <img src="{{ $item->image }}" class=" mb-8 scale-75 rounded-2xl">
                    </div>
                    <div class=" relative bottom-6 bg-light-purple text-center w-32 py-2 rounded-3xl mx-auto">
                        <a class=" text-light-green font-bold text-lg">{{ number_format($item->price, 2) }} €</a>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
    {{ $array->links() }}
</body>

</html>
