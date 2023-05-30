@extends('front.layouts.main')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <a href="{{ url('mata-kuliah/detail') }}" class="card-link">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Mata Kuliah 1</h5>
                        <p class="card-text">Hari: Senin</p>
                        <p class="card-text">Jam: 08:00 - 10:00</p>
                        <p class="card-text">Ruangan: A101</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="{{ url('mata-kuliah/detail') }}" class="card-link">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Mata Kuliah 2</h5>
                        <p class="card-text">Hari: Rabu</p>
                        <p class="card-text card-info">Jam: 13:00 - 15:00</p>
                        <p class="card-text card-info">Ruangan: B202</p>
                    </div>
                </div>
            </a>
        </div>
        <!-- Tambahkan card mata kuliah lainnya di sini -->
    </div>
@endsection
