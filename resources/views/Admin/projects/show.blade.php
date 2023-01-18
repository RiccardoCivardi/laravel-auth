@extends('layouts.admin')

@section('title')

    | Projects - Show

@endsection

@section('content')

    <div class="container-fluid h-100 overflow-auto">

        <div class="mb-3 d-flex align-items-center">

            <h1 class="d-inline me-3">DETTAGLIO PROGETTO {{$project->id}}: {{$project->name}}</h1>
            <a class="btn btn-outline-warning btn-sm" href="{{route('admin.projects.edit', $project)}}" title="edit"><i class="fa-solid fa-pen"></i></a>

        </div>

        <h6>Data di creazione: {{$project->created_at}}</h6>
        <h6 class="mb-5">Data ultima modifica: {{$project->updated_at}}</h6>

        <h3>CLIENTE: {{$project->client_name}}</h3>
        <p>DESCRIZIONE PROGETTO: {{$project->summary}}</p>
        <div class="image">
            <img src="{{$project->cover_image}}" alt="">
        </div>


        <a class="btn btn-outline-dark" href="{{route('admin.projects.index')}}">TORNA AI PROGETTI</a>

    </div>

@endsection
