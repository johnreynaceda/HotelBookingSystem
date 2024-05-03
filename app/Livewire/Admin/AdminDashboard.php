<?php

namespace App\Livewire\Admin;

use App\Models\Reservation;
use App\Models\Room;
use Carbon\Carbon;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use WireUi\Traits\Actions;
use Filament\Forms\Components\ViewField;

class AdminDashboard extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;
    use Actions;

    public $view_modal = false;

    public $fullname, $address, $contact, $email, $social_media, $date_from, $date_to, $room_id, $mode_of_payment, $payment_status, $amount;
    public $walkin_modal = false;
    public $reservation_data;

    public $number_of_days;

    public function updatedPaymentStatus(){
        if($this->payment_status == 'Fully Paid'){
          $this->number_of_days = Carbon::parse($this->date_to)->diffInDays(Carbon::parse($this->date_from));
         $this->amount = Room::where('id', $this->room_id)->first()->price * $this->number_of_days;

        }
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
        //  'mode_of_payment' =>'required',
            'payment_status' =>'required',
            // 'payment' => 'required',
        ]);

       Reservation::create([
            'fullname' => $this->fullname,
            'address' => $this->address,
            'contact' => $this->contact,
            'email' => $this->email,
          'social_media' => $this->social_media,
           'date_from' => Carbon::parse($this->date_from),
           'date_to' => Carbon::parse($this->date_to),
           'room_id' => $this->room_id,
        //  'mode_of_payment' => $this->mode_of_payment,
           'status_of_payment' => $this->payment_status,
           'amount' => $this->amount,
           'status' => 'accepted',
        //    'payment_proof' => $value->store('payment_proof', 'public'),
        ]);
        $this->dialog()->success(

            $title = 'Walk In  Submit',

            $description = 'Walk In was successfully submitted'

        );
        $this->walkin_modal = false;
        $this->reset('fullname',
        'address',
        'contact',
        'email',
      'social_media',
       'date_from',
       'date_to',
       'room_id',

       'payment_status',
       );

        sleep(3);

    }

    public function table(Table $table): Table
    {
        return $table
            ->query(Reservation::query()->whereIn('status', ['pending']))->headerActions([
                Action::make('reserve')->label('Walk-In Transaction')->icon('heroicon-m-document-duplicate')->action(
                    function($record){
                       $this->walkin_modal = true;
                    }
                )
            ])->columns([
                // ViewColumn::make('photo')->label('IMAGE')->view('filament.table.photo'),
                TextColumn::make('fullname')->label('FULLNAME')->searchable(),
                TextColumn::make('contact')->label('CONTACT')->searchable(),
                // TextColumn::make('email')->label('EMAIL')->searchable(),
                TextColumn::make('room.name')->label('ROOM')->searchable(),
                TextColumn::make('date_from')->label('DATE FROM')->date()->searchable(),
                TextColumn::make('date_to')->label('DATE TO')->date()->searchable(),
                ViewColumn::make('status')->label('STATUS')->view('filament.table.status')
            ])
            ->filters([
                // ...
            ])
            ->actions([
                Action::make('view')->icon('heroicon-o-eye')->color('warning')->action(
                    function($record){
                        $this->reservation_data = $record;
                        $this->view_modal = true;
                    }
                ),
                ActionGroup::make([
                   Action::make('approve')->color('success')->icon('heroicon-o-hand-thumb-up')->action(
                    function($record){
                        $record->update([
                            'status' => 'accepted'
                        ]);
                    }
                   ),
                   Action::make('reject')->color('danger')->icon('heroicon-o-hand-thumb-down')->action(
                    function($record){
                        $record->update([
                            'status' => 'rejected'
                        ]);
                    }
                   ),
                ]),
            ])
            ->bulkActions([
                // ...
            ])->emptyStateDescription('Once you write the first room, it will appear here.')->emptyStateHeading('No Rooms yet!')->emptyStateIcon('heroicon-s-home-modern');
    }

    public function render()
    {
        return view('livewire.admin.admin-dashboard');
    }
}
