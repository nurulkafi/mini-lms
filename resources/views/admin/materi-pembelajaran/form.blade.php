@extends('layouts.main')
@section('materi-pembelajaran', 'active')
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Materi Pembelajaran</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" method="POST"
                                action="{{ url('admin/materi-pembelajaran/proses-tambah-data') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="pertemuan">Pertemuan Ke</label>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <select name="pertemuan" id="pertemuan" required class="choices form-select">
                                                <option value="">PICK ONE</option>
                                                <option value="1">Pertemuan Ke-1</option>
                                                <option value="2">Pertemuan Ke-2</option>
                                                <option value="3">Pertemuan Ke-3</option>
                                                <option value="4">Pertemuan Ke-4</option>
                                                <option value="5">Pertemuan Ke-5</option>
                                                <option value="6">Pertemuan Ke-6</option>
                                                <option value="7">Pertemuan Ke-7</option>
                                                <option value="8">Pertemuan Ke-8</option>
                                                <option value="9">Pertemuan Ke-9</option>
                                                <option value="10">Pertemuan Ke-10</option>
                                                <option value="11">Pertemuan Ke-11</option>
                                                <option value="12">Pertemuan Ke-12</option>
                                                <option value="13">Pertemuan Ke-13</option>
                                                <option value="14">Pertemuan Ke-14</option>
                                                <option value="15">Pertemuan Ke-15</option>
                                                <option value="16">Pertemuan Ke-16</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="mata-kuliah">Mata Kuliah</label>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <select name="mata_kuliah" id="mata-kuliah" required
                                                class="form-select choices">
                                                <option value="">PICK ONE</option>
                                                @foreach ($matkul as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama_mata_kuliah }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="jenis-materi">Jenis Materi</label>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input type="radio" name="jenis_materi" id="jenis-materi1"
                                                class="form-check-input" value="1">
                                            <label class="form-check-label" for="jenis_materi1">
                                                Kuis
                                            </label>
                                            <input type="radio" name="jenis_materi" id="jenis-materi2"
                                                class="form-check-input" value="2">
                                            <label class="form-check-label" for="jenis_materi2">
                                                Materi
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="deskripsi">Deskripsi</label>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="mata-kuliah">File Upload (Opsional)</label>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input type="file" class="multiple-files-filepond" name="file[]" multiple />
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
