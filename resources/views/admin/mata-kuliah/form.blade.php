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
                            <form class="form form-horizontal">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="nim">NIM</label>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input type="text" id="nim" class="form-control"
                                                name="nim" placeholder="NIM" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="nama">Nama</label>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input type="text" id="nama" class="form-control"
                                                name="nama" placeholder="Nama" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input type="date" id="tanggal_lahir" class="form-control"
                                                name="tanggal_lahir" placeholder="Tanggal Lahir" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="email">Email</label>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input type="email" id="email" class="form-control"
                                                name="email" placeholder="Email" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="password">Password</label>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input type="password" id="password" class="form-control"
                                                name="password" placeholder="Password" />
                                        </div>
                                    </div>
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
