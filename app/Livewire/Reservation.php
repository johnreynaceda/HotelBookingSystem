<?php

namespace App\Livewire;

use Carbon\Carbon;
use Filament\Forms\Components\FileUpload;
use Livewire\Component;
use App\Models\Post;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use WireUi\Traits\Actions;

class Reservation extends Component implements HasForms
{
    use InteractsWithForms;
    use Actions;
    public $payment= [];

    public $fullname, $address, $contact, $email, $social_media, $date_from, $date_to, $room_id, $mode_of_payment, $payment_status;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
               FileUpload::make('payment')->label('Proof of Payment'),
            ]);
    }

    public function submitReservation(){
        $this->validate([
            'fullname' =>'required',
            'address' =>'required',
            'contact' =>'required',
            'email' =>'required',
         'social_media' =>'required',
            'date_from' =>'required',
            'date_to' =>'required',
            'room_id' =>'required',
         'mode_of_payment' =>'required',
            'payment_status' =>'required',
            'payment' => 'required',
        ]);

        foreach ($this->payment as $key => $value) {
            \App\Models\Reservation::create([
                'fullname' => $this->fullname,
                'address' => $this->address,
                'contact' => $this->contact,
                'email' => $this->email,
              'social_media' => $this->social_media,
               'date_from' => Carbon::parse($this->date_from),
               'date_to' => Carbon::parse($this->date_to),
               'room_id' => $this->room_id,
             'mode_of_payment' => $this->mode_of_payment,
               'status_of_payment' => $this->payment_status,
               'payment_proof' => $value->store('payment_proof', 'public'),
            ]);
        }
        $this->dialog()->success(

            $title = 'Reservation  Submit',

            $description = 'Your Reservation was successfully submitted'

        );
        $this->reset('fullname',
        'address',
        'contact',
        'email',
      'social_media',
       'date_from',
       'date_to',
       'room_id',
     'mode_of_payment',
       'payment_status',
       'payment');

        sleep(3);
    }

    public function render()
    {
        return view('livewire.reservation',[
            'reserves' => \App\Models\Reservation::where('status', 'accepted')->get(),
        ]);
    }
}
