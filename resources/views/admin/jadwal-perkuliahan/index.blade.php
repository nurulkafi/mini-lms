@extends('layouts.main')

@section('jadwal-perkuliahan', 'active')
@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Data Jadwal Perkuliahan</h5>
                <div class="float-end">
                    <a href="{{ url('admin/jadwal-perkuliahan/tambah-data') }}" class="btn btn-primary">Tambah Data</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Mata Kuliah</th>
                                <th>Hari</th>
                                <th>Jam</th>
                                <th>Ruangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($data as $item)
                                @if (!empty($item->matkul->nama_mata_kuliah))
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->matkul->nama_mata_kuliah }}</td>
                                        <td>{{ $item->hari }}</td>
                                        <td>{{ date('H:i', strtotime($item->jam_mulai)) }} -
                                            {{ date('H:i', strtotime($item->jam_selesai)) }}</td>
                                        <td>{{ $item->ruangan }}</td>
                                        <td>
                                            <div class="btn-group">
                                                @if ($item->jenis_materi == 1)
                                                    <a href="{{ url('admin/kuis/' . $item->id) }}" class="btn btn-info">Soal
                                                        Kuis</a>
                                                @endif
                                                {{-- <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#formMataKuliahModal">Edit</button> --}}
                                                <a href="{{ url('admin/jadwal-perkuliahan/edit/' . $item->id) }}"
                                                    class="btn btn-warning">Edit</a>
                                                <form method="POST"
                                                    action="{{ url('admin/jadwal-perkuliahan/hapus-data/' . $item->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger show_confirm"
                                                        data-toggle="tooltip" title='Delete'>Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal Form -->
    <div class="modal fade" id="formMataKuliahModal" tabindex="-1" aria-labelledby="formMataKuliahModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formMataKuliahModalLabel">Form Mata Kuliah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form form-horizontal">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="nama-mata-kuliah">Nama Mata Kuliah</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="text" id="nama-mata-kuliah" class="form-control" name="nama-mata-kuliah"
                                        placeholder="Nama Mata Kuliah" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            Swal.fire({
                title: 'Apakah Anda Yakin Akan Menghapus Data?',
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
