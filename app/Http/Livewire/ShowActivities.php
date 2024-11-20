<?php

namespace App\Http\Livewire;

use App\Models\UserActivity;
use Livewire\Component;

class ShowActivities extends Component
{
    public function render()
    {
        $activities = UserActivity::orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.admin.show-activities', [
            'activities' => $activities,
        ]);
    }
}
