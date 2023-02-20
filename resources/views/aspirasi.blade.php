@extends('layouts.main')
@section('container')

<section id="input" style="height: auto;">
    <div class="row d-flex  justify-content-center">
        <div class="col-12 my-4 bg-light px-5 py-3 rounded">
            <a class="navbar-brand fw-bold text-primary fs-3" href="/aspirasi">Input Pengaduan</a>
        </div>
        <div class="col-sm-12 col-md-8 col-lg-6">
            @if (request('id') != null)
            <div class="alert mt-3 alert-warning alert-dismissible fade show" role="alert">
                <strong>Terimakasih Telah Melakukan Pengaduan <br>
                    Nomor Pengaduan : {{ request('id') }}</strong><br>
                <small class="">Silahkan Di Ingat Nomor pengaduannya!!</small>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
          
            @endif
            @if (request('nik') != null)
            <div class="alert mt-3 alert-danger alert-dismissible fade show" role="alert">
               <strong> NIK Anda Belum Terdaftar!! </strong><br>
               <small>Silahkan Isi Datanya Kembali Dengan Benar</small>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
          
            @endif
            <div class="card mb-5 shadow">
                <div class="card-body p-5">
                    <form action="/aspirasi/store" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold">ID Pelapor</label>
                            <input type="text" name="id" class="form-control bg-primary text-light fw-bold" readonly
                                value="{{ $no }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nomor Induk Kependudukan</label>
                            <input type="number" name="nik" value="{{ old('nik') }}"
                                class="form-control @error('nik') is-invalid @enderror">
                            @error('nik')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Kategori</label>
                            <div class=" container row d-flex justify-content-center">
                                <div class="col-12 bg-warning rounded-4 bg-gradient p-3">
                                    <div class="row ">
                                        @foreach ($kategori as $kat)
                                        <div class="col-sm-12 col-lg-4 col-md-12 ">
                                            <input class="form-check-input" value="{{ $kat->id }}" type="radio"
                                                name="kategori_id" id="id_kategori1">
                                            <label class="form-check-label" for="id_kategori1">
                                                {{ $kat->ket_kategori }}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Lokasi</label>
                            <input type="text" name="lokasi" value="{{ old('lokasi') }}"
                                class="form-control  @error('lokasi') is-invalid @enderror">
                            @error('lokasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Keterangan</label>
                            <textarea name="ket" id="" value="{{ old('ket') }}"
                                class="form-control @error('ket') is-invalid @enderror" rows="2"></textarea>
                            @error('ket')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label fw-bold">Upload Gambar</label>
                            <input class="form-control @error('ket') is-invalid @enderror" type="file" id="image" name="image">
                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                          </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
          
            </div>
        </div>
    </div>
</section>

<section id="aspirasi" class="justify-content-center" style="height: auto;">
    <div class="row justify-content-center">
        <div class="col-12 my-4 bg-light px-5 py-3 rounded">
            <a class="navbar-brand fw-bold text-primary fs-3" href="/aspirasi">Lihat Pengaduan</a>
        </div>
        @if (request('search') == null)
        <div class="col-8 pb-3">
            <form action="/#aspirasi" class="" method="get">
                <label class="form-label fw-bold">Nomor Pengaduan</label>
                <div class="input-group">
                    <input type="text" required name="search" value="{{ request('search') }}"
                        class="form-control" placeholder="Masukkan Nomor Pengaduan"
                        aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i
                            class="bi bi-search"></i></button>
                </div>
            </form>
        </div>
        @endif
        @if (request('search') != null)
        <div class="col-4 pb-3">
            <form action="/#aspirasi" class="" method="get">
                <label class="form-label fw-bold">Nomor Pengaduan</label>
                <div class="input-group">
                    <input type="text" required name="search" value="{{ request('search') }}"
                        class="form-control" placeholder="Masukkan Nomor Pengaduan"
                        aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i
                            class="bi bi-search"></i></button>
                </div>
            </form>
        </div>
        @endif
        <div class="col-8"> 
            @if (request('search') != null)
            <div class="card text-center">
                @foreach ($aspirasi as $as)
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="nomor bg-danger p-2 rounded text-light"><span class="fw-bold">Nomor Pengaduan : </span>{{ $as->id }}</div>
                    </div>
                </div>
                <div class="card-body shadow">
                    <div class="d-flex justify-content-center mb-3">
                        <div class="gambar mx-3 {{ ($as->input_aspirasi->image === null ? 'd-none' : 'd-block' )}}">
                                <img src="{{ asset('storage/'. $as->input_aspirasi->image) }}" alt="" width="200px" class="rounded">
                        </div>
                        <div class="keterangan mx-3">
                            <div class="d-flex border-bottom mb-2">
                                <p class="fw-bold p-0 m-0 me-2">Kategori : </p>
                                <p class="p-0 m-0 text-danger fw-bold">{{ $as->kategori->ket_kategori }}</p>
                            </div>
                            <div class="d-flex border-bottom mb-2">
                                <p class="fw-bold p-0 m-0 me-2">Status : </p>
                                <p class="p-0 m-0">{{ $as->status }}</p>
                            </div>
                            <div class="d-flex border-bottom mb-2">
                                <p class="fw-bold p-0 m-0 me-2">Alamat : </p>
                                <p class="p-0 m-0">{{ $as->input_aspirasi->lokasi }}</p>
                            </div>
                            <div class="d-flex border-bottom mb-2">
                                <p class="fw-bold p-0 m-0 me-2">Keterangan : </p>
                                <p class="p-0 m-0">{{ $as->input_aspirasi->ket }}</p>
                            </div>
                            @if ($as['feedback'] != null)
                            <div class="d-flex border-bottom mb-2">
                                <p class="fw-bold p-0 m-0 me-2">Feedback : </p>
                                <p class="p-0 m-0">{{ $as->feedback }}</p>
                            </div>
                            @endif
                        </div>
                    </div>
                    @if ($as['status'] == 'Selesai' and $as['feedback'] == null)
                            <form action="/aspirasi/feedback" method="POST" class=" p-2  rounded-2 text-center">
                                @csrf
                                <input type="hidden" name="id_aspirasi" value="{{ $as->id  }}">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="radio" class="btn btn-outline-danger" required name="feedback" value="1" >1</button>
                                    <button type="radio" class="btn btn-outline-danger" name="feedback" required value="2">2</button>
                                    <button type="radio" class="btn btn-outline-primary" name="feedback" required value="3">3</button>
                                    <button type="radio" class="btn btn-outline-primary" name="feedback" required value="4">4</button>
                                    <button type="radio" class="btn btn-outline-success" name="feedback" required value="5">5</button>
                                </div>
                            </form>
                            @endif
                </div>
                <div class="card-footer text-muted">
                    {{ $as->input_aspirasi->created_at }}
                </div>
            </div>
            @endforeach
            @else
            @endif
        </div>
    </div>
</section>
@endsection