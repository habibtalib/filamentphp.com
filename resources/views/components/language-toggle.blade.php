@php
    $currentLocale = app()->getLocale();
    $otherLocale = $currentLocale === 'en' ? 'ms' : 'en';
    $otherLocaleName = $otherLocale === 'en' ? 'EN' : 'MS';
@endphp

<a
    href="{{ request()->fullUrlWithQuery(['locale' => $otherLocale]) }}"
    class="text-sm font-medium text-evening opacity-80 transition duration-300 hover:opacity-100 focus:text-butter motion-reduce:transition-none"
    title="Switch to {{ $otherLocaleName }}"
>
    {{ $otherLocaleName }}
</a>