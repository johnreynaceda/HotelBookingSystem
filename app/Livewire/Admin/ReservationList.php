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
// use Filament\Tables\Columns\ViewColumn;

class ReservationList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;
    use Actions;

    public $view_modal = false;
    public $reservation_data;



    public function table(Table $table): Table
    {
        return $table
            ->query(Reservation::query()->whereIn('status', ['pending','accepted']))->headerActions([
                Action::make('reserve')->label('Walk-In Transaction')->icon('heroicon-m-document-duplicate')->form([
                    Grid::make(2)->schema([
                        TextInput::make('fullname')->required(),
                        TextInput::make('address')->required(),
                        TextInput::make('contact')->required(),
                        TextInput::make('email')->required(),
                        TextInput::make('social_media')->required(),
                        DatePicker::make('date_from')->required(),
                        DatePicker::make('date_to')->required(),
                        Select::make('room_id')->label('Room')->options(
                            Room::all()->pluck('name', 'id')
                        ),
                        Select::make('status_of_payment')->label('Payment Status')->options(
                            [
                                'Fully Paid' => ' Fully Paid',
                                'Downpayment' => 'Downpayment'
                            ]
                        )
                    ])
                ])->modalWidth('4xl')->action(
                    function($record,$data){
                    Reservation::create([
                        'fullname' => $data['fullname'],
                        'address' => $data['address'],
                        'contact' => $data['contact'],
                        'email' => $data['email'],
                      'social_media' => $data['social_media'],
                      'date_from' => Carbon::parse($data['date_from']),
                      'date_to' => Carbon::parse($data['date_to']),
                      'room_id' => $data['room_id'],
                    'mode_of_payment' => 'Cash',
                    'status_of_payment' => $data['status_of_payment'],
                    'status' => 'accepted',
                    ]);

                    $this->dialog()->success(
                        $title = 'Reservation saved',
                        $description = 'Reservation has been saved'
                    );
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
        return view('livewire.admin.reservation-list');
    }
}
