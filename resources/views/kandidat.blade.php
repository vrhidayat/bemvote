@extends('template')

@section('mainContent')
    <div class="container-fluid py-4 px-4">
        <div class="bg-light rounded h-100 p-4">
            <div class="row pb-3">
                <div class="col">
                    <h6 class="mb-4">Tabel Kandidat</h6>
                </div>
                <div class="col text-end me-2">
                    <a href="{{ route('kandidat.add') }}" class="btn btn-sm btn-primary">Add</a>
                </div>
            </div>

            <table id="example2" class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">
                            <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
                        </th>
                        <th scope="col"">Avatar</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Visi</th>
                        <th scope="col">Misi</th>
                        <th scope="col">No Urut</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($calon as $item)
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" class="btn-check" id="checkbox{{ $item->id }}"
                                    autocomplete="off">
                            </td>
                            <td class="text-center"><img src="{{ $item->foto }}" width="50px" height="50px"></td>
                            <td>{{ $item->users->nim }}</td>
                            <td>{{ $item->users->nama }}</td>
                            <td>{{ $item->visi }}</td>
                            <td>{{ $item->misi }}</td>
                            <td class="text-center">{{ $item->no_urut }}</td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-lg-end">
                                        <li>
                                            <p class="dropdown-item" href="#">Action</p>
                                        </li>
                                        <li><a href="{{ route('kandidat.edit', $item->id) }}" class="dropdown-item">Edit</a>
                                        </li>
                                        <li><a href="{{ route('kandidat.delete', $item->id) }}"
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
@endsection
