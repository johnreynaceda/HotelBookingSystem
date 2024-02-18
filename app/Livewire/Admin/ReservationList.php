<?php

namespace App\Livewire\Admin;

use App\Models\Reservation;
use App\Models\Room;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
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
            ->query(Reservation::query()->whereIn('status', ['pending','accepted']))->columns([
                // ViewColumn::make('photo')->label('IMAGE')->view('filament.table.photo'),
                TextColumn::make('fullname')->label('FULLNAME')->searchable(),
                TextColumn::make('contact')->label('CONTACT')->searchable(),
                TextColumn::make('email')->label('EMAIL')->searchable(),
                TextColumn::make('room.name')->label('ROOM')->searchable(),
                TextColumn::make('date_from')->label('DATE FROM')->date()->searchable(),
                TextColumn::make('date_to')->label('DATE TO')->date()->searchable(),
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
