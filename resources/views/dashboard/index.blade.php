@extends('dashboard.layouts.maindash')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
    <h1 class="h5"> Welcome Back, {{ session("LoggedAdmin")->Username }}</h1>
</div>
<div class="row">
    <div class="col-md-25">
        <div class="Konten">
          <div class="jumlahkonten">
          <body>
              <div class="container-xl">
                <div class="table">
                  <div class="table-wrapper">
                    <div class="table-title">
                      <div class="row">
                        <div class="col-sm-10"><h2>Edukasi Bisnis </h2></div>
                          
                        <div class="col-sm-2">
                          <a href="/dashboard/postsedukasi"><button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button></a>
                        </div>
                      </div>
                    </div>
                    <table class="table table-striped table-hover table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Judul</th>
                          <th>Penulis</th>
                          <th>Tanggal Publikasi</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ( $edubisnis as $edudetail )
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$edudetail->title}}</td>
                          <td>{{$edudetail->author}}</td>
                          <td>{{$edudetail->publish_at}}</td>
                          <td>
                            <a href="/editedukasi/{{$edudetail->id}}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="/deleteedukasi/{{$edudetail->id}}" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                          </td>
                        </tr>
                      @endforeach
                      
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </body>
          </div>
        </div>
    </div>
    <div class="col-md-25">
        <div class="Konten">
          <div class="jumlahkonten">
          </div>
        </div>
    </div>

    
    <div class="col-md-25">
        <div class="Konten">
          <div class="jumlahkonten">
          <body>
              <div class="container-xl">
                <div class="table">
                  <div class="table-wrapper">
                    <div class="table-title">
                      <div class="row">
                        <div class="col-sm-10"><h2>Kursus Bisnis </h2></div>
                        <div class="col-sm-2">
                          <a href="/dashboard/postskursus"><button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button></a>
                        </div>
                      </div>
                    </div>
                    <table class="table table-striped table-hover table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Judul</th>
                          <th>Tanggal Pendaftaran</th>
                          <th>Tanggal Penutupan</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ( $kursusbisnis as $kursusdetail )
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$kursusdetail->title}}</td>
                          <td>{{$kursusdetail->tanggaldaftar}}</td>
                          <td>{{$kursusdetail->tanggaltutup}}</td>
                          <td>
                            <a href="/editkursus/{{$kursusdetail->id}}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="/deletekursus/{{$kursusdetail->id}}" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                          </td>
                        </tr>
                      @endforeach
                      
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </body>
          </div>
        </div>
    </div>
    <div class="col-md-25">
        <div class="Konten">
          <div class="jumlahkonten">
          </div>
        </div>
</div>
</div>
@endsection