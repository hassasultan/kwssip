@extends('layouts.app')

@section('content')
    <style>
        .skeleton-row {
            background-color: #f2f2f2;
        }

        .skeleton-row td {
            height: 20px;
            /* Adjust height as needed */
            border: none;
        }
    </style>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                {{-- @include('layouts.include.toolbar') --}}
                <h2 class="page-title">Agent Management</h2>
                <p> Tables with built-in bootstrap styles </p>
                <div class="col-12 text-right">
                    <a class="btn btn-primary" href="{{ route('agent-management.create') }}">add</i>&nbsp;&nbsp;<i
                            class="fa fa-user"></i></a>
                </div>
                <div class="row">
                    <div class="col-md-12 my-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="card-title">
                                    <h5>
                                        Agent List
                                    </h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                </div>
                                <div class="toolbar">
                                    {{-- <form class="form">
                                        <div class="form-row">
                                            <div class="form-group col-auto mr-auto">
                                            </div>
                                            <div class="form-group col-auto">
                                                <label for="search" class="sr-only">Search</label>
                                                <input type="text" class="form-control" id="search1" value=""
                                                    placeholder="Search">
                                            </div>
                                        </div>
                                    </form> --}}
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example1" class="table table-borderless table-hover">
                                            <thead>
                                                <tr>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Agent</th>
                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Town</th>
                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Type</th>
                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Address</th>
                                                    {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Trucks</th> --}}
                                                    <th class="text-secondary opacity-7">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- @if (count($user) > 0) --}}
                                                @foreach ($agent as $key => $row)
                                                    <tr>
                                                        <td>
                                                            <p class="text-xs font-weight-bold mb-0">{{ $row->user->name }}
                                                            </p>
                                                            @if ($row->avatar != null)
                                                                <img src="{{ asset('storage/' . $row->avatar) }}"
                                                                    class="img-fluid" style="width: 70px; height: 70px;" />
                                                            @endif
                                                        </td>
                                                        <td class="align-middle text-center text-sm">
                                                            <p class="text-xs text-secondary mb-0">{{ $row->town->town }}
                                                            </p>
                                                            <p class="text-xs text-secondary mb-0">{{ $row->town->subtown }}
                                                            </p>
                                                        </td>
                                                        <td class="align-middle text-center text-sm">
                                                            <p class="text-xs text-secondary mb-0">
                                                                {{ $row->complaint_type->title ?? 'Type is not defined...' }}
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p class="text-xs text-center font-weight-bold mb-0">
                                                                {{ $row->address }} </p>
                                                        </td>
                                                        {{-- <td class="align-middle text-center text-sm">
                                                    <p class="text-xs text-secondary mb-0">{{ count($row->hydrant->vehicles) }}</p>
                                                </td> --}}
                                                        <td class="align-middle">
                                                            <a href="{{ route('agent-management.edit', $row->id) }}"
                                                                class="text-secondary font-weight-bold text-xs m-3"
                                                                data-toggle="tooltip" data-original-title="Edit user">
                                                                Edit
                                                            </a>
                                                            |
                                                            <a href="{{ route('agent-management.details', $row->id) }}"
                                                                class="text-secondary font-weight-bold text-xs m-3"
                                                                data-toggle="tooltip" data-original-title="Edit user">
                                                                Assigned Complaints
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                {{-- @else
                                        No Record Find...
                                    @endif --}}
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
@endsection
