@extends('layouts.main')

@section('jadwal-perkuliahan', 'active')
@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Data Jadwal Perkuliahan</h5>
                <div class="float-end">
                    <a href="{{ url('admin/jadwal-perkuliahan/tambah-data') }}" class="btn btn-primary">Tambah Data</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Mata Kuliah</th>
                                <th>Hari</th>
                                <th>Jam</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Bahasa Inggris</td>
                                <td>Senen</td>
                                <td>07.00 - 09.00</td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                        data-bs-target="#formMataKuliahModal">Edit</button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#ModalHapus">Hapus</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal Form -->
    <div class="modal fade" id="formMataKuliahModal" tabindex="-1" aria-labelledby="formMataKuliahModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formMataKuliahModalLabel">Form Mata Kuliah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form form-horizontal">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="nama-mata-kuliah">Nama Mata Kuliah</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="text" id="nama-mata-kuliah" class="form-control" name="nama-mata-kuliah"
                                        placeholder="Nama Mata Kuliah" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Hapus-->
    <div class="modal fade" id="ModalHapus" tabindex="-1" aria-labelledby="ModalHapusLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger ">
                    <h5 class="modal-title text-white" id="ModalHapusLabel">Konfirmasi Hapus Data</h5>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah kamu yakin ingin menghapus data?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary">Ya</button>
                </div>
            </div>
        </div>
    </div>
@endsection
