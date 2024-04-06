<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-black font-manrope min-w-80">
    <main class=" bg-gradient-to-b from-dark-purple to-black via-black h-full">
        <header>
            <x-navbar />
        </header>
        <div class="mt-4 w-full">
            <h1 class="text-3xl font-bold tracking-tight text-white sm:text-3xl text-center">Mobilný telefón</h1>

            <!-- Image gallery -->
            <div class="flex w-3/4 max-w-fit mx-auto mt-8 gap-8 max-lg:flex-col">
                <img src="../../../Img/mobil.jpg" alt="obrazok"
                    class="h-full w-full object-cover object-center rounded-3xl">
                <img src="../../../Img/mobil.jpg" class="h-full w-full object-cover object-center rounded-3xl">
            </div>

            <!-- Product info -->
            <div class="grid grid-cols-2 gap-x-10 mt-10 w-8/12 mx-auto max-lg:grid-cols-1">
                <div class="text-white">
                    <h2 class="text-2xl mb-4 font-semibold sm:text-3xl">Popis produktu</h2>
                    <!-- Description and details -->
                    <p class="text-base">Mobil xx je inovatívny mobilný telefón navrhnutý pre tých, ktorí hľadajú
                        spojenie medzi výkonom a eleganciou. S plynulým skleneným dizajnom a špičkovými technológiami,
                        prináša
                        tento telefón revolučný zážitok z používania.
                    <h1 class="text-2xl font-semibold mb-4 mt-4">Brilantný displej:</h1>
                    <p class="text-base">Užite si každý detail na jasnom a pôsobivom Super AMOLED displeji s
                        uhlopriečkou 6,5 palca. Vďaka rozlíšeniu 4K a živým farbám vám Mobil xx prináša neuveriteľne
                        realistický
                        vizuálny zážitok pri sledovaní videí, prezeraní fotografií a hraní hier.</p>
                </div>
                <!-- Options -->
                <div class=" text-white max-lg:mt-10">
                    <h2 class="text-2xl mb-4 font-semibold text-white sm:text-3xl">Cena</h2>
                    <h3 class="text-4xl font-bold mb-8 max-lg:text-ce">1999,99 €</h3>
                    <div class="flex gap-x-4 w-fit mb-4 max-sm:flex-col max-sm:gap-y-4">
                        <div class="mx-auto my-auto">
                            <button
                                class="bg-light-green text-dark-purple font-bold w-6 rounded-l-2xl -mr-[0.15rem]">-</button>
                            <input type="number" name="quantity" id="quantity" min="1" max="100"
                                value="1" class=" appearance-none bg-transparent text-center focus:outline-none">
                            <button
                                class="bg-light-green text-dark-purple font-bold w-6 rounded-r-2xl -ml-[1.15rem]">+</button>
                        </div>
                        <a href="./shopping_cart.html"
                            class="bg-light-purple text-light-green font-bold text-md text-center w-fit h-fit py-2 px-10 rounded-3xl mx-auto hover:bg-light-green hover:text-light-purple cursor-pointer">
                            Pridať do košíka
                        </a>
                    </div>
                    <div class="mt-10">
                        <h3 class="text-2xl font-semibold mb-2">Params</h3>
                        <hr class="mb-2">
                        <p class="font-medium text-lg">Farba: <span class="font-light">Sivá</span></p>
                        <p class="font-medium text-lg">Rozlíšenie: <span class="font-light">1920x1080</span></p>
                        <p class="font-medium text-lg">Procesor: <span class="font-light">Exinos 2GHz</span></p>
                        <p class="font-medium text-lg">RAM: <span class="font-light">8GB</span></p>
                    </div>
                </div>
            </div>
    </main>
</body>

</html>
