@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <a href="/home" class="btn btn-success">Add Member</a>
                        @foreach ($members as $member)
                            <ul>
                                <li>{{ $member->name }}</li>
                                <li>{{ $member->major }}</li>
                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
