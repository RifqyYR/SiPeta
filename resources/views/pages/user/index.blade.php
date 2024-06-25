@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="h4 mb-0 text-info">Kelola User</h4>

            <a href="{{ route('user.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm ms-1"><i
                    class="fas fa-user fa-sm text-white"></i> Tambah Data</a>
        </div>

        <div class="row">
            <div class="table-responsive mt-4">
                <table class="table table-bordered table-striped table-sm datatable" id="dataTable" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr>
                            <th class="background-green">Nama</th>
                            <th class="background-green">Email</th>
                            <th class="background-green">Tanggal Diperbarui</th>
                            <th class="background-green">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($users) > 0)
                            @foreach ($users as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        {{ $item->updated_at->format('d/m/Y H:i:s') }}
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <div class="align-items-center d-grip gap-4 mx-auto">
                                                {{-- Delete Button --}}
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#deleteUserDataModal"
                                                    onclick="hapusDataUser('{{ $item->uuid }}')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                        viewBox="0 0 448 512">
                                                        <style>
                                                            svg {
                                                                fill: #ffffff
                                                            }
                                                        </style>
                                                        <path
                                                            d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteUserDataModal" tabindex="-1" role="dialog" aria-labelledby="user-data-modal-label"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold text-danger" id="user-data-modal-label">Konfirmasi Hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-delete">Batal</button>
                    <a id="deleteUserDataLink">
                        <button type="button" class="btn btn-danger">Hapus</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
