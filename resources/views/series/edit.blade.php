<x-layout title="Editar Série {{ $series->name }}">
    <x-series.form :action="route('series.update', $series->id)" :name="$series->name"/>
</x-layout>
