<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin zóna</title>
    <link href="../output.css" rel="stylesheet">
    @vite('resources/css/app.css')

</head>

<body class="bg-gradient-to-b min-h-screen from-dark-purple to-black via-black font-manrope min-w-80">
    <header>
        <x-navbar />
    </header>
    <main class="flex max-lg:items-center w-8/12 mx-auto mt-10 max-lg:mt-0 max-lg:flex-col max-sm:w-10/12">
        <aside
            class=" w-fit min-w-48 h-fit flex flex-col max-lg:mb-8 max-lg:gap-x-4 max-lg:flex-row max-lg:w-fit max-lg:items-center py-4 px-8 text-light-green shadow-custom shadow-purple rounded-2xl gap-y-4">
            <h3 class=" text-center font-bold text-2xl max-lg:hidden">Menu</h3>
            <div class="flex justify-between items-center">
                <a href="/profile" class="text-md hover:font-bold"> Objednávky </a>
                <img src="{{ asset('img/svg/box.svg') }}" class="max-lg:hidden">
            </div>
            @auth
                @can('admin')
                    <hr class="max-lg:hidden">
                    <div class="flex justify-between items-center max-lg:justify-center">
                        <a href="/admin" class="text-md hover:font-bold"> Produkty </a>
                        <img src="{{ asset('img/svg/inventory.svg') }}" class="max-lg:hidden">
                    </div>
                @endcan
            @endauth
            <a href="/logout"
                class="w-full h-fit text-center border-2 mt-4 px-4 py-2 max-lg:py-0 max-lg:mt-0 rounded-full hover:bg-light-green hover:font-extrabold hover:text-dark-purple">Odhlásiť</a>
        </aside>
        <div class="mx-auto w-8/12 h-fit max-lg:w-9/12 max-sm:w-full mb-10">
            <h1 class="text-center text-3xl font-bold text-light-green mb-10">Detail produktu</h1>
            <form
                class="grid grid-cols-2 max-lg:grid-cols-1 w-full h-full p-6 gap-x-6 gap-y-0 max-md:w-full shadow-custom shadow-purple text-light-green rounded-2xl">
                <div>
                    <label for="product_name">Meno produktu</label><br>
                    <input class="w-full h-8 rounded text-dark-purple font-semibold p-2 mt-1 mb-2" type="text"
                        id="product_name" name="name" value="{{ $product->name }}" tabindex="1" />
                </div>
                <div>
                    <label for="description">Opis produktu</label><br>
                    <input class="w-full h-8 rounded text-dark-purple font-semibold p-2 mt-1 mb-2" type="text"
                        id="description" name="city" value="{{ $product->description }}" tabindex="4">
                </div>

                <div class="col-start-1">
                    <label for="category">Kategória</label><br>
                    <input class="w-full h-8 rounded text-dark-purple font-semibold p-2 mt-1 mb-2" type="text"
                        id="category" name="category" value="{{ $product->category }}" tabindex="2">
                </div>
                <div>
                    <label for="price">Cena</label><br>
                    <input class="w-full h-8 rounded text-dark-purple font-semibold p-2 mt-1 mb-2" type="text"
                        id="price" name="price" value="{{ number_format($product->price, 2) }} €" tabindex="5">
                </div>
                <div class="grid grid-cols-2 gap-x-4 col-start-2 max-lg:col-start-1 row-start-1 max-lg:row-start-auto">
                    <label for="paramter">Parametre</label><br>
                    @foreach ($parameters as $index => $parameter_array)
                        <input class="w-full h-8 rounded text-dark-purple font-semibold p-2 mt-1 mb-2" type="text"
                            id="paramter" name="parameter" value="{{ ucfirst($parameter_array->parameter) }}"
                            tabindex="7">
                        <input class="w-full h-8 rounded text-dark-purple font-semibold p-2 mt-1 mb-2" type="text"
                            id="paramter" name="parameter" value="{{ ucfirst($parameter_array->value) }}"
                            tabindex="7">
                    @endforeach
                </div>
                <div id="photosHolder"
                    class="bg-white max-h-none max-lg: mt-2 rounded-lg row-span-3 row-start-2 col-start-2 max-lg:col-start-1 max-lg:row-start-auto">
                    <input id="fileInput" class="hidden opacity-100 w-full h-full cursor-pointer" type="file"
                        accept="image/jpeg, image/png" multiple="true">
                    <label for="fileInput"
                        class=" flex justify-center items-center flex-col max-lg:flex-row max-lg:gap-2 w-full h-full text-white font-bold rounded cursor-pointer">
                        <img src="{{ asset('img/svg/picture_add.svg') }}" class="max-h-fit">
                        <p class="text-center text-dark-purple font-extrabold text-xl">Pridať obrázok/y</p>
                    </label>
                </div>
                <div id="imagePreview"
                    class="grid grid-cols-4 col-start-2 max-lg:col-start-1 rounded-lg pt-4 gap-x-2 max-">

                </div>
                <div class=" flex gap-4 col-span-2 max-lg:col-span-1 mt-8 max-lg:mx-auto">
                    <button type="submit"
                        class=" border-2 border-green-500 text-green-500 px-4 py-1 w-32 rounded-full hover:font-bold hover:bg-green-500 hover:text-light-green text-center">Vytvoriť</button>
                    <a href="../admin"
                        class=" border-2 border-red-500 text-red-500 px-4 py-1 w-32 rounded-full hover:font-bold hover:bg-red-500 hover:text-light-green text-center">Späť</a>
                </div>
            </form>
        </div>
    </main>
</body>


<script src="../js/display_img.js"></script>

</html>
