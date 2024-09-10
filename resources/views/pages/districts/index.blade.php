@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                {{-- @include('layouts.include.toolbar') --}}
                <h2 class="page-title">District Management</h2>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-9">
                                    <strong class="card-title">Districts</strong>
                                    <h5>Districts List</h5>
                                </div>
                                <div class="col-md-3 text-right">
                                    @if (auth()->user()->role == 1)
                                        <a class="btn btn-primary" href="{{ route('admin.districts.create') }}">Add
                                            District</a>
                                    @else
                                        <a class="btn btn-primary" href="{{ route('system.districts.create') }}">Add
                                            District</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <div class="card-title">
                                            {{-- <h5>
                                            District List
                                        </h5> --}}
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table class="table table-borderless table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Title</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($districts as $district)
                                                            <tr>
                                                                <td>{{ $district->id }}</td>
                                                                <td>{{ $district->title }}</td>
                                                                <td>
                                                                    @if (auth()->user()->role == 1)
                                                                        {{-- <a href="{{ route('admin.districts.show', $district->id) }}"
                                                                            class="btn btn-info btn-sm">View</a> --}}
                                                                        <a href="{{ route('admin.districts.edit', $district->id) }}"
                                                                            class="btn btn-primary btn-sm">Edit</a>
                                                                        <form
                                                                            action="{{ route('admin.districts.destroy', $district->id) }}"
                                                                            method="POST" style="display: inline;">
                                                                        @else
                                                                            {{-- <a href="{{ route('system.districts.show', $district->id) }}"
                                                                                class="btn btn-info btn-sm">View</a> --}}
                                                                            <a href="{{ route('system.districts.edit', $district->id) }}"
                                                                                class="btn btn-primary btn-sm">Edit</a>
                                                                            <form
                                                                                action="{{ route('system.districts.destroy', $district->id) }}"
                                                                                method="POST" style="display: inline;">
                                                                    @endif
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger btn-sm"
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
