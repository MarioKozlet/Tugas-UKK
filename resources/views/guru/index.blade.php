@extends('layouts.template')
@section('content')
    <div class="card m-4">
        <div class="card-header">
            <h3>
                Master Data User
            </h3>
            <div class="divider text-end">
                <a href="{{ route('guru.create') }}" class="btn btn-outline-primary"><i class='bx bx-plus'></i></a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive text-nowrap m-4">
                <table class="table card-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Guru</th>
                            <th>Foto</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->guru }}</td>
                                <td><img sizes="" src="{{ asset('images/' . $item->nama_file) }}" alt="">
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href=""><i class="bx bx-edit-alt me-1"></i>
                                                Edit</a>
                                            <a class="dropdown-item" href="{{ route('guru.destroy', $item->id) }}"
                                                data-confirm-delete="true"><i class="bx bx-trash-alt me-1"></i>
                                                Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- {{ $data->links() }} --}}
        </div>
    </div>
@endsection
