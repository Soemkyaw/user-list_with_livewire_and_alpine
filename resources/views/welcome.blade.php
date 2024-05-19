<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    {{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class=" font-mono">
    <div class="flex justify-center">
        <x-modal name='test'>
            <x-slot:body>
                <livewire:register></livewire:register>
            </x-slot:body>
        </x-modal>
        <x-modal name='test2'>
            <x-slot:body>
                <header>Hello World 2</header>
                <div>I am Soe Moe Kyaw 2</div>
            </x-slot:body>
        </x-modal>
        <button x-data x-on:click="$dispatch('open-modal',{ name : 'test'})"
            class=" bg-blue-500 rounded px-3 py-2 text-white mt-5 ml-5">Register Form</button>
        <button x-data x-on:click="$dispatch('open-modal',{ name : 'test2'})"
            class=" bg-blue-500 rounded px-3 py-2 text-white mt-5 ml-5">open modal 2</button>
    </div>

    <livewire:user-list></livewire:user-list>

</body>

</html>
