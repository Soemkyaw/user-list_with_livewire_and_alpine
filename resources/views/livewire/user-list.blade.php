<div class="grid grid-cols-3 mt-12">
    <h1 class="col-start-2 text-3xl mb-5 ">User List</h1>
    <div class="col-start-2 mb-10">
          <div>
            <input wire:model.live="search" type="text" class=" border border-gray-400 bg-gray-100 rounded outline-none ps-2 py-2 w-full" placeholder="Search.">
          </div>
    </div>

    <ul role="list" class="divide-y divide-gray-100 col-start-2">
        @foreach ($this->users as $user)
            <li wire:key="{{ $user->id }}" class="flex justify-between gap-x-6 py-5 shadow-md mb-5 px-5 rounded">
                <div class="flex min-w-0 gap-x-4">
                    <div class="min-w-0 flex-auto">
                        <p class="text-sm font-semibold leading-6 text-gray-900">{{ $user->name }}</p>
                        <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ $user->email }}</p>
                    </div>
                </div>
                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                    {{-- <p class="text-sm leading-6 text-gray-900">Co-Founder / CEO</p>
                    <p class="mt-1 text-xs leading-5 text-gray-500">Last seen <time datetime="2023-01-23T13:23Z">3h
                            ago</time></p> --}}
                    <button wire:click.prevent="viewUser({{ $user->id }})" class="bg-green-500 px-4 py-2 rounded-lg text-white hover:bg-green-400" >View</button>
                </div>
            </li>
        @endforeach
    </ul>
    <div class="col-start-2 mt-12">
        {{ $this->users->links() }}
    </div>

    @if ($selectedUser)
        <x-modal name="user-detail" title="View about {{ $selectedUser->name }}">
            <x-slot:body>
                <div class="mt-12">
                    <div class="text-2xl ml-5 text-gray-700">{{ $selectedUser->name }}</div>
                    <div class=" ml-5 text-gray-400">{{ $selectedUser->email }}</div>
                </div>
            </x-slot:body>
        </x-modal>
    @endif
</div>
