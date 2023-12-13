<?php

use Livewire\Volt\Component;

new class extends Component {
    public function with()
    {
        return [
            'notesSentCount' => Auth::user()
                ->notes()
                ->where('send_date', '<', now())
                ->where('is_published', true)
                ->count(),

            'notesLovedCount' => Auth::user()->notes->sum('heart_count'),
        ];
    }
}; ?>

<div>
    <div class="grid grid-cols-2 gap-4 sm:grid-cols-2 md:grid-cols-2">
        <div class="p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
            <div class="flex items-center">
                <div>
                    <p class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">Notes Sent</p>
                </div>
            </div>
            <div class="mt-6">
                <p class="text-3xl font-bold leading-9 text-gray-900 dark:text-gray-100">{{ $notesSentCount }}</p>
            </div>
        </div>
        <div class="p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
            <div class="flex items-center">
                <div>
                    <p class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-100">Notes Loved</p>
                </div>
            </div>
            <div class="mt-6">
                <p class="text-3xl font-bold leading-9 text-gray-900 dark:text-gray-100">{{ $notesLovedCount }}</p>
            </div>
        </div>
    </div>
</div>
