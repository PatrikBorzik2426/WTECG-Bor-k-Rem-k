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
    @if (isset($data))
        <div
            class="max-w-fit mx-auto z-10 absolute top-20 left-12 bg-light-green py-4 px-10 rounded-md animate-fade-down">
            <p>
                Prihlásenie prebehlo <strong>neúspešne</strong> !
            </p>
        </div>
    @endif
    <div
        class="flex max-xl:flex-col items-center justify-center bg-gradient-to-b from-dark-purple to-black h-screen gap-20">
        <div
            class="flex flex-col items-center p-12 max-sm:p-6 w-3/12 max-2xl:w-5/12 max-lg:w-8/12 max-sm:w-10/12 text-light-green shadow-custom shadow-light-purple rounded-[3rem]">
            <div class="text-center mb-12 max-sm:mb-6 animate-jump-in">
                <h1 class=" font-bold text-2xl mb-2">Prihlasovací formulár</h1>
                <p class=" font-light">Prihlás sa a pokračujte v nákupe!</p>
            </div>
            <form method="POST" action="/login-submit" class="flex flex-col w-full h-full gap-x-12">
                {{-- Security feature --}}
                @csrf
                <div>
                    <label for="login">Login</label><br>
                    <input class="w-full h-10 rounded text-dark-purple font-semibold p-2 mt-1 mb-2" type="text"
                        id="login" name="login" value="{{ old('login') }}" tabindex="1" />
                </div>

                <div>
                    <label for="password">Heslo</label><br>
                    <input class="w-full h-10 rounded text-dark-purple font-semibold p-2 mt-1 mb-2" type="password"
                        id="password" name="password" tabindex="2">
                </div>
                <div class="flex gap-x-4 mt-8 max-lg:flex-col max-lg:gap-y-4">
                    <button type="submit"
                        class="w-full h-8 bg-light-green font-bold text-center hover:bg-transparent hover:border-2 hover:border-light-green hover:text-light-green text-dark-purple rounded-xl transition-all">
                        PRIHLÁSIŤ SA</button>
                    <a href="/shop"
                        class=" flex items-center justify-center w-full h-8 bg-light-green font-bold hover:bg-transparent hover:border-2 hover:border-light-green hover:text-light-green text-dark-purple rounded-xl transition-all">
                        <span>OBCHOD</span>
                    </a>
                </div>
            </form>
        </div>
        <div class="grid grid-cols-2 gap-8 max-xl:hidden">
            <div class="w-52 h-52 bg-light-green rounded-3xl">
            </div>

            <div class="w-52 h-52 bg-light-green rounded-3xl">
            </div>

            <div class="h-52 bg-light-green col-span-2 rounded-3xl">
            </div>
        </div>
    </div>
</body>

</html>
