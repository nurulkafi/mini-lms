@extends('layouts.main')

@section('mata-kuliah', 'active')
@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Data Mata Kuliah</h5>
                <div class="float-end">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#formMataKuliahModal">Tambah Data</button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Mata Kuliah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- <td>1</td>
                                <td>Bahasa Inggris</td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                        data-bs-target="#formMataKuliahModal">Edit</button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#ModalHapus">Hapus</button>
                                </td> --}}
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->nama_mata_kuliah }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-warning btnEdit" data-bs-toggle="modal"
                                                data-bs-target="#formMataKuliahModal"
                                                data-matkul="{{ $item->nama_mata_kuliah }}"
                                                data-id="{{ $item->id }}">Edit</button>
                                            <form method="POST"
                                                action="{{ url('admin/mata-kuliah/hapus-data/' . $item->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger show_confirm"
                                                    data-toggle="tooltip" title='Delete'>Delete</button>
                                            </form>
                                        </div>
                                    </td>
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
                    <form class="form form-horizontal form-matkul" method="post"
                        action="{{ url('admin/mata-kuliah/proses-tambah-data') }}">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="nama-mata-kuliah">Nama Mata Kuliah</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="text" id="nama_mata_kuliah" class="form-control" name="nama_mata_kuliah"
                                        placeholder="Nama Mata Kuliah" />
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(".btnEdit").on('click', function() {
            // alert();
            var id = $(this).attr("data-id");
            var matkul = $(this).attr("data-matkul");
            // alert(id);
            $('#nama_mata_kuliah').val(matkul);
            $(".form-matkul").attr('action', '../admin/mata-kuliah/proses-update-data/' + id);
        });
    </script>
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
