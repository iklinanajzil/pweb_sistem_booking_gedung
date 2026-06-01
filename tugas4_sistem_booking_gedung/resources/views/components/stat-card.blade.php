@props(['label', 'value', 'colorClass' => 'blue'])

<div class="stat-box {{ $colorClass }}">
    {{ $label }}: <strong>{{ $value }}</strong>
</div>
