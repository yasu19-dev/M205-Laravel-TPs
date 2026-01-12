@props(['status' => 'inactive'])

@php
   $classes = match($status) {
      'active' => 'bg-success',
      'blocked' => 'bg-danger',
      default => 'bg-secondary'
   };
@endphp

<span class="badge {{ $classes }}">
   {{ $slot }}
</span>
