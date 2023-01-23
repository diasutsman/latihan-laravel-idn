@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header">Books</div>

                    <div class="card-body">
                        <div class="d-flex gap-2 align-items-start">
                            <a href="{{ route('home') }}" class="btn btn-success">Home</a>
                            <a href="{{ route('books.create') }}" class="btn btn-primary">Add Book</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Kategori</th>
                                        <th>Jumlah Halaman</th>
                                        <th>Penerbit</th>
                                        <th>Tahun Terbit</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($books->count() == 0)
                                        <tr>
                                            <td colspan="100" class="text-center">No Data</td>
                                        </tr>
                                    @endif
                                    @foreach ($books as $book)
                                        <tr>
                                            <td>{{ $book->name }}</td>
                                            <td>{{ $book->category->name }}</td>
                                            <td>{{ $book->page_count }}</td>
                                            <td>{{ $book->publisher }}</td>
                                            <td>{{ $book->publication_year }}</td>
                                            <td>
                                                <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="/books/{{ $book->id }}/edit"
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
                  <div class="card-header">Input Student</div>

                  <div class="card-body">
                      <form action="{{ route('books.store') }}" method="POST">
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
                              <label for="page_count">Page Count</label>
                              <input type="number" name="page_count" required
                                  class="form-control @error('page_count') is-invalid @enderror" id="page_count"
                                  placeholder="Enter your Page Count" value="{{ old('page_count') }}">
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
                                  placeholder="Enter your Publisher" value="{{ old('publisher') }}">
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
                                  id="publication_year" placeholder="Enter your Publication Year"
                                  value="{{ old('publication_year') }}">
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
                                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                                  @endforeach
                              </select>
                              @error('category_id')
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
