@extends('layouts.admin1')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Liste des Candidats</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Liste</li>
                        <li class="breadcrumb-item"><a href="{{route('candidats.create')}}">Ajouter</a></li>
                        <li class="breadcrumb-item active">Candidats</li>
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
                                    <div class="card-header">Liste des Candidats</div>
                                    <div class="card-body">
                                        <div class="table-responsive small">
                                            <table class="table table-striped table-sm">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Photo</th>
                                                        <th scope="col">Nom</th>
                                                        <th scope="col">Prenom</th>
                                                        <th scope="col">Parti</th>
                                                        <th scope="col">Biographie</th>
                                                        <th scope="col">Validation</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($candidat as $cand)
                                                    <tr>
                                                        <td>{{$cand->id}}</td>
                                                        <td><img src="/downloads/{{$cand->photo}}" alt="" width="100"></td>
                                                        <td>{{$cand->nom}}</td>
                                                        <td>{{$cand->prenom}}</td>
                                                        <td>{{$cand->parti}}</td>
                                                        <td>{{$cand->Biographie}}</td>
                                                        <td>{{$cand->Validate}}</td>
                                                        <td>
                                                            <a href="{{route('candidats.edit', $cand->id)}}" class="btn btn-warning ms-3">Editer</a>
                                                            <form action="{{route('candidats.destroy',$cand->id)}}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button onclick="return confirm('Voulez-vous vraiment supprimer le candidat?')" href="{{route('candidats.destroy',$cand->id)}}" type="submit" class="btn btn-danger mt-3">Supprimer</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- <table id="candidats_table" class="table">
                                            <tr>
                                                <th>#</th>
                                                <th>Photo</th>
                                                <th>Nom</th>
                                                <th>Prénom</th>
                                                <th>Parti</th>
                                                <th>Biographie</th>
                                                <th>Validation</th>
                                                <th>Action</th>
                                            </tr> -->
                                        <!-- @foreach ($candidat as $cand)
                                            <tr>
                                                <td>{{$cand->id}}</td>
                                                <td><img src="/downloads/{{$cand->photo}}" alt="" width="100"></td>
                                                <td>{{$cand->nom}}</td>
                                                <td>{{$cand->prenom}}</td>
                                                <td>{{$cand->parti}}</td>
                                                <td>{{$cand->Biographie}}</td>
                                                <td>{{$cand->Validate}}</td>
                                                <td>
                                                    <a href="{{route('candidats.edit', $cand->id)}}" class="btn btn-warning ms-3">Editer</a>
                                                    <form action="{{route('candidats.destroy',$cand->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button onclick="return confirm('Voulez-vous vraiment supprimer le candidat?')" href="{{route('candidats.destroy',$cand->id)}}" type="submit" class="btn btn-danger mt-3">Supprimer</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach -->
                                        <!-- </table> -->
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
<script>
    $(document).ready(function() {
        $('#candidats_table').dataTable({
            "serverSide": true,
            "responsive": true,
            "ajax": "{{route('candidats.data')}}"
        });
    });
</script>
@endsection