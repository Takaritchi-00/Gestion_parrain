@extends('layouts.admin1')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Ajouter Secteur</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('secteurs.index')}}">Liste</a></li>
            <li class="breadcrumb-item active">Ajouter</li>
            <li class="breadcrumb-item active">Secteurs</li>
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
                  <div class="card-header bg-info text-white">Ajouter un Secteur</div>
                  <div class="card-body">
                    <form action="{{route('secteurs.store')}}" method="post">
                      @csrf
                      <div class="form-group">
                        <label for="nom">Libelle</label>
                        <input type="text" name="libelle" id="" class="form-control">
                      </div>

                      <!-- <div class="form-group">
                        <label for="couleur">Choisir une couleur :</label>
                        <select id="" name="couleur" class="form-select">
                          <option disabled="bg-secondary text-white">La couleur</option>
                          <option value="verte" class="bg-success text-white">Vert ~ L'Agriculture</option>
                          <option value="bleue" class="bg-primary text-white">Bleu ~ La Pêche</option>
                          <option value="rouge" class="bg-danger text-white">Rouge ~ L'Industrie</option>
                          <option value="jaune" class="bg-warning text-dark">Jaune ~ L'Education</option>
                         
                        </select>

                      </div> -->

                      <!-- <div class="form-group">
                        <label for="icon">Icon</label>
                        <input type="text" name="icon" id="" class="form-control">
                        
                      </div> -->

                      <br><br>
                      <div class="form-group">
                        <button type="submit" class="btn btn-success">Ajouter</button>
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