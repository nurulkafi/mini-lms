@extends('front.layouts.main')
@section('content')
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
    </div>
    @php
        $no = 1;
    @endphp
    @forelse ($data as $item)
        <form action="{{ url('kuis/submit_jawaban/' . $item->materi_pembelajaran_id) }}" method="post">
            @csrf
            <div class="card">
                <div class="card-body">
                    {{ $no++ }} . {{ $item->Pertanyaan }} . . .
                    <input type="hidden" name="pertanyaan{{ $item->id }}" value="{{ $item->id }}">
                    <br>
                    @foreach ($item->OpsiJawaban($item->id) as $opsi)
                        {{-- {{ $opsi->opsi }} . {{ $opsi->deskripsiJawaban }} <br> --}}
                        @php
                            $index = $item->id;
                        @endphp
                        <div class="form-check ms-3">
                            <input class="form-check-input" type="radio" name="jawaban{{ $index }}"
                                value="{{ $opsi->id }}" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                {{ $opsi->opsi }} . {{ $opsi->deskripsiJawaban }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        @empty
            <div class="card">
                <div class="card-body">
                    Soal Belum Di Buat!
                </div>
            </div>
    @endforelse
    @if (count($data) > 0)
        <div class="form-group text-end"><button type="submit" class="btn btn-primary">Kirim Jawaban</button></div>
        </form>
    @endif
@endsection
