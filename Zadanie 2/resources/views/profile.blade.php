<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body class=" bg-gradient-to-b from-dark-purple to-black via-black h-screen font-manrope min-w-80">
    <header>
        <x-navbar />
    </header>
    <main class="flex max-lg:items-center w-8/12 mx-auto mt-10 max-lg:flex-col max-sm:w-10/12">
        <aside
            class=" w-fit min-w-48 h-fit flex flex-col max-lg:mb-8 max-lg:gap-x-4 max-lg:flex-row max-lg:w-fit max-lg:items-center py-4 px-8 text-light-green shadow-custom shadow-purple rounded-2xl gap-y-4">
            <h3 class=" text-center font-bold text-2xl max-lg:hidden">Menu</h3>
            <div class="flex justify-between items-center">
                <a href="./profile.html" class="text-md hover:font-bold"> Objednávky </a>
                <img src="{{ asset('img/svg/box.svg') }}" class="max-lg:hidden">
            </div>
            <a href="/logout"
                class="w-full h-fit text-center border-2 mt-4 px-4 py-2 max-lg:py-0 max-lg:mt-0 rounded-full hover:bg-light-green hover:font-extrabold hover:text-dark-purple">Odhlásiť</a>
        </aside>
        <div class="w-full px-12 mx-auto flex flex-col gap-2 min-w-[46rem] max-lg:px-0 max-lg:min-w-0">
            <h1 class="text-center text-4xl text-light-green font-medium mb-10 max-md:mb-2 max-sm:text-3xl">Všetky
                objednávky</h1>
            <div class="h-fit">
                <div
                    class="flex justify-between items-center h-10 px-4 text-light-green bg-light-purple rounded-full z-0">
                    <div class="flex gap-2">
                        <img id="additionalInfoButton" src="{{ asset('img/svg/expand.svg') }}"
                            class="scale-100 cursor-pointer">
                        <img id="additionalInfoCloseButton" src="{{ asset('img/svg/insert.svg') }}"
                            class="scale-100 cursor-pointer hidden">
                        <h3 class=" max-sm:text-sm">Objednávka č. 000000</h3>
                    </div>
                    <div class="flex justify-center items-center gap-4 max-sm:gap-2">
                        <p class="max-lg:hidden">01.01.2024</p>
                        <p class="max-lg:hidden">Slovenská pošta</p>
                        <div class=" w-fit h-fit px-2 max-sm:px-0 items-center bg-green-600 rounded-full">
                            <img src="{{ asset('img/svg/done.svg') }}" class="scale-75">
                        </div>
                        <p class=" font-bold max-sm:text-sm max-sm:w-full">1925,99 €</p>
                    </div>
                </div>
                <div id="additionalInfo"
                    class=" grid grid-cols-2 h-fit pt-8 pb-4 px-4 text-dark-purple bg-light-green relative bottom-5 -z-10 rounded-b-2xl hidden">
                    <ul class="flex flex-col w-10/12">
                        <li class="flex justify-between mb-2 max-lg:flex-col">
                            <h3 class=" font-bold">Číslo objednávky: <span>000000</span></h3>
                        </li>
                        <li class="flex justify-between mb-2 max-lg:flex-col">
                            Dátum objednávky: <span class="font-bold">01.01.2024</span>
                        </li>
                        <li class="flex justify-between mb-2 max-lg:flex-col">
                            Doprava: <span class="font-bold">Slovenská pošta</span>
                        </li>
                        <li class="flex justify-between mb-2 max-lg:flex-col">
                            Stav objednávky: <span class="font-bold">Odoslaná</span>
                        </li>
                    </ul>
                    <ul>
                        <li class="flex justify-between  max-sm:flex-col">1x Položka1 <span
                                class=" font-bold">255€</span></li>
                    </ul>
                    <ul class=" col-start-2">
                        <li class="flex justify-between">Sumár ceny: <span class=" font-bold">255€</span></li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </main>
    <script src="{{asset('js/additional_info.js')}}"></script>
</body>
    

</html>
