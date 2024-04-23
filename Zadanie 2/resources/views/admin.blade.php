<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gradient-to-b min-h-screen from-dark-purple to-black via-black font-manrope min-w-80">
    
    <x-navbar />
    
    <main class="flex max-lg:items-center w-8/12 mx-auto mt-10 max-lg:flex-col max-sm:w-10/12">
        <aside
            class=" w-fit min-w-48 h-fit grid grid-cols-1 max-lg:grid-cols-2 max-lg:mb-8 max-lg:gap-x-4 max-lg:flex-row max-lg:w-fit max-lg:items-center py-4 px-8 text-light-green shadow-custom shadow-purple rounded-2xl gap-y-4">
            <h3 class=" text-center font-bold text-2xl max-lg:hidden">Menu</h3>
            <div class="flex justify-between items-center max-lg:justify-center">
                <a href="./profile.html" class="text-md hover:font-bold"> Objednávky </a>
                <img src="{{ asset('img/svg/box.svg') }}" class="max-lg:hidden">
            </div>
            <hr class="max-lg:hidden">
            <div class="flex justify-between items-center max-lg:justify-center">
                <a href="./admin.html" class="text-md hover:font-bold"> Produkty </a>
                <img src="{{ asset('img/svg/inventory.svg') }}" class="max-lg:hidden">
            </div>
            <a href="logout"
                class="w-full h-fit text-center border-2 mt-4 px-4 py-2 max-lg:col-start-1 max-lg:col-span-2 max-lg:py-0 max-lg:mt-0 rounded-full hover:bg-light-green hover:font-extrabold hover:text-dark-purple">Odhlásiť</a>
        </aside>
        <div class="mx-auto w-8/12 h-fit max-lg:w-9/12 max-sm:w-10/12">
            <h1 class="text-center text-4xl text-light-green font-medium mb-10 max-md:mb-6 max-sm:text-3xl">
                Produkty
            </h1>
            <form id="productDisplay" method="get" action="/admin" class="flex items-center text-light-green max-xl:grid max-xl:grid-col-2 gap-4 max-md:gap-8">
                <div>
                    <label>ID: </label>
                    <input name="id" id="id" type="text"
                        value="" class="border-2 border-light-green rounded-2xl px-2 bg-transparent focus:outline-none w-full mr-3">
                </div>
                <div>
                    <label>Názov: </label>
                    <input name="name" id="name" type="text"
                         value="" class="border-2 border-light-green rounded-2xl px-2 bg-transparent focus:outline-none w-full mr-3">
                </div>
                <div>
                    <label class=" text-center px-2">Kategória: </label>
                    <select name="category" id="category" class="appearance-none bg-transparent rounded-full mr-3 px-2">
                    
                        <option value="1" class="bg-dark-purple">Možnosť 1</option>
                        <option value="2" class="bg-dark-purple">Možnosť 2</option>
                        <option value="3" class="bg-dark-purple">Možnosť 3</option>
                        <option value="4" class="bg-dark-purple">Možnosť 4</option>
                    </select>
                </div>
                <button type="submit"
                    class=" border-2 border-light-green w-32 py-1 rounded-full hover:font-bold hover:text-dark-purple hover:bg-light-green">Search</button>
            </form>
            <br>
            <form class="flex items-center justify-between gap-x-4 w-60 max-md:w-full">
                <a href="./admin_product_detail.html"
                    class=" border-2 border-green-500 text-green-500 px-4 py-1 w-32 rounded-full hover:font-bold hover:bg-green-500 hover:text-light-green text-center">
                    Vytvoriť
                </a>
                <a
                    class=" border-2 border-red-500 text-red-500 px-4 py-1 w-32 rounded-full hover:font-bold hover:bg-red-500 hover:text-light-green text-center">
                    Odstrániť
                </a>
            </form>
            <br><br>
            <p class="text-light-green text-xl">Vybrané položky: <span class="text-light-green">0</span></p>
            <br><br>
            <form class="grid grid-cols-3 max-xl:grid-cols-2 max-sm:grid-cols-1 gap-x-10 gap-y-6">
               
                @foreach ($products as $index => $item)
                <div class="flex flex-col">
                    <div
                        class=" w-fit h-full flex flex-col justify-between items-center shadow-custom shadow-purple mx-auto rounded-[2.5rem]">
                        <p class="text-white font-medium mt-2 px-6 text-lg text-center">{{ $item['id'] }}</p>
                        <img src="../img/iphone_mockup.jpg" class=" mb-8 scale-[80%] rounded-2xl">
                    </div>
                    <div class=" relative bottom-6 bg-transparent text-center w-9/12 py-1 mx-auto">
                        <div class="grid grid-cols-3">
                            <a href="admin_product/{{$item['id']}}"><img src="{{ asset('img/svg/pen.svg') }}" class="m-auto scale-120 bg-light-purple p-2 rounded-full"></a>
                            <a href="admin/{{$item['id']}}"><img src="{{ asset('img/svg/bin.svg') }}" class="m-auto scale-120 bg-light-purple p-2 rounded-full"></a>
                            <input id="picker1" type="checkbox"
                                class="appearance-none m-auto rounded-md border-[0.22rem] border-light-purple bg-light-green w-9 h-9 checked:bg-light-purple checked:border-light-green">
                        </div>
                    </div>
                </div>  
                        
                    @endforeach
            </form>
        </div>
    </main>
    
</body>
</html>