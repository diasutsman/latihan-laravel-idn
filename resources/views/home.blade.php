@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header">Class Database</div>

                    <div class="card-body">
                        <form action="/class" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('This action is irreversible! Are you sure want to proceed?')">Delete
                                All</button>
                        </form>
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
                                    @foreach ($members as $member)
                                        <tr>
                                            <td>{{ $member->name }}</td>
                                            <td>{{ $member->major }}</td>
                                            <td>
                                                <form action="/class/{{ $member->id }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="/class/{{ $member->id }}/edit"
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
                    <div class="card-header">Input Member</div>

                    <div class="card-body">
                        <form action="/class" method="POST">
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
@endsection
