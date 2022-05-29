@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <livewire:employeer.employeer-post :checkAccount="$checkAccount" />
    </div>
@endsection
