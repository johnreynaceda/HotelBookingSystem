<?php

namespace App\Livewire;

use Filament\Forms\Components\FileUpload;
use Livewire\Component;
use App\Models\Post;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;

class Reservation extends Component implements HasForms
{
    use InteractsWithForms;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
               FileUpload::make('payment')->label('Proof of Payment'),
            ]);
    }

    public function render()
    {
        return view('livewire.reservation');
    }
}
