<div class="w-8/12 h-16 mx-auto bg-transparent font-manrope flex justify-between items-center">
    <div>
        <h1 class=" text-light-green text-2xl font-extrabold">E-SHOP</h1>
    </div>
    <div class="text-light-green flex justify-between items-center space-x-4 text-center w-1/2">
        <div class=" grid grid-cols-4 w-8/12">
            <a class="hover:font-bold cursor-pointer">Home</a>
            <a class="hover:font-bold cursor-pointer">Featured</a>
            <a class="hover:font-bold cursor-pointer">Store</a>
            <a class="hover:font-bold cursor-pointer">Profile</a>
        </div>
        <div id="search-bar" class="">
            <input type="text"
                class=" border-2 w-full h-8 border-light-green rounded-3xl bg-transparent focus:outline-none text-center"
                placeholder="Search">
        </div>
        <img src='{{ asset('img/svg/avatar.svg') }}' class=" scale-150">
        <div id="cart" class=" flex justify-center items-baseline">
            <div class=" pt-6">
                <img src='{{ asset('img/svg/cart.svg') }}' class=" scale-150">
                <p class=" relative bottom-2 left-2 bg-light-green text-dark-purple text-center rounded-full">0</p>
            </div>
        </div>
    </div>
</div>
