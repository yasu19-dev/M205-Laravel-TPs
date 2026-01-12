<div>
    <button {{ $attributes->merge(['class' => 'btn btn-' . $type]) }}>
   {{ $slot }}
</button>

    <!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
</div>
