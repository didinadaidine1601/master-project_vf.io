@extends('components.app')
@section('stylecss')
    @livewireStyles()
@endsection
@section('content')
    @livewire('note.forme-add', ['titre' => "Formulaire d'ajout de notes"])
@endsection

@section('styleJs')
    @livewireScripts()
@endsection
