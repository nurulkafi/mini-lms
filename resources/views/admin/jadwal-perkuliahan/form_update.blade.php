@extends('layouts.main')
@section('jadwal-perkuliahan', 'active')
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Edit Jadwal Perkuliahan</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" method="post"
                                action="{{ url('admin/jadwal-perkuliahan/proses-update-data/' . $data->id) }}">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="mata-kuliah">Mata Kuliah</label>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <select name="mata_kuliah" id="mata-kuliah" class="form-select">
                                                <option value="{{ $data->mata_kuliah_id }}">
                                                    {{ $data->matkul->nama_mata_kuliah }}</option>
                                                @foreach ($matkul as $item)
                                                    @if ($data->mata_kuliah_id != $item->id)
                                                        <option value="{{ $item->id }}">{{ $item->nama_mata_kuliah }}
                                                        </option>
                                                    @endif
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
                                                <option value="{{ $data->hari }}">{{ $data->hari }}</option>
                                                <?php
                                                $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
                                                $hari_terpilih = $data->hari;
                                                foreach ($hari as $option) {
                                                    if ($option != $hari_terpilih) {
                                                        echo '<option value="' . $option . '">' . $option . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="pertemuan">Jam Mulai</label>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input type="time" name="jam_mulai" value="{{ $data->jam_mulai }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="pertemuan">Jam Selesai</label>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input type="time" name="jam_selesai" value="{{ $data->jam_selesai }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="ruangan">Ruangan</label>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input type="text" name="ruangan" value="{{ $data->ruangan }}"
                                                class="form-control">
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
