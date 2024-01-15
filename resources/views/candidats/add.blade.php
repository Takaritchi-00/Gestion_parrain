@extends('layouts.admin1')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Ajouter Candidat</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('candidats.index')}}">Liste</a></li>
            <li class="breadcrumb-item active">Ajouter</li>
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
              <div class="container">
                @if(session('success'))
                <div class="alert alert-success mt-3">
                  {{session('success')}}
                </div>
                @endif
                <div class="card">
                  <div class="card-header bg-info text-white">Ajouter un Candidat</div>
                  <div class="card-body">
                    <form action="{{route('candidats.store')}}" method="post" enctype="multipart/form-data">
                      @csrf

                      <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" id="" class="form-control">
                      </div>

                      <div class="form-group">
                        <label for="nom">Prénom</label>
                        <input type="text" name="prenom" id="" class="form-control">
                      </div>

                      <div class="form-group">
                        <label for="parti">Parti</label>
                        <input type="text" name="parti" id="" class="form-control">
                      </div>

                      <div class="form-group">
                        <label for="Biographie">Biographie</label>
                        <textarea name="Biographie" id="" cols="5" rows="5" class="form-control"></textarea>
                      </div>

                      <div class="form-group">
                        <label for="Validate">Validation Candidature</label>
                        <div class="form-check form-switch">
                          <input class="form-check-input" type="radio" name="Validate" role="switch" value="1">
                          <label class="form-check-label" for="Validate">Accepter</label>
                        </div>

                        <div class="form-check form-switch">
                          <input class="form-check-input" type="radio" name="Validate" role="switch" value="0">
                          <label class="form-check-label" for="Validate">Refuser</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="photo">Photo Candidat : </label>
                        <!-- <input type="text" name="photo" required class="form-control"> -->
                        <input type="file" class="form-control" accept=".jpeg, .jpg, .png" id="" name="photo">
                      </div> <br>

                      <div class="form-group">
                        <button class="btn btn-success">Enregistrer</button>
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