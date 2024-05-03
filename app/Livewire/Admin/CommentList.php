<?php

namespace App\Livewire\Admin;

use App\Models\Comment;
use App\Models\Spot;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\ViewColumn;
use Livewire\Component;
use App\Models\Shop\Product;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Filament\Tables\Columns\Layout\Grid as GridLayout;


class CommentList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Comment::query())
            ->columns([
                GridLayout::make(1)->schema([

                    ViewColumn::make('status')->view('filament.table.comment'),
                        // TextColumn::make('comment')->searchable(),
                        // TextColumn::make('description'),
                    ]),
            ])->contentGrid([
                'md' => 2,
                'xl' => 3,
            ])
            ->filters([
                // ...
            ])
            ->actions([
                // Action::make('edit')->color('success')->action(
                //     function($record){
                //         $this->name = $record->name;
                //         $this->description = $record->description;
                //         $this->spot_id = $record->id;
                //         $this->edit_modal = true;
                //     }
                // ),
                DeleteAction::make('delete')
            ])
            ->bulkActions([
                // ...
            ]);
    }
    public function render()
    {
        return view('livewire.admin.comment-list');
    }
}
