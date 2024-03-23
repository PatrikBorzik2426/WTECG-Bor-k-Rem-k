<div class="w-8/12 h-16 mx-auto bg-transparent font-manrope flex justify-between items-center">
    <div>
        <h1 class=" text-light-green text-2xl font-extrabold">uPhone</h1>
    </div>
    <div id="menuClose" class="hidden lg:hidden">
        <span class="text-right text-light-green font-medium text-4xl cursor-pointer">&times;</span>
    </div>
    <div id="menuToggle" class="hidden max-lg:block lg:hidden">
        <span class="text-right text-light-green font-semibold cursor-pointer">&#9776;</span>
    </div>

    <div class="text-light-green flex justify-end items-center gap-x-4 text-center w-7/12 min-w-fit max-lg:hidden">
        <div class=" grid grid-cols-4 text-center w-7/12 min-w-fit">
            <a class="hover:font-bold cursor-pointer min-w-16">Home</a>
            <a class="hover:font-bold cursor-pointer">News</a>
            <a class="hover:font-bold cursor-pointer">Store</a>
            <a class="hover:font-bold cursor-pointer">Profile</a>
        </div>
        <div id="search-bar" class="w-1/3">
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
<div id="menu"
    class="hidden flex flex-col items-center text-center text-dark-purple bg-light-green gap-y-2 py-2 lg:hidden">
    <input type="text"
        class=" border-2 w-10/12 h-8 border-dark-purple rounded-3xl bg-transparent focus:outline-none text-center"
        placeholder="Search">
    <a class="hover:font-bold cursor-pointer">Home</a>
    <hr class="bg-dark-purple opacity-20 h-0.5 w-11/12" />
    <a class="hover:font-bold cursor-pointer">News</a>
    <hr class="bg-dark-purple opacity-20 h-0.5 w-11/12" />
    <a class="hover:font-bold cursor-pointer">Store</a>
    <hr class="bg-dark-purple opacity-20 h-0.5 w-11/12" />
    <a class="hover:font-bold cursor-pointer">Profile</a>
</div>

<script src="{{ asset('js/navbar.js') }}"></script>
