@extends('front.layouts.main')
@section('content')
    <div class="row">
        @foreach ($data as $item)
            <div class="col-md-6">
                <a href="{{ url('mata-kuliah/detail/'.$item->id) }}" class="card-link">
                    <div class="card mb-3">
                        <div class="card-content">
                            <div class="card-body">
                                <h4 class="card-title mb-4">{{ $item->matkul->nama_mata_kuliah }}</h4>
                                <div class="row">
                                    <div class="col-md-2">
                                        <h6>Hari</h6>
                                    </div>
                                    <div class="col-md-9">
                                        <h6>: {{ $item->hari }}</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <h6>Jam</h6>
                                    </div>
                                    <div class="col-md-9">
                                        <h6>: {{ date('H:i', strtotime($item->jam_mulai)) }} - {{ date('H:i', strtotime($item->jam_selesai)) }}</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <h6>Ruangan</h6>
                                    </div>
                                    <div class="col-md-9">
                                        <h6>: {{ $item->ruangan }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
