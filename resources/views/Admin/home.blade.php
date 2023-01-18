@extends('layouts.admin')

@section('title')

    | Admin

@endsection

@section('content')

    <div class="container-fluid h-100 overflow-auto">

        <h1>Questa è la Home della dashboard di {{Auth::user()->name}}</h1>
        <h5>L'email è {{Auth::user()->email}}</h5>
        <h5>L'account è stato creato il: {{Auth::user()->created_at}}</h5>

    </div>

@endsection
