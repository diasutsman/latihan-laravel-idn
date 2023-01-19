@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Member</div>

                    <div class="card-body">
                        <form action="{{ route('class.update', $member->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" required
                                    class="form-control @error('name') is-invalid @enderror" id="name"
                                    placeholder="Enter your name" value="{{ old('name', $member->name) }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="major">Major</label>
                                <select class="form-select" name="major">
                                    <option value="Rekayasa Perangkat Lunak"
                                        @if (old('name', $member->major) === 'Rekayasa Perangkat Lunak') selected @endif>
                                        Rekayasa Perangkat Lunak</option>
                                    <option value="Desain Multi Media" @if (old('name', $member->major) === 'Desain Multi Media') selected @endif>
                                        Desain Multi Media</option>
                                    <option value="Teknik Komputer Jaringan"
                                        @if (old('name', $member->major) === 'Teknik Komputer Jaringan') selected @endif>Teknik Komputer Jaringan</option>
                                </select>
                                @error('major')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
