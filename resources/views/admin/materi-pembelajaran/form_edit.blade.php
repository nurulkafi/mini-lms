@extends('layouts.main')
@section('materi-pembelajaran', 'active')
@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-8 col-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Materi Pembelajaran</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" method="POST"
                                action="{{ url('admin/materi-pembelajaran/proses-update-data/' . $data->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="mata-kuliah">Mata Kuliah</label>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <select name="mata_kuliah" id="mata-kuliah" required
                                                class="form-select choices matkul">
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
                                            <label for="pertemuan">Pertemuan Ke</label>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <select name="pertemuan" id="pertemuan" disabled required class="form-select">
                                                <option value="{{ $data->pertemuan }}">Pertemuan Ke-{{ $data->pertemuan }}
                                                </option>
                                                {{-- <option value="1">Pertemuan Ke-1</option>
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
                                                <option value="16">Pertemuan Ke-16</option> --}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="jenis-materi">Jenis Materi</label>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            @if ($data->jenis_materi == 1)
                                                <input type="radio" checked name="jenis_materi" id="jenis-materi1"
                                                    class="form-check-input" value="1">
                                                <label class="form-check-label" for="jenis_materi1">
                                                    Kuis
                                                </label>
                                                <input type="radio" name="jenis_materi" id="jenis-materi2"
                                                    class="form-check-input" value="2">
                                                <label class="form-check-label" for="jenis_materi2">
                                                    Materi
                                                </label>
                                            @else
                                                <input type="radio" name="jenis_materi" id="jenis-materi1"
                                                    class="form-check-input" value="1">
                                                <label class="form-check-label" for="jenis_materi1">
                                                    Kuis
                                                </label>
                                                <input type="radio" checked name="jenis_materi" id="jenis-materi2"
                                                    class="form-check-input" value="2">
                                                <label class="form-check-label" for="jenis_materi2">
                                                    Materi
                                                </label>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="deskripsi">Deskripsi</label>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control">{{ $data->deskripsi }}</textarea>
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
            <div class="col-md-4 col-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar File</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            @foreach ($file as $item)
                                <div class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center mb-2">
                                        <a href="{{ asset('storage/uploads/' . $item->dir_file . '/' . $item->nama_file) }}"
                                            target="blank" class="">{{ $item->nama_file }}</a>
                                        <form method="POST" action="{{ url('admin/hapus-file/' . $item->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-icon icon-left btn-danger show_confirm"
                                                data-toggle="tooltip" title='Delete'><i class="bi bi-trash"></i></button>
                                        </form>
                                    </li>
                                </div>
                                {{-- <img src="{{ asset('storage/uploads/' . $item->dir_file . '/' . $item->nama_file) }}" alt=""> --}}
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $('.matkul').on('change', function() {
            var id = $(this).val();
            $.ajax({
                url: "../pertemuan/check/" + id,
                type: 'GET',
                success: function(response) {
                    var data = response.data;
                    var pertemuan = data.pertemuan;

                    // Mengambil elemen select dengan id "pertemuan"
                    var selectPertemuan = $('#pertemuan');

                    // Menambahkan option tambahan ke elemen select
                    for (var i = 1; i <= 16; i++) {
                        if (i !== data.pertemuan) {
                            var option = $('<option></option>').attr('value', i).text('Pertemuan ke-' +
                                i);
                            selectPertemuan.append(option);
                        }
                    }

                    // Lakukan sesuatu dengan data yang telah diterima
                    // console.log('ID:', id);
                    // console.log('Pertemuan:', pertemuan);
                    // console.log('Mata Kuliah ID:', mata_kuliah_id);
                    // console.log('Jenis Materi:', jenis_materi);
                    // console.log('Deskripsi:', deskripsi);
                    // console.log('Created At:', created_at);
                    // console.log('Updated At:', updated_at);
                },
                error: function(xhr, status, error) {
                    // Tangani kesalahan jika permintaan gagal
                    console.error('Error:', error);
                }
            });
        })
    </script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            Swal.fire({
                title: 'Apakah Anda Yakin Akan Menghapus File?',
                showCancelButton: true,
                confirmButtonText: 'Yes',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        });
    </script>
@endsection
