<?php

namespace App\Livewire\Admin;

use App\Models\Reservation;
use Carbon\Carbon;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use WireUi\Traits\Actions;

class ReservationList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;
    use Actions;

    public $view_modal = false;
    public $reservation_data;
    public $payment_modal = false;

    public $reservation_id;
    public $date_froms, $date_to;
    public $payment_amount;

    public function table(Table $table): Table
    {
        return $table
            ->query(Reservation::query()->whereIn('status', ['accepted', 'checkout'])->orderBy('created_at', 'DESC'))->columns([
            // ViewColumn::make('photo')->label('IMAGE')->view('filament.table.photo'),
            TextColumn::make('fullname')->label('FULLNAME')->searchable(),
            TextColumn::make('contact')->label('CONTACT')->searchable(),
            TextColumn::make('room.name')->label('ROOM')->searchable(),
            TextColumn::make('date_from')->label('DATE FROM')->date()->searchable(),
            TextColumn::make('date_to')->label('DATE TO')->date()->searchable(),
            ViewColumn::make('status')->label('STATUS')->view('filament.table.status'),
        ])
            ->filters([
                // ...
            ])
            ->actions([
                Action::make('view')->icon('heroicon-o-eye')->color('warning')->action(
                    function ($record) {
                        $this->reservation_data = $record;

                        $this->view_modal = true;
                    }
                ),
                ActionGroup::make([
                    Action::make('checkout')->hidden(
                        function ($record) {
                            return $record->status == 'checkout';
                        }
                    )->color('danger')->icon('heroicon-o-arrows-pointing-out')->action(
                        function ($record) {
                            if ($record->status_of_payment == 'Downpayment') {
                                $this->reservation_data = $record;
                                $this->date_froms = Carbon::parse($record->date_from);
                                $this->date_to = Carbon::parse($record->date_to);

                                $this->reservation_id = $record->id;
                                $this->payment_modal = true;
                            } else {
                                $record->update([
                                    'status' => 'checkout',
                                ]);
                            }
                        }
                    ),
                ]),
            ])
            ->bulkActions([
                // ...
            ])->emptyStateDescription('Once you write the first room, it will appear here.')->emptyStateHeading('No Rooms yet!')->emptyStateIcon('heroicon-s-home-modern');
    }

    public function checkout()
    {
        sleep(2);
        $data = Reservation::where('id', $this->reservation_id)->first();

        $data->update([
            'amount' => $data->amount + $this->payment_amount,
            'status' => 'checkout',
        ]);
        $this->payment_modal = false;

        $this->dialog()->success(
            $title = 'Checkout',
            $description = 'Guest has successfully checkout'
        );
    }

    public function render()
    {
        return view('livewire.admin.reservation-list');
    }
}
