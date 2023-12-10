<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Companies') }}
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
            @if (session('status') == 'company-created')
            <p class="font-bold">{{ __('Company created!') }}</p>
            @elseif (session('status') == 'company-updated')
            <p class="font-bold">{{ __('Company updated!') }}</p>
            @elseif (session('status') == 'company-deleted')
            <p class="font-bold">{{ __('Company deleted!') }}</p>
            @endif
        </div>
           
        @endif
        <livewire:filter-companies />
    </div>
</x-app-layout>
