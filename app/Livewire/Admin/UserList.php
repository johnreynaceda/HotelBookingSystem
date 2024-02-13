<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Livewire\Component;
use App\Models\Shop\Product;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use WireUi\Traits\Actions;

class UserList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;
    use Actions;

    public function table(Table $table): Table
    {
        return $table
            ->query(User::query())->headerActions([
                CreateAction::make('new_user')->label('New Users')->icon('heroicon-s-user-plus')->action(
                    function($record, $data){
                        User::create([
                            'name' => $data['name'],
                            'email' => $data['email'],
                            'password' => bcrypt($data['password']),
                            'is_admin' => $data['account_type'],
                        ]);
                        $this->dialog()->success(
                            $title = 'User saved',
                            $description = 'User has been created'
                        );
                    }
                )->form([
                    TextInput::make('name')->required(),
                    TextInput::make('email')->required()->email(),
                    TextInput::make('password')->required()->password(),
                    Select::make('account_type')->options([
                        1 => 'Admin',
                        0 => 'Staff',
                    ])
                ])->modalWidth('xl')
            ])
            ->columns([
                TextColumn::make('name')->label('NAME')->searchable(),
                TextColumn::make('email')->label('EMAIL')->searchable(),
                TextColumn::make('is_admin')->label('ACCOUNT TYPE')->formatStateUsing(
                    function($record){
                        return $record->is_admin ? 'Admin' : 'Staff';
                    }
                )->searchable(),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                EditAction::make('edit')->color('success'),
                DeleteAction::make('delete'),
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.admin.user-list');
    }
}
