<?php

namespace App\Livewire;

use App\Models\Chat;
use App\Models\Folder;
use App\Models\Server;
use App\Models\SubServer;
use App\Models\User;
use Livewire\Component;

class DashboardStats extends Component
{
    public $userCount;
    public $foldersCount;
    public $chatsCount;

    public function mount()
    {
        $this->userCount = User::count();
        $this->foldersCount = Folder::count();
        $this->chatsCount = Chat::count();
    }
    public function render()
    {
        return view('livewire.dashboard-stats');
    }
}
