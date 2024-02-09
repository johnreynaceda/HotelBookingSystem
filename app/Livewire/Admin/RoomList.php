<?php

namespace App\Livewire\Admin;

use App\Models\Room;
use App\Models\Shop\Product;
use App\Models\User;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use WireUi\Traits\Actions;

class RoomList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;
    use Actions;

    public $add_modal = false;
    public $name, $description, $price, $photo=[];

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required(),
                    Textarea::make('description')
                    ->required(),
                    TextInput::make('price')->numeric()
                    ->required(),
                    FileUpload::make('photo')->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(Room::query())->headerActions([
                Action::make('new_room')->label('New Room')->button()->icon('heroicon-m-plus-small')->action(
                    function(){
                        $this->add_modal = true;
                    }
                )
            ])
            ->columns([
                ViewColumn::make('photo')->label('IMAGE')->view('filament.table.photo'),
                TextColumn::make('name')->label('NAME')->searchable(),
                TextColumn::make('description')->label('DESCRIPTION')->searchable(),
                TextColumn::make('price')->label('PRICE')->formatStateUsing(function($record){
                    return '₱'. number_format($record->price,2);
                })->searchable(),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                EditAction::make('edit')->color('success'),
                DeleteAction::make('delete')
            ])
            ->bulkActions([
                // ...
            ])->emptyStateDescription('Once you write the first room, it will appear here.')->emptyStateHeading('No Rooms yet!')->emptyStateIcon('heroicon-s-home-modern');
    }

    public function saveRecord(){
        sleep(2);
       foreach ($this->photo as $key => $value) {
        Room::create([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'photo_path' => $value->store('Room Photo', 'public'),
        ]);
       }
       $this->add_modal = false;
       $this->reset('name', 'description','price', 'photo');
       $this->dialog()->success(
        $title = 'Room saved',
        $description = 'Room Info has been saved'
    );

    }
    public function render()
    {
        return view('livewire.admin.room-list');
    }
}
