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
        <div class="flex flex-col items-center mt-12 text-light-green">
            <h1 class=" font-bold text-5xl mb-8 max-sm:text-3xl">Katalóg produktov</h1>
            <p class=" font-light text-xl max-md:text-lg max-sm:text-md text-center">Všeobecný prehľad všetkých
                produktov, ktoré momentálne poskytujeme.</p>
        </div>
        <div
            class="grid grid-cols-3 max-sm:grid-cols-1 max-sm:gap-y-4 w-7/12 max-lg:w-8/12 max-md:w-10/12 mx-auto my-20 text-center text-light-green">
            <a href="./index.html">
                <div
                    class="flex justify-center items-center h-48 max-sm:h-24 w-10/12 max-xl:w-11/12 bg-light-purple mx-auto rounded-3xl">
                    <p>iOS</p>
                </div>
                <p>Produktov: xxxx</p>
            </a>
            <a href="./index.html">
                <div
                    class="flex justify-center items-center h-48 max-sm:h-24 w-10/12 max-xl:w-11/12 bg-light-purple mx-auto rounded-3xl">
                    <p>Android</p>
                </div>
                <p>Produktov: xxxx</p>

            </a>
            <a href="./index.html">
                <div
                    class="flex justify-center items-center h-48 max-sm:h-24 w-10/12 max-xl:w-11/12 bg-light-purple mx-auto rounded-3xl">
                    <p>Gadgets</p>
                </div>
                <p>Produktov: xxxx</p>

            </a>

        </div>
        <form>
            <div
                class="flex items-center justify-center px-12 max-sm:px-6 py-4 w-fit h-fit md:space-x-10 mx-auto max-md:grid max-md:grid-cols-2 bg-light-purple text-light-green rounded-full max-md:rounded-3xl max-md:w-10/12 max-md:gap-y-3 max-md:gap-x-3">
                <div class="flex flex-col font-medium max-md:col-span-2 text-center">
                    <div class="flex justify-between w-full ">
                        <label for="priceRange">Cena: </label>
                        <input id="inputPrice" type="number" min="0" max="2499" value="500"
                            class=" inputPrice bg-transparent text-right font-bold hover:cursor-pointer">
                        <span class=" font-bold">€</span>
                    </div>
                    <div>
                        <input type="range" id="sliderPrice" min="0" max="2499" value="500"
                            class="rounded-3xl custom-slider sliderPrice">
                    </div>
                </div>
                <div class=" text-center">
                    <label for="category">Kategória: </label>
                    <select name="category" id="category" class="bg-transparent font-bold text-light-green">
                        <option value="all" class="bg-dark-purple">Všetky</option>
                        <option value="iOS" class="bg-dark-purple">iOS</option>
                        <option value="android" class="bg-dark-purple">Android</option>
                        <option value="gadgets" class="bg-dark-purple">Gadgets</option>
                    </select>
                </div>

                <div class=" text-center">
                    <label for="category">Farba: </label>
                    <select name="category" id="category" class="bg-transparent font-bold text-light-green">
                        <option value="all" class="bg-dark-purple">Všetky</option>
                        <option value="iOS" class="bg-dark-purple">iOS</option>
                        <option value="android" class="bg-dark-purple">Android</option>
                        <option value="gadgets" class="bg-dark-purple">Gadgets</option>
                    </select>
                </div>
                <div class=" text-center">
                    <label for="category">Pamäť: </label>
                    <select name="category" id="category" class="bg-transparent font-bold text-light-green">
                        <option value="all" class="bg-dark-purple">Všetky</option>
                        <option value="iOS" class="bg-dark-purple">iOS</option>
                        <option value="android" class="bg-dark-purple">Android</option>
                        <option value="gadgets" class="bg-dark-purple">Gadgets</option>
                    </select>
                </div>
                <img src="{{ asset('img/svg/filter_off.svg') }}" class=" mx-auto">
                <div class="max-md:col-span-2 flex items-center justify-center">
                    <button type="submit"
                        class="flex items-center justify-center w-fit h-fit p-2 max-md:px-20 max-md:col-span-2 rounded-full bg-light-green text-light-purple font-bold hover:scale-110 ">
                        <img src="{{ asset('img/svg/search.svg') }}">
                    </button>
                </div>
            </div>
        </form>
        <form id="productsDisplayStart" method="get" action="/shop"
            class=" flex items-center gap-4 w-8/12 mx-auto text-light-green -mb-8 mt-10 max-md:flex-col">
            <label for="order_by" class=" text-xl font-bold">Zoradiť podľa: </label>
            <select name="order_by" id="order_by" class="bg-transparent font-bold text-light-green">
                <option value="" class="hidden bg-dark-purple" @if ( $order_by ==='') selected @endif >
                    Vyberte zoradenie
                </option>
                <option value="ascPrice" class="bg-dark-purple" @if ( $order_by ==='ascPrice') selected @endif>
                    Cena vzostupne
                </option>
                <option value="dscPrice" class="bg-dark-purple" @if ( $order_by ==='dscPrice') selected @endif>
                    Cena zostupne
                </option>
                <option value="availability" class="bg-dark-purple" @if ( $order_by ==='availability') selected @endif>
                    Dostupnosti</option>
            </select>
        </form>
        <div
            class="grid grid-cols-4 max-xl:grid-cols-3 max-lg:grid-cols-2 max-md:grid-cols-1 w-8/12 mx-auto gap-x-12 gap-y-8 max-md:gap-y-4 my-20 z-0">
            @foreach ($array_products as $index => $item)
                <div class="flex flex-col">
                    <!--TODO upraviť linky na základe parametra-->
                    <a href="/single-page/{{ $item['id'] }}"
                        class=" w-fit h-full flex flex-col justify-between items-center shadow-custom shadow-purple mx-auto rounded-[2.5rem]">
                        <p class="text-white font-medium mt-2 px-6 text-lg text-center">{{ $item['name'] }}</p>
                        <img src="{{ $item['image'] }}" class=" mb-8 scale-[80%] rounded-2xl">
                    </a>
                    <a id="priceChange{{ $index }}" href="./shopping_cart.html"
                        class=" relative bottom-6 bg-light-purple text-light-green font-bold text-lg text-center w-32 py-2 rounded-3xl mx-auto hover:bg-light-green hover:text-light-purple cursor-pointer">
                        {{ $item['price'] }} €
                    </a>
                </div>
            @endforeach
        </div>
        {{ $pagination->links() }}
    </main>
</body>

</html>
<script src="{{ asset('js/shop_filter.js') }}"></script>
