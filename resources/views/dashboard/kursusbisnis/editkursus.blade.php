@extends('dashboard.layouts.maindash')

@section('container')

@if(session()->has('addSuccess'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session("addSuccess")}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Konten Kursus Bisnis</h1>
</div>

 <!-- General Form Elements -->
 <form action ="/editkursus/update/{{$kursusbisnis->id}}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="row mb-3">
                        <label for="tema" class="form-label">Tema</label>
                        <div class="col-sm-10">
                        <input type="text" name="tema" class="form-control @error('tema') is-invalid @enderror" id = "tema" autofocus required value="{{ $kursusbisnis->tema }}">
                            @error('tema')
                              <div class= "invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="title" class="form-label">Judul</label>
                        <div class="col-sm-10">
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id = "title" autofocus required value="{{ $kursusbisnis->title }}">
                            @error('title')
                              <div class= "invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="isi" class="form-label">Deskripsi</label>
                        <div class="col-sm-10">
                        <textarea input type="text" name="isi" class="form-control  @error('isi') is-invalid @enderror " id="isi" rows="5">{{$kursusbisnis->isi}}></textarea>
                            @error('isi')
                              <div class= "invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                        </div>
                    </div>
       
                    <div class="row mb-3">
                        <label for="tanggaldaftar" class="form-label">Mulai Pendaftaran</label>
                        <div class="col-sm-10">
                        <input type="text" name="tanggaldaftar" class="form-control @error('tanggaldaftar') is-invalid @enderror" id = "tanggaldaftar" autofocus required value="{{ $kursusbisnis->tanggaldaftar }}">
                            @error('tanggaldaftar')
                              <div class= "invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="tanggaltutup" class="form-label">Akhir Pendaftaran</label>
                        <div class="col-sm-10">
                        <input type="text" name="tanggaltutup" class="form-control @error('tanggaltutup') is-invalid @enderror" id = "tanggaltutup" autofocus required value="{{ $kursusbisnis->tanggaltutup }}">
                            @error('tanggaltutup')
                              <div class= "invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="tanggalmulai" class="form-label">Pelaksanaan Kelas</label>
                        <div class="col-sm-10">
                        <input type="text" name="tanggalmulai" class="form-control @error('tanggalmulai') is-invalid @enderror" id = "tanggalmulai" autofocus required value="{{ $kursusbisnis->tanggalmulai }}">
                            @error('tanggalmulai')
                              <div class= "invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="durasi" class="form-label">Durasi Program</label>
                        <div class="col-sm-10">
                        <input type="text" name="durasi" class="form-control @error('durasi') is-invalid @enderror" id = "durasi" autofocus required value="{{ $kursusbisnis->durasi }}">
                            @error('durasi')
                              <div class= "invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="kelaslive" class="form-label">Sesi Kelas Live</label>
                        <div class="col-sm-10">
                        <input type="text" name="kelaslive" class="form-control @error('kelaslive') is-invalid @enderror" id = "kelaslive" autofocus required value="{{ $kursusbisnis->kelaslive }}">
                            @error('kelaslive')
                              <div class= "invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <div class="col-sm-10">
                        <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror" id = "harga" autofocus required value="{{ $kursusbisnis->harga }}">
                            @error('harga')
                              <div class= "invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="link" class="form-label">Link</label>
                        <div class="col-sm-10">
                        <input type="text" name="link" class="form-control @error('link') is-invalid @enderror" id = "link" autofocus required value="{{ $kursusbisnis->link }}">
                            @error('harga')
                              <div class= "invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                        <div class="col-sm-10">
                          <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" id = "foto"
                          name="foto" onchange="previewImage()">
                          @error('foto')
                            <div class= "invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                    </div>

                        <div class="row mb-3">
                          <div class="col-sm-10">
                              <input type="hidden"required value="{{$kursusbisnis->id}}">
                              <button type="submit" class="btn btn-primary">Perbarui</button>
                          </div>
                        </div>
                    </div>
                </form><!-- End General Form Elements -->
@endsection