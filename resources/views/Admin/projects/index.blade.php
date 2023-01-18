@extends('layouts.admin')

@section('title')

    | Projects - Index

@endsection

@section('content')

    <div class="container-fluid h-100 overflow-auto">

        <h1>PROGETTI</h1>

        <table class="table table-dark table-striped">
            <thead>

                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NOME PROGETTO</th>
                    <th scope="col">AZIONI</th>
                </tr>

            </thead>

            <tbody>

                @forelse ($projects as $project)

                    <tr>
                        <td>{{$project->id}}</td>
                        <td>{{$project->name}}</td>
                        <td class="px-0">
                            <a class="btn btn-outline-primary btn-sm" href="{{route('admin.projects.show' , $project)}}" title="show"><i class="fa-solid fa-eye"></i></a>

                            <a class="btn btn-outline-warning btn-sm" href="{{route('admin.projects.edit', $project)}}" title="edit"><i class="fa-solid fa-pen"></i></a>

                            @include('admin.partials.form-delete', ['project'=>$project])

                        </td>
                    </tr>

                @empty

                    <h3>Non ci sono progetti</h3>

                @endforelse

            </tbody>
          </table>
          {{$projects->links()}}

    </div>

@endsection
