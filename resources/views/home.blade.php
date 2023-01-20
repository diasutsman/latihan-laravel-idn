@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session()->has('failure'))
                    <div class="alert alert-danger alert-dismissible fade show col-lg-6" role="alert">
                        {{ session('failure') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show col-lg-6" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card mb-4">
                    <div class="card-header">Class Database</div>

                    <div class="card-body">
                        <a href="{{ route('students.index') }}" class="btn btn-primary">Students Data</a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAll">
                            Delete All
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="deleteAll" tabindex="-1" aria-labelledby="deleteAllLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="deleteAllLabel">Confirm password before clear
                                            data</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('class.deleteAll') }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <div class="modal-body">
                                            <div class="form-group mb-3">
                                                <label for="password">Password</label>
                                                <input type="password" name="password" required
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    id="password" placeholder="Enter your password"
                                                    value="{{ old('password') }}">
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger">Delete All</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Jurusan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($members->count() == 0)
                                        <tr>
                                            <td colspan="3" class="text-center">No Data</td>
                                        </tr>
                                    @endif
                                    @foreach ($members as $member)
                                        <tr>
                                            <td>{{ $member->name }}</td>
                                            <td>{{ $member->major }}</td>
                                            <td>
                                                <form action="{{ route('class.destroy', $member->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{ route('class.edit', $member->id) }}"
                                                        class="btn btn-warning">Edit</a>
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Input Class</div>

                    <div class="card-body">
                        <form action="{{ route('class.store') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" required
                                    class="form-control @error('name') is-invalid @enderror" id="name"
                                    placeholder="Enter your name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="major">Major</label>
                                <select class="form-select" name="major">
                                    <option value="Rekayasa Perangkat Lunak" selected>Rekayasa Perangkat Lunak</option>
                                    <option value="Desain Multi Media">Desain Multi Media</option>
                                    <option value="Teknik Komputer Jaringan">Teknik Komputer Jaringan</option>
                                </select>
                                @error('major')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const deleteAll = document.getElementById('deleteAll')
        const password = document.getElementById('password')

        deleteAll.addEventListener('shown.bs.modal', () => {
            password.focus()
        })
    </script>
@endsection
