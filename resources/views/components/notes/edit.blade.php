@extends("components.app")
@section("stylecss")
    @livewireStyles()
@endsection
@section("content")
    @livewire("note.edit",["titre"=>"Formulaire d'edition","data"=>$data])
@endsection

@section("styleJs")
    @livewireScripts()
@endsection