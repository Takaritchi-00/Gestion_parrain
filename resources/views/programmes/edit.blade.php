@extends('layouts.admin1')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Modifier Programme</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('programmes.index')}}">Liste</a></li>
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
              <div class="container">
                @if(session('success'))
                <div class="alert alert-success mt-3">
                  {{session('success')}}
                </div>
                @endif
                <div class="card">
                  <div class="card-header bg-info text-white">Editer un Programme</div>
                  <div class="card-body">
                    <form action="{{route('programmes.update',$programme->id)}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')

                      <div class="form-group">
                        <select class="form-select" aria-label="Default select example" name="candidat_id">
                          <option selected>Choisir un Candidat</option>
                          @foreach($candidats as $cand)
                          <option value="{{$cand->id}}">{{$cand->nom}} {{$cand->prenom}}</option>
                          @endforeach
                        </select>
                      </div>
                      
                      <div class="form-group">
                        <select class="form-select" aria-label="Default select example" name="secteur_id">
                          <option selected>Choisir un Secteur</option>
                          @foreach($secteurs as $sec)
                          <option value="{{$sec->id}}">{{$sec->libelle}}</option>
                          @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="titre">Titre</label>
                        <input type="text" name="titre" id="" class="form-control" value="{{$programme->titre}}">
                      </div>

                      <div class="form-group">
                        <label for="contenu">Contenu</label>
                        <textarea name="contenu" id="" cols="5" rows="5" class="form-control">{{$programme->contenu}}</textarea>
                      </div>

                      <div class="form-group">
                        <label for="parti">Document</label>
                        <!-- <input type="text" name="document" id="" class="form-control" value="{{$programme->document}}"> -->
                        <input type="file" name="document" id="" class="form-control" accept=".pdf, .doc, .docx" value="{{$programme->document}}">
                      </div>

                      <br><br>
                      <div class="form-group">
                        <button type="submit" class="btn btn-success">Modifier</button>
                      </div>

                    </form>
                  </div>
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