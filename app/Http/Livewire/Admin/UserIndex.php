<?php

namespace App\Http\Livewire\Admin;
use App\Models\User;

use Livewire\Component;

// use Livewire\WithPagination;

class UserIndex extends Component
{
    // use WithPagination;
    // protected $paginationtheme = 'bootstrap';
    
    public $search;
    public function updatingSearch(){
        $this->resetpage();
    }
    
    public function render()
    {
        // $users = User::all();$informes = Informe::where('status',1)->latest('id')->paginate(30);
        $users = User::where('status', 1)
       ->where('name', 'LIKE', '%'. $this->search . '%')
        //->orWhere('email', 'LIKE', '%'. $this->search . '%')
        ->paginate(8);
        // return view('admin.users.index', compact('users'));
        return view('livewire.admin.user-index', compact('users'));
    }
}