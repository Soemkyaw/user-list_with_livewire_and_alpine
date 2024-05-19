@props(['name','title'])
<div
    x-data = "{ show : false , name : '{{ $name }}' }"
    x-show = "show"
    x-on:open-modal.window = "show = ($event.detail.name === name)"
    x-on:close-modal.window = "show = false"

    class=" fixed z-50 inset-0">
    <div class="fixed inset-0 bg-gray-100"></div>
    <div class=" bg-white rounded fixed inset-0 m-auto max-w-2xl overflow-auto" style="max-height: 700px">
        {{-- <button x-on:click="$dispatch('close-modal')" class=" bg-blue-500 rounded px-3 py-2 text-white ml-5">Close modal</button> --}}
        <div class=" flex justify-between">
            @if (isset($title))
                <div class=" text-gray-500 mt-2 ml-2">{{ $title }}</div>
            @else
                <div></div>
            @endif
            <div x-on:click="$dispatch('close-modal')" class="text-2xl text-red-500 cursor-pointer mt-2 mr-2 text-bold">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </div>
        </div>
        {{ $body }}
    </div>
</div>
