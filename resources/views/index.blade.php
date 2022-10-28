@extends('layouts.layout')

@section('main')
<div class="columns">
    <div class="column is-3 filter">
        <x-filter>
        </x-filter>
    </div>
    <div class="column">
        <x-cards-wrapper>
        </x-cards-wrapper>
    </div>
</div>
@endsection