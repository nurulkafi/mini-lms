@extends('layouts.main')
@section('jadwal-perkuliahan', 'active')
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Jadwal Perkuliahan</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" method="post" action="{{ url('admin/jadwal-perkuliahan/proses-tambah-data') }}">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="mata-kuliah">Mata Kuliah</label>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <select name="mata_kuliah" id="mata-kuliah" class="form-select">
                                                {{-- <option value="">Bahasa Inggris</option>
                                                <option value="">Bahasa Sunda</option> --}}
                                                @foreach ($matkul as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_mata_kuliah }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="hari_perkuliahan">Hari Perkuliahan</label>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <select name="hari_perkuliahan" id="hari_perkuliahan" class="form-select">
                                                <option value="Senin">Senin</option>
                                                <option value="Selesa">Selesa</option>
                                                <option value="Rabu">Rabu</option>
                                                <option value="Kamis">Kamis</option>
                                                <option value="Jum'at">Jum'at</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="pertemuan">Jam Mulai</label>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input type="time" name="jam_mulai" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="pertemuan">Jam Selesai</label>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input type="time" name="jam_selesai" class="form-control">
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
