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
                <h2 class="page-title">Complaint Type Management</h2>
                <p> Tables with built-in bootstrap styles </p>
                <div class="col-12 text-right">
                    @if (auth()->user()->role == 1)
                        <a class="btn btn-primary" href="{{ route('admin.compaints-type-management.create') }}">add</i>&nbsp;&nbsp;<i
                            class="fa fa-user"></i></a>
                    @else
                        <a class="btn btn-primary" href="{{ route('system.compaints-type-management.create') }}">add</i>&nbsp;&nbsp;<i
                            class="fa fa-user"></i></a>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-12 my-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="card-title">
                                    <h5>
                                        Complaint Type List
                                    </h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                </div>
                                <div class="toolbar">
                                    <form class="form">
                                        <div class="form-row">
                                            <div class="form-group col-auto mr-auto">
                                            </div>
                                            <div class="form-group col-auto">
                                                <label for="search" class="sr-only">Search</label>
                                                <input type="text" class="form-control" id="search1" value=""
                                                    placeholder="Search">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="p-4">
                                    <h5>Generate Report</h5>
                                    @if (auth()->user()->role == 1)
                                    <form role="form" method="get" action="{{ route('admin.compaints-reports.reports') }}"
                                        enctype="multipart/form-data">
                                        @else
                                        <form role="form" method="get" action="{{ route('system.compaints-reports.reports') }}"
                                            enctype="multipart/form-data">
                                    @endif
                                        <div class="row">

                                            <div class="form-group col-4">
                                                <label>From Date</label>
                                                <input type="date" class="form-control border-bottom"
                                                    placeholder="Enter Customer Title..." name="from_date"
                                                    value="{{ old('title') }}" required />
                                            </div>
                                            <div class="form-group col-4">
                                                <label>To Date</label>
                                                <input type="date" class="form-control border-bottom"
                                                    placeholder="Enter Customer Title..." name="to_date"
                                                    value="{{ old('title') }}" required />
                                            </div>
                                            <div class="form-group col-4">
                                                <button type="submit"
                                                    class="btn bg-primary btn-lg ">Create</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-borderless table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Action</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="user-table-body">
                                                @if (count($type) > 0)
                                                    @foreach ($type as $key => $row)
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex px-2 py-1">
                                                                    <div class="d-flex flex-column justify-content-center">
                                                                        <h6 class="mb-0 text-sm">{{ $row->title }}</h6>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td class="align-middle">
                                                                @if (auth()->user()->role == 1)
                                                                <a href="{{ route('admin.compaints-type-management.edit', $row->id) }}"
                                                                    class="text-secondary font-weight-bold text-xs"
                                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                                    Edit
                                                                </a>
                                                                @else
                                                                <a href="{{ route('system.compaints-type-management.edit', $row->id) }}"
                                                                    class="text-secondary font-weight-bold text-xs"
                                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                                    Edit
                                                                </a>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    No Record Find...
                                                @endif
                                            </tbody>
                                        </table>
                                        <nav aria-label="Table Paging" class="mb-0 text-muted">
                                          <ul class="pagination justify-content-center mb-0" id="user-pagination">
                                              {{-- <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                              <li class="page-item"><a class="page-link" href="#">1</a></li>
                                              <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                                              <li class="page-item"><a class="page-link" href="#">Next</a></li> --}}
                                          </ul>
                                      </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        var search = null;
        $("input").keyup(function() {
            search = $(this).val();
            fetchDataOnReady();
        });
        $(document).ready(function() {

            // Call the function on document ready
            fetchDataOnReady();

        });

        var url = '';
        if ({{ auth()->user()->role }} == 1) {
            url = "{{ route('admin.compaints-type-management.index') }}";
        } else {
            url = "{{ route('system.compaints-type-management.index') }}";

        }
        function fetchDataOnClick(page) {
            console.log(page);
            $.ajax({
                url: url,
                type: "GET",
                data: {
                    type: 'ajax',
                    page: page
                },
                success: function(response) {
                    console.log("Data fetched successfully on click:", response);
                    generateTableRows(response
                    .data); // Assuming data is returned as 'data' property in the response
                    generatePagination(response); // Pass the entire response to generate pagination
                    // Process the response data as needed
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching data on click:", error);
                }
            });
        }
        // Function to send AJAX request on document ready
        function fetchDataOnReady() {
            $.ajax({
                url: url,
                type: "GET",
                data: {
                    type: 'ajax',
                    search: search
                },
                success: function(response) {
                    console.log("Data fetched successfully on document ready:", response);
                    $('#user-table-body').empty(); // Clear existing content
                    generateTableRows(response.data); // Assuming data is returned as 'data' property in the response
                    generatePagination(response);
                    // Process the response data as needed
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching data on document ready:", error);
                }
            });
        }

        // Function to generate table rows
        function generateTableRows(users) {
            var html = '';
            const currentUrl = window.location.href;
            $.each(users, function(index, user) {
                html += '<tr>';
                html += '<td>' + user.title + '</td>'; // Extracting title from user object
                html += '<td>'; 
                html += '<button class="btn btn-sm rounded dropdown-toggle more-horizontal text-muted" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                html += '<span class="text-muted sr-only">Action</span>';
                html += '</button>';
                html += '<div class="dropdown-menu dropdown-menu-right shadow">';
                html += '<a class="dropdown-item" href="'+currentUrl+'/'+user.id+'/edit"><i class="fe fe-edit-2 fe-12 mr-3 text-muted"></i>Edit</a>';
                // html += '<a class="dropdown-item" href="#"><i class="fe fe-trash fe-12 mr-3 text-muted"></i>Remove</a>';
                // html += '<a class="dropdown-item" href="#"><i class="fe fe-flag fe-12 mr-3 text-muted"></i>Assign</a>';
                html += '</div></td>';
                html += '</tr>';
            });
            // console.log(html);
            $('#user-table-body').html(html);
        }

        // Function to generate pagination
        pre = 0;
        nxt = 0;
        function generatePagination(response) {
            var html = '';
            if (response.prev_page_url) {
                pre = response.current_page-1;
                html += '<li class="page-item"><a onclick="fetchDataOnClick(\'' + pre + '\')" href="javascript:void(0);" class="page-link" >Previous</a></li>';
            }
            for (var i = 1; i <= response.last_page; i++) {
                html += '<li class="page-item ' + (i == response.current_page ? 'active' : '') +
                    '"><a class="page-link pg-btn" onclick="fetchDataOnClick(\'' + i + '\')" data-attr="page=' + i +
                    '" href="javascript:void(0);">' + i + '</a></li>';
            }
            if (response.next_page_url) {
              nxt = response.current_page+1;
              html += '<li class="page-item"><a class="page-link" onclick="fetchDataOnClick(\'' + nxt + '\')" href="javascript:void(0);">Next</a></li>';
            }
            $('#user-pagination').html(html);
        }
    </script>
@endsection
