<div class="w-8/12 h-16 mx-auto bg-black font-manrope flex justify-between items-center">
    <div>
        <h1 class=" text-light-green">E-shop</h1>
    </div>
    <div class="text-light-green flex items-center gap-x-4">
        <a>Home</a>
        <a>Featured</a>
        <a>Store</a>
        <a>Profile</a>
        <img src='{{ asset('img/svg/avatar.svg') }}' class=" scale-150">
        <div id="cart" class=" flex justify-center items-baseline">
            <div class=" pt-6">
                <img src='{{ asset('img/svg/cart.svg') }}' class=" scale-150">
                <p class=" relative bottom-2 left-2 bg-light-green text-dark-purple text-center rounded-full">0</p>
            </div>
        </div>
    </div>
</div>
