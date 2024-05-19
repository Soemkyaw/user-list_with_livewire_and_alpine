<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class Register extends Component
{
    use WithFileUploads;

    #[Validate('required|min:3')]
    public $name;

    #[Validate('required|email')]
    public $email;

    #[Validate('required|min:6')]
    public $password;

    #[Validate('nullable|sometimes|image')]
    public $image;

    public function createNewUser()
    {
        $validate = $this->validate();

        if ($this->image) {
                $validate['image'] = $this->image->store('uploads','public');
            }

        // dd($validate);

        $user = User::create($validate);

        // how can i reset data?
        $this->reset(['name', 'email', 'password', 'image']);

        session()->flash('created', 'User successfully created.');

        $this->dispatch('user-created',$user);
        $this->dispatch('close-modal');
    }


    public function render()
    {
        return view('livewire.register');
    }
}
