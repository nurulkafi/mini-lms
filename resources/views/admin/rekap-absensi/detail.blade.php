@extends('layouts.main')

@section('rekap-absensi', 'active')
@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Data Rekap Absensi Algoritma Pemograman</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Mahasiswa</th>
                                <th>Nama Mahasiswa</th>
                                <th>Jumlah Pertemuan Perkuliahan</th>
                                <th>Hadir</th>
                                <th>Izin</th>
                                <th>Sakit</th>
                                <th>Jumlah Kehadiran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->nim }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->jumlahPertemuan($jadwal->mata_kuliah_id) }} Pertemuan</td>
                                    <td>{{ $item->jumlahAbsensi($item->user_id,$jadwal->mata_kuliah_id,'Hadir') }}</td>
                                    <td>{{ $item->jumlahAbsensi($item->user_id,$jadwal->mata_kuliah_id,'Izin') }}</td>
                                    <td>{{ $item->jumlahAbsensi($item->user_id,$jadwal->mata_kuliah_id,'Sakit') }}</td>
                                    <td>{{ $item->jumlahAbsensi($item->user_id,$jadwal->mata_kuliah_id,'Hadir') }} / 7</td>
                                </tr>
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
