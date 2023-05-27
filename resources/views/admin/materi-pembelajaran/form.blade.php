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
                            <form class="form form-horizontal">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="pertemuan">Pertemuan Ke</label>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <select name="pertemuan" id="pertemuan" class="form-select">
                                                <option value="">Pertemuan Ke-1</option>
                                                <option value="">Pertemuan Ke-2</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="mata-kuliah">Mata Kuliah</label>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <select name="mata-kuliah" id="mata-kuliah" class="form-select">
                                                <option value="">Bahasa Inggris</option>
                                                <option value="">Bahasa Sunda</option>
                                            </select>
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
                                            <input type="file" class="multiple-files-filepond" multiple />
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
