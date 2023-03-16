@extends('dashboard.layouts.maindash')
@section('container')

  @if(session()->has('updateprofilsuccess'))
    <div class="alert alert-success col-lg-13" role="alert">
      {{ session('updateprofilsuccess') }}
    </div>
  @endif

  @if(session()->has('updateprofilfail'))
    <div class="alert alert-danger col-lg-13" role="alert">
      {{ session('updateprofilfail') }}
    </div>
  @endif
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Profil</h1>
</div>
    <!-- Profile Edit Form -->
        <form action="/dashboard/updateprofile" method="post">
            @csrf
                    <div class="row mb-3">
                      <label for="name" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id = "name" required value="{{ $admin->Name  }}">
                        @error('name')
                        <div class= "invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="username" class="col-md-4 col-lg-3 col-form-label">Username</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id = "username" required value="{{ $admin->Username  }}">
                        @error('username')
                        <div class= "invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="email" class="col-md-4 col-lg-3 col-form-label">E-mail</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id = "email" required value="{{ $admin->Email  }}">
                        <input type="hidden" name="id_user" value="{{ $admin->id  }}">
                        @error('email')
                        <div class= "invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </form><!-- End Profile Edit Form -->
                </div>
              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>
  @endsection()