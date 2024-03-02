<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;
use App\Models\Post;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use WireUi\Traits\Actions;

class UserComment extends Component implements HasForms
{
    use InteractsWithForms;
    use Actions;
    public $name, $comment;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->label('Name (Optional)'),
                MarkdownEditor::make('comment')->required(),
            ]);
    }

    public function submit(){
        sleep(2);
        $this->validate([
            'comment' => 'required',
        ]);
        Comment::create([
            'name' => $this->name,
            'comment' => $this->comment,
        ]);
        $this->dialog()->success(

            $title = 'Comment sent',

            $description = 'Your comment was successfully sent'

        );
        $this->reset('name', 'comment');

    }

    public function render()
    {
        return view('livewire.user-comment');
    }
}
