@extends('MainLayout')

@section('breadcrumbs')
    <!-- Breadcrumb start -->
    <ol class="breadcrumb d-md-flex d-none">
        <li class="breadcrumb-item">
            <i class="bi bi-person"></i>
            <a href="{{ route('user') }}">User</a>
        </li>
    </ol>
    <!-- Breadcrumb end -->
@endsection
@section('mainContent')
    <div class="card container-fluid py-4 px-4">
        <div class="bg-light rounded h-100 p-4">
            <div class="row pb-3">
                <div class="col">
                    <h6 class="mb-4">Tabel User</h6>
                </div>
                <div class="col text-end me-2">
                    <a href="{{ route('user.add') }}" class="btn btn-sm btn-primary">Add</a>
                </div>
            </div>

            <div class="table-responsive">
                <table id="basicExampleUser" class="table custom-table">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            </th>
                            <th scope="col"">Avatar</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Prodi</th>
                            <th scope="col">Role</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $item)
                            <tr>
                                <td class="text-center">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                </td>
                                <td class="text-center"><img src="{{ $item->foto }}" width="50px" height="50px"></td>
                                <td>{{ $item->nim }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->prodi->prodi_name }}</td>
                                <td>{{ $item->role }}</td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button class="btn" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="bi bi-three-dots"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-lg-end">
                                            <li>
                                                <p class="dropdown-item" href="#">Action</p>
                                            </li>
                                            <li><a href="{{ route('user.edit', $item->id) }}" class="dropdown-item">Edit</a>
                                            </li>
                                            <li><a href="{{ route('user.delete', $item->id) }}"
                                                    class="dropdown-item">Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
