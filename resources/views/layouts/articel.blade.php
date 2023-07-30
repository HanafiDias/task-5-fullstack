@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container">
                    <main class="py-4">
                        <nav class="navbar navbar-expand-lg bg-coffee">
                            <div class="container-fluid justify-content-center">
                                <!-- Tambahkan class "justify-content-center" untuk mengatur posisi tengah -->
                                {{-- <a class="navbar-brand" href="#">Navbar</a> --}}
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse justify-content-center bg-primary"
                                    id="navbarNavAltMarkup">
                                    <div class="navbar-nav">
                                        <h5><a class="nav-link text-white" aria-current="page" href="/">Home</a></h5>
                                        <h5><a class="nav-link text-white" aria-current="page" href="/article">Article</a>
                                        </h5>
                                        <h5><a class="nav-link text-white" aria-current="page"
                                                href="/distributor">Distributors</a>
                                        </h5>
                                        <h5><a class="nav-link text-white" aria-current="page" href="/uploads">Uploads</a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </main>
                </div>

            </div>
        </div>
    </div>

    <div class="container mt-4">
        <h2 class="mb-3">Beans Table</h2>


        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah data
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Distributor</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('distributor.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="Distributor_Name" class="form-label">Distributor Name</label>
                                <input type="text" name="Distributor_Name" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="State_region" class="form-label">State_region</label>
                                <input type="text" name="State_region" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="Country" class="form-label">Country</label>
                                <input type="text" class="form-control" name="Country" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3">
                                <label for="Phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" name="Phone" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3">
                                <label for="Email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="Email" id="exampleInputPassword1">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>


        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Distributor Name</th>
                    <th scope="col">State region</th>
                    <th scope="col">City</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            @foreach ($data as $dis)
                <tbody>
                    <tr>
                        <td>{{ $dis->Distributor_Name }}</td>
                        <td>{{ $dis->State_region }}</td>
                        <td>{{ $dis->Country }}</td>
                        <td>{{ $dis->Phone }}</td>
                        <td>{{ $dis->Email }}</td>
                        <td>


                            <!-- Button trigger modal "Edit" -->
                            <button type="button" class="btn btn-primary mb-2 edit-button" data-bs-toggle="modal"
                                data-bs-target="#exampleModaledit-{{ $dis->id }}">
                                Edit
                            </button>


                            <!-- Modal -->
                            <!-- Modal "Edit Distributor" -->
                            <div class="modal fade" id="exampleModaledit-{{ $dis->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Distributor</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="editForm" method="POST"
                                                action="/distributor/{{ $dis->id }}">
                                                @csrf
                                                @method('put')
                                                <div class="mb-3">
                                                    <label for="Distributor_Name" class="form-label">Distributor
                                                        Name</label>
                                                    <input type="text" value="{{ $dis->Distributor_Name }}"
                                                        name="Distributor_Name" class="form-control"
                                                        id="exampleInputEmail1" aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="State_region" class="form-label">State_region</label>
                                                    <input type="text" value="{{ $dis->State_region }}"
                                                        name="State_region" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="Country" class="form-label">Country</label>
                                                    <input type="text" value="{{ $dis->Country }}"
                                                        class="form-control" name="Country" id="exampleInputPassword1">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="Phone" class="form-label">Phone</label>
                                                    <input type="text" value="{{ $dis->Phone }}"
                                                        class="form-control" name="Phone" id="exampleInputPassword1">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="Email" class="form-label">Email</label>
                                                    <input type="email" value="{{ $dis->Email }}"
                                                        class="form-control" name="Email" id="exampleInputPassword1">
                                                </div>

                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </td>

                    </tr>
                </tbody>
            @endforeach
        </table>
        <footer class="footer mt-auto py-3 bg-light">
            <div class="container text-center">
                <span class="text-muted"> {{ date('F d, Y') }}</span>
            </div>
        </footer>
    </div>
@endsection
