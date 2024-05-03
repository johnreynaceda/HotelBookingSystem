<?php

namespace App\Livewire\Admin;

use App\Models\Reservation;
use Livewire\Component;

class Report extends Component
{
    public function render()
    {
        return view('livewire.admin.report',[
            'reservations' => Reservation::where('status', 'checkout')->get(),
        ]);
    }
}
