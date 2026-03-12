@php
    $colors = [
        'success' => 'bg-success-50 text-success-300',
        'error'   => 'bg-danger-50 text-danger-300',
        'warning' => 'bg-warning-50 text-warning-300',
        'info'    => 'bg-primary-50 text-primary-300',
    ];
@endphp

@if (session()->has($type))
    <div
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, {{ $timeout }})"
        x-show="show"
        x-transition.opacity.duration.300ms
        class="mb-4 rounded-md px-4 py-2 text-center {{ $colors[$type] ?? $colors['info'] }}"
    >
        {{ session($type) }}
    </div>
@endif
