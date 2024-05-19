<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;

class UserList extends Component
{
    use WithPagination;

    public $search;

    public $selectedUser;

    public function viewUser(User $user)
    {
        $this->selectedUser = $user;
        // dd($this->selectedUser->name);
        $this->dispatch('open-modal', name : 'user-detail');
    }

    #[Computed]
    public function users()
    {
        return User::latest()->where("name","like","%".$this->search."%")->paginate(5);
    }

    #[On('user-created')]
    public function render()
    {
        return view('livewire.user-list');
    }
}
