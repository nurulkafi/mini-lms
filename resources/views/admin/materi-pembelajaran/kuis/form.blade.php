@extends('layouts.main')
@section('materi-pembelajaran', 'active')
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                {{-- <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Informasi Mata Kuliah</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">

                        </div>
                    </div>
                </div> --}}
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Nama Mata Kuliah</h5>
                                <p class="card-text">{{ $matpem->matkul->nama_mata_kuliah }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Pertemuan</h5>
                                <p class="card-text">{{ $matpem->pertemuan }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Jenis Materi</h5>
                                <p class="card-text">{{ $matpem->jenis_materi == 1 ? 'Kuis' : 'Materi' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Deskripsi</h5>
                                <p class="card-text">{{ $matpem->deskripsi }}</p>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
            <div class="col-md-4 col-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Tambah Soal</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" method="POST"
                                action="{{ url('admin/kuis/proses-tambah-data/' . $id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="question">Pertanyaan:</label>
                                    <textarea class="form-control" name="question" id="question" rows="3"></textarea>
                                </div>

                                <h4>Pilihan Jawaban:</h4>

                                <div class="form-group">
                                    <label for="optionA">A:</label>
                                    <input type="text" name="optionA" class="form-control" id="optionA">
                                </div>

                                <div class="form-group">
                                    <label for="optionB">B:</label>
                                    <input type="text" name="optionB" class="form-control" id="optionB">
                                </div>

                                <div class="form-group">
                                    <label for="optionC">C:</label>
                                    <input type="text" name="optionC" class="form-control" id="optionC">
                                </div>

                                <div class="form-group">
                                    <label for="optionD">D:</label>
                                    <input type="text" name="optionD" class="form-control" id="optionD">
                                </div>

                                <div class="form-group">
                                    <label for="optionE">E:</label>
                                    <input type="text" name="optionE" class="form-control" id="optionE">
                                </div>

                                <div class="form-group">
                                    <label for="correctAnswer">Jawaban Benar:</label>
                                    <select class="form-control" name="correctAnswer" id="correctAnswer">
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        <option value="E">E</option>
                                    </select>
                                </div>

                                <br>

                                <button type="submit" class="btn btn-primary">Buat Soal</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-8">
                <div class="card">
                    <div class="card-header">
                        <h5>Daftar Soal</h5>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <table class="table table-border">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pertanyaan</th>
                                        <th>Pilihan Jawaban</th>
                                        <th>Jawaban</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($data as $item)
                                        <tr>
                                            <th>{{ $no++ }}</th>
                                            <th>{{ $item->Pertanyaan }}</th>
                                            <th>
                                                @foreach ($item->OpsiJawaban($item->id) as $opsi)
                                                    {{ $opsi->opsi }} . {{ $opsi->deskripsiJawaban }} <br>
                                                @endforeach
                                            </th>
                                            <th>
                                                {{ $item->JawabanBenar($item->id)->opsi }}
                                            </th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
