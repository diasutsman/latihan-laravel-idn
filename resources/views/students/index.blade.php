@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header">Class siswa</div>

                    <div class="card-body">
                        <div class="d-flex gap-2 align-items-start">
                            <a href="{{ route('home') }}" class="btn btn-success">Home</a>
                            <a href="{{ route('students.create') }}" class="btn btn-primary">Add Student</a>
                            <form action="{{ route('students.deleteAll') }}" method="POST">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure want to delete all?')">
                                    Delete All
                                </button>
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Jurusan</th>
                                        <th>Kelas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($students->count() == 0)
                                        <tr>
                                            <td colspan="100" class="text-center">No Data</td>
                                        </tr>
                                    @endif
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->address }}</td>
                                            <td>{{ $student->class->major }}</td>
                                            <td>{{ $student->class->name }}</td>
                                            <td>
                                                <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="/students/{{ $student->id }}/edit"
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
            </div>
        </div>
    </div>
@endsection
