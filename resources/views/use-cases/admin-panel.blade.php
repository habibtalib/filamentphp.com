@php
    seo()
    ->title('Filament - Panel Admin Laravel')
    ->description('Panel admin yang dibina dengan Laravel dan Livewire.');
@endphp

<x-layouts.app>
    <x-use-cases.admin-panel.introduction />
    <x-use-cases.admin-panel.downloads />
    <x-use-cases.admin-panel.components />
    <x-use-cases.admin-panel.plugins
        :$plugins
        :$pluginStars
    />
    <x-use-cases.admin-panel.saas-scaling />
    <x-use-cases.admin-panel.pricing />
    <x-sunset>
        <x-slot name="button">{{ __('ui.build_laravel_admin_panel') }}</x-slot>
    </x-sunset>
</x-layouts.app>
