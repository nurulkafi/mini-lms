@extends('front.layouts.main')
@section('content')
    <div class="card mb-3">
        <div class="card-content">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <h4 class="card-title mb-4">Mata Kuliah</h4>
                    </div>
                    <div class="col-md-9">
                        <h4 class="card-title mb-4">: {{ $jadwal->matkul->nama_mata_kuliah }}</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <h6>Hari</h6>
                    </div>
                    <div class="col-md-9">
                        <h6>: {{ $jadwal->hari }}</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <h6>Jam</h6>
                    </div>
                    <div class="col-md-9">
                        <h6>: {{ date('H:i', strtotime($jadwal->jam_mulai)) }} -
                            {{ date('H:i', strtotime($jadwal->jam_selesai)) }}</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <h6>Ruangan</h6>
                    </div>
                    <div class="col-md-9">
                        <h6>: {{ $jadwal->ruangan }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    use Carbon\Carbon;
    $hariIni = Carbon::now()->locale('id')->dayName;
    $jamSekarang = Carbon::now('Asia/Jakarta')->format('H:i:s');

    $hariIni;
    ?>
    @if ($jadwal->hari == $hariIni && $jadwal->jam_mulai <= $jamSekarang && $jadwal->jam_selesai >= $jamSekarang && $jadwal->checkAbsensi($jadwal->mata_kuliah_id) == 0)
        <div class="page-heading">
            <h3>Absensi</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="card-text">
                    Lakukan absensi <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">disini</button>
                </div>
            </div>
        </div>
    @endif




    <div class="page-heading">
        <h3>Daftar Pertemuan</h3>
    </div>
    {{-- <div class="card">
        <div class="card-body">
            <div class="card-text">
                1. Pertemuan Ke 1 : ABC
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="card-text">
                2. Pertemuan Ke 2 : ABC
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="card-text">
                3. Pertemuan Ke 3 : ABC
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="card-text">
                4. Pertemuan Ke 4 : ABC
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="card-text">
                5. Pertemuan Ke 5 : ABC
            </div>
        </div>
    </div> --}}
    <div class="col-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    @foreach ($materi as $item)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-heading-{{ $item->id }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapse-{{ $item->id }}" aria-expanded="false"
                                    aria-controls="flush-collapse-{{ $item->id }}">
                                    Pertemuan {{ $item->pertemuan }}
                                </button>
                            </h2>
                            <div id="flush-collapse-{{ $item->id }}" class="accordion-collapse collapse"
                                aria-labelledby="flush-heading-{{ $item->id }}"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    {{ $item->deskripsi }}
                                    @php
                                        $file = $item->file;
                                    @endphp
                                    @if (!empty($file))
                                        <div class="list-group mt-2">
                                            @foreach ($file as $item_file)
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center mb-2">
                                                    <a href="{{ asset('storage/uploads/' . $item_file->dir_file . '/' . $item_file->nama_file) }}"
                                                        target="blank" class="">{{ $item_file->nama_file }}</a>
                                                </li>
                                            @endforeach
                                        </div>
                                    @endif
                                    @if ($item->jenis_materi == 1)
                                        @if ($item->hitungNilai($item->id) != 0)
                                            <div class="badge bg-primary">Nilai Kuis :
                                                {{ number_format($item->hitungNilai($item->id), 2) }} / 100</div>
                                        @else
                                            <a target="_blank" href="{{ url('kuis/' . $item->id) }}"
                                                class="btn btn-primary mt-2 text-center">Kerjakan Kuis</a>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="{{ url('absensi/' . $jadwal->mata_kuliah_id) }}" method="post">
            @csrf
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Absensi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="Hadir" name="keterangan"
                                id="keterangan1">
                            <label class="form-check-label" for="keterangan1">
                                Hadir
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="Izin" name="keterangan"
                                id="keterangan2">
                            <label class="form-check-label" for="keterangan2">
                                Izin
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="Sakit" name="keterangan"
                                id="keterangan2">
                            <label class="form-check-label" for="keterangan2">
                                Sakit
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
