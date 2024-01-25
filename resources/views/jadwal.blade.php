@extends('MainLayout')

@section('breadcrumbs')
    <!-- Breadcrumb start -->
    <ol class="breadcrumb d-md-flex d-none">
        <li class="breadcrumb-item breadcrumb-active">
            <i class="bi bi-calendar"></i>
            <a href="{{ route('jadwal') }}">Jadwal</a>
        </li>
    </ol>
    <!-- Breadcrumb end -->
@endsection
@section('mainContent')
    <div class="card container-fluid py-4 px-4">
        <div class="bg-light rounded h-100 p-4">
            <div class="row pb-3">
                <div class="col">
                    <h6 class="mb-4">Tabel Jadwal</h6>
                </div>
                <div class="col text-end me-2">
                    <a href="{{ route('jadwal.add') }}" class="btn btn-sm btn-primary">Add</a>
                </div>
            </div>

            <table id="basicExampleJadwal" class="table custom-table">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        </th>
                        <th scope="col">Title</th>
                        <th scope="col">Date</th>
                        <th scope="col">Open vote</th>
                        <th scope="col">Close vote</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwal as $item)
                        <tr>
                            <td class="text-center">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            </td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->tanggal_pemilihan }}</td>
                            <td>{{ $item->open_vote }}</td>
                            <td>{{ $item->close_vote }}</td>
                            <td class="text-center">
                                <span
                                    class="badge rounded-pill {{ $item->status === 'ongoing'
                                        ? 'shade-green'
                                        : ($item->status === 'closed'
                                            ? 'shade-red'
                                            : ($item->status === 'future'
                                                ? 'shade-primary'
                                                : '')) }}">{{ $item->status }}</span>
                            </td>

                            <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-three-dots"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-lg-end">
                                        <li>
                                            <p class="dropdown-item" href="#">Action</p>
                                        </li>
                                        <li><a href="{{ route('jadwal.edit', $item->id) }}" class="dropdown-item">Edit</a>
                                        </li>
                                        <li><a href="{{ route('jadwal.delete', $item->id) }}"
                                                class="dropdown-item">Delete</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- <table id="basicExampleJadwal" class="table custom-table">
                <thead>
                    <tr>
                        <th scope="col" class="text-end">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        </th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Open vote</th>
                        <th scope="col">Close vote</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwal as $item)
                        <tr>
                            <td class="text-center">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            </td>
                            <td>{{ $item->tanggal_pemilihan }}</td>
                            <td>{{ $item->open_vote }}</td>
                            <td>{{ $item->close_vote }}</td>
                            <td
                                class="badge rounded-pill {{ $item->status === 'ongoing' ? 'shade-green' : ($item->status === 'closed' ? 'shade-red' : 'shade-primary') }} text-center">
                                {{ $item->status }}</td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-three-dots"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-lg-end">
                                        <li>
                                            <p class="dropdown-item" href="#">Action</p>
                                        </li>
                                        <li><a href="{{ route('jadwal.edit', $item->id) }}" class="dropdown-item">Edit</a>
                                        </li>
                                        <li><a href="{{ route('jadwal.delete', $item->id) }}"
                                                class="dropdown-item">Delete</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table> --}}
        </div>
    </div>
@endsection
