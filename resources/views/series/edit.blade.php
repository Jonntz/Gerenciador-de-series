<x-layout title="Editar serie: {{!! $serie->name !!}}">
    <x-series.form class="form" :action="route('series.update', $serie->id)" :name="$serie->name" :update="true"/>
</x-layout>