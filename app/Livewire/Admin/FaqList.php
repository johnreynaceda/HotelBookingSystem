<?php

namespace App\Livewire\Admin;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use App\Models\Shop\Product;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use App\Models\Faq;

class FaqList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Faq::query())->headerActions([
                CreateAction::make('new_faq')->icon('heroicon-o-plus')->form([
                    TextInput::make('question')->required(),
                    Textarea::make('answer')->required(),
                ])->modalWidth('2xl')->modalHeading('Create new FAQ')
            ])
            ->columns([
                TextColumn::make('question')->label('QUESTION'),
                TextColumn::make('answer')->label('ANSWER')->words(20),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                EditAction::make('edit')->color('success')->form([
                    TextInput::make('question')->required(),
                    Textarea::make('answer')->required(),
                ])->modalWidth('2xl')->modalHeading('Create new FAQ'),
                DeleteAction::make('delete')
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.admin.faq-list');
    }
}
