<form>
    <div class="flex items-center justify-center w-2/3 h-12 mx-auto bg-light-purple text-light-green rounded-full">
        <div class="flex flex-col font-medium">
            <div class="flex w-full">
                <label for="priceRange">Cena: </label>
                <input type="number" id="priceInput" min="0" max="1000" value="500">
            </div>
            <input type="range" id="priceRange" min="0" max="1000" value="500"
                class="rounded-3xl custom-slider">
        </div>
        <div>
            <label for="category">Kategória: </label>
            <select name="category" id="category">
                <!-- TODO dorobiť foreloop pre všetky možnosti-->
                <option value="all">Všetky</option>
                <option value="iOS">iOS</option>
                <option value="android">Android</option>
                <option value="gadgets">Gadgets</option>
            </select>
        </div>
        <div>
            <label for="category">Farba: </label>
            <select name="category" id="category">
                <!-- TODO dorobiť foreloop pre všetky možnosti-->
                <option value="all">Všetky</option>
                <option value="iOS">iOS</option>
                <option value="android">Android</option>
                <option value="gadgets">Gadgets</option>
            </select>
        </div>
        <div>
            <label for="category">Pamäť: </label>
            <select name="category" id="category">
                <!-- TODO dorobiť foreloop pre všetky možnosti-->
                <option value="all">Všetky</option>
                <option value="iOS">iOS</option>
                <option value="android">Android</option>
                <option value="gadgets">Gadgets</option>
            </select>
        </div>
        <img src='{{ asset('img/svg/filter.svg') }}' class="">
    </div>
</form>
