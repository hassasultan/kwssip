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
                <div class="row">
                    <div class="col-md-12 my-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="card-title">
                                    <h5>
                                        Add New Agent </h5>
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
                                        <h5>Give Agent Informarion...</h5>
                                        @if (auth()->user()->role == 1)
                                        <form role="form" method="POST" action="{{ route('admin.agent-management.store') }}"
                                            enctype="multipart/form-data">
                                            @else
                                            <form role="form" method="POST" action="{{ route('system.agent-management.store') }}"
                                                enctype="multipart/form-data">
                                        @endif
                                            @csrf
                                            <div class="row">
                                                <div class="form-group col-12 p-3">
                                                    <label>Select User*</label>
                                                    <select name="user_id"
                                                        class="select2 form-control fs-14  h-50px" required>
                                                        @foreach ($user as $row)
                                                            <option value="{{ $row->id }}">{{ $row->name }}
                                                                ({{ $row->email }})</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-12 p-3">
                                                    <label>Select Project*</label>
                                                    <select name="town_id" id="town_id"
                                                        class="select2 form-control fs-14  h-50px" required>
                                                        @foreach ($town as $row)
                                                            <option value="{{ $row->id }}">{{ $row->town }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-12 p-3">
                                                    <label>Select Project Location*</label>
                                                    <select name="sub_town_id" id="sub_town_id"
                                                        class="select2 form-control fs-14  h-50px" required>
                                                        {{-- @foreach ($subtown as $row)
                                                            <option value="{{ $row->id }}">({{ $row->town->town }})
                                                                {{ $row->title }}</option>
                                                        @endforeach --}}
                                                    </select>
                                                </div>
                                                <div class="form-group col-12 p-3">
                                                    <label>Select Type*</label>
                                                    <select name="type_id"
                                                        class="select2 form-control fs-14  h-50px" required>
                                                        @foreach ($type as $row)
                                                            <option value="{{ $row->id }}">({{ $row->title }})
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-12 p-3">
                                                    <label>Agent Profile</label>
                                                    <input type="file"
                                                        class="form-control border-bottom border-1 border-dark"
                                                        name="avatar" value="{{ old('avatar') }}" required />
                                                </div>
                                                <div class="form-group col-12 p-3">
                                                    <label>Description</label>
                                                    <textarea class="form-control border-bottom border-1 border-dark" placeholder="Enter Desciption..." name="description"
                                                        value="{{ old('description') }}" required></textarea>

                                                </div>
                                                <div class="form-group col-12 p-3">
                                                    <label>Address*</label>
                                                    <input type="text"
                                                        class="form-control border-bottom border-1 border-dark"
                                                        placeholder="Enter Address Here..." name="address" required
                                                        value="{{ old('address') }}" />
                                                </div>


                                                <div class="form-group col-12 p-3 text-right">

                                                    <button type="submit"
                                                        class="btn btn-primary btn-lg w-20 mt-4 mb-0">Create</button>
                                                </div>
                                            </div>

                                        </form>
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
@section('bottom_script')
    <script>
        $("#town_id").on("change", function() {
            var town_id = $(this).val();
            $.ajax({
                type: "get",
                url: "{{ route('subtown.by.town') }}",
                data: {
                    'town_id': town_id,
                },
                success: function(data) {
                    $("#sub_town_id").html("");
                    var your_html = "";
                    $.each(data, function(key, val) {
                        console.log(val);
                        your_html += "<option value=" + val['id'] + ">" + val['title'] +
                            "</option>"
                    });
                    $("#sub_town_id").append(your_html); //// For Append
                },
                error: function() {
                    console.log(data);
                }
            });
        });
    </script>    
@endsection
