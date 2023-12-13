<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use App\Models\Note;

new #[Layout('layouts.app')] class extends Component {
    public Note $note;

    public function mount(Note $note)
    {
        $this->authorize('update', $note);
        $this->fill($note);
    }
}; ?>

<div class="space-y-2">
    <p>{{ $note->title }}</p>
    <p>{{ $note->id }}</p>
    <p>{{ $note->user->email }}</p>
</div>
