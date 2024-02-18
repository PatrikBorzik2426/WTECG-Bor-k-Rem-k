@props(['array'])

<!--
Uses default attributes and add any other class defined in where the component is called
-->
<h2 {{ $attributes->merge(['class' => 'text-xl font-semibold']) }}>
    {{ $array }}
    {{ $slot }}
</h2>
