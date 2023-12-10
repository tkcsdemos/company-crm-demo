<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Employees') }}
        </h2>
    </x-slot>
    
    <div class="py-12 ">
        @if ( !empty(session('status')) )
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert"
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
        >
            @if (session('status') == 'employee-created')
            <p class="font-bold">{{ __('employee created!') }}</p>
            @elseif (session('status') == 'employee-updated')
            <p class="font-bold">{{ __('employee updated!') }}</p>
            @elseif (session('status') == 'employee-deleted')
            <p class="font-bold">{{ __('employee deleted!') }}</p>
            @endif
        </div>
           
        @endif
        <livewire:filter-employees />
    </div>
</x-app-layout>
