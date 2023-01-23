@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Input Student</div>
                    <div class="card-body">
                        <form action="{{ route('books.update', $book->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" required
                                    class="form-control @error('name') is-invalid @enderror" id="name"
                                    placeholder="Enter your name" value="{{ old('name', $book->name) }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="page_count">Page Count</label>
                                <input type="number" name="page_count" required
                                    class="form-control @error('page_count') is-invalid @enderror" id="page_count"
                                    placeholder="Enter your Page Count" value="{{ old('page_count', $book->page_count) }}">
                                @error('page_count')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="publisher">Publisher</label>
                                <input type="text" name="publisher" required
                                    class="form-control @error('publisher') is-invalid @enderror" id="publisher"
                                    placeholder="Enter your publisher" value="{{ old('publisher', $book->publisher) }}">
                                @error('publisher')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="publication_year">Publication Year</label>
                                <input type="number" name="publication_year" required
                                    class="form-control @error('publication_year') is-invalid @enderror"
                                    id="publication_year" placeholder="Enter your publication_year"
                                    value="{{ old('publication_year' , $book->publication_year) }}">
                                @error('publication_year')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="category_id">Category</label>
                                <select class="form-select" name="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @if ($category->id == old('category_id', $book->category_id))
                                             selected 
                                        @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
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
