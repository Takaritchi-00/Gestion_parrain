@extends('layouts.admin1')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Liste des Programmes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Liste</li>
                        <li class="breadcrumb-item"><a href="{{route('programmes.create')}}">Ajouter</a></li>
                        <li class="breadcrumb-item active">Programmes</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                        <h3 class="card-title">Un peuple, Un but, Une foi <img src="../../dist/img/favicon-s.png" class="img-circle elevation-2" alt="User Image"></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- content -->
                            <div class="container mt-3">
                                @if(session('success'))
                                <div class="alert alert-success mt-3">
                                    {{session('success')}}
                                </div>
                                @endif
                                <div class="card">
                                    <div class="card-header">Liste des Programmes</div>
                                    <div class="card-body">
                                        <table class="table">
                                            <tr>
                                                <th>#</th>
                                                <th>Titre</th>
                                                <th>Contenu</th>
                                                <th>Document</th>
                                                <th>Candidat</th>
                                                <th>Secteur</th>
                                                <th>Action</th>
                                            </tr>
                                            @foreach ($programme as $prog)
                                            <tr>
                                                <td>{{$prog->id}}</td>
                                                <td>{{$prog->titre}}</td>
                                                <td>{{$prog->contenu}}</td>
                                                <td><a href="{{asset('downloads/'.$prog->document)}}" download>{{$prog->document}}</a></td>
                                                <td>
                                                    {{$prog->candidat->nom}} {{$prog->candidat->prenom}}
                                                </td>
                                                <td>
                                                    {{$prog->secteurs->libelle}}
                                                </td>
                                                
                                                <td>
                                                    <a href="{{route('programmes.edit', $prog->id)}}" class="btn btn-warning ms-3">Editer</a>
                                                    <form action="{{route('programmes.destroy',$prog->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button onclick="return confirm('Voulez-vous vraiment supprimer le programme?')" href="{{route('programmes.destroy',$prog->id)}}" type="submit" class="btn btn-danger mt-3">Supprimer</button>
                                                    </form>
                                                    <!-- <a onclick="return confirm('Voulez-vous vraiment supprimer le programme?')" href="{{route('programmes.destroy',$prog->id)}}" class="btn btn-danger">Supprimer</a> -->
                                                </td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                        Election Présidentielle
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection