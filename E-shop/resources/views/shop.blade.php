<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-black">
    <main class=" bg-gradient-to-b from-dark-purple to-black via-black h-full">
        <x-navbar />

        <div class="grid grid-cols-3 w-8/12 mx-auto gap-x-16 gap-y-16 my-20 h-f">
            @foreach ($array as $user)
                <div
                    class="w-60 h-60 flex flex-col justify-center items-center shadow-custom shadow-purple mx-auto rounded-[3rem]">
                    <p class="text-white">{{ $user->name }}</p>
                    <p class="text-white">{{ $user->email }}</p>
                    <p class="text-white">{{ $user->phone_number }}</p>
                    <div>

                    </div>
                </div>
            @endforeach
        </div>
    </main>
</body>

</html>
