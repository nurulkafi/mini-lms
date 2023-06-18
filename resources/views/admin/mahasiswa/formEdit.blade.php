@extends('layouts.main')
@section('mahasiswa', 'active')
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Mahasiswa</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form data-parsley-validate action="{{ url('admin/mahasiswa/proses-edit-data/'.$data->id) }}" class="form form-horizontal"
                                method="POST">
                                @csrf
                                <div class="form-body">
                                    {{-- <div class="row">
                                        <div class="col-md-2">
                                            <label for="nim">NIM</label>
                                        </div>
                                        <div class="col-md-6 form-group mandatory">
                                            <input type="text" value="{{ $data->nim }}" data-parsley-required="true" id="nim" class="form-control" name="nim"
                                                placeholder="NIM" />
                                        </div>
                                    </div> --}}
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="nama">Nama</label>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input type="text" value="{{ $data->nama }}" data-parsley-required="true" id="nama" class="form-control" name="nama"
                                                placeholder="Nama" />
                                            @error('nama')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="tgl_lahir">Tanggal Lahir</label>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input type="date" value="{{ $data->tanggal_lahir }}" data-parsley-required="true" id="tgl_lahir" class="form-control" name="tgl_lahir"
                                                placeholder="Tanggal Lahir" />
                                        </div>
                                    </div>
                                    {{-- <div class="row">
                                        <div class="col-md-2">
                                            <label for="email">Email</label>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input type="email" data-parsley-required="true" id="email" class="form-control" name="email"
                                                placeholder="Email" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="password">Password</label>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input type="password" data-parsley-required="true" id="password" class="form-control" name="password"
                                                placeholder="Password" />
                                        </div>
                                    </div> --}}
                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">
                                            Submit
                                        </button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                            Reset
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
