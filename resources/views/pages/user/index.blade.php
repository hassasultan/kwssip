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
                <h2 class="page-title">User Management</h2>
                <p> Tables with built-in bootstrap styles </p>
                <div class="col-12 text-right">

                    <a class="btn btn-primary" href="{{ route('admin.user-management.create') }}">add</i>&nbsp;&nbsp;<i
                            class="fa fa-user"></i></a>
                </div>
                <div class="row">
                    <div class="col-md-12 my-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="card-title">
                                    <h5>
                                        User List
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
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-borderless table-hover">
                                            <thead>
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            Name</th>
                                                        <th>
                                                            Email</th>
                                                        <th>
                                                            Role</th>
                                                        {{-- <th
                                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Total Trucks</th> --}}
                                                        {{-- <th class="text-secondary opacity-7">Action</th> --}}
                                                    </tr>
                                                </thead>
                                            <tbody id="user-table-body">
                                                {{-- @if (count($user) > 0) --}}
                                                {{-- Skeleton loading rows will be dynamically generated here --}}
                                                <tr class="skeleton-row">
                                                    <td>Loading...</td>
                                                    <td>Loading...</td>
                                                    <td>Loading...</td>
                                                </tr>
                                                <tr class="skeleton-row">
                                                    <td>Loading...</td>
                                                    <td>Loading...</td>
                                                    <td>Loading...</td>
                                                </tr>
                                                <tr class="skeleton-row">
                                                    <td>Loading...</td>
                                                    <td>Loading...</td>
                                                    <td>Loading...</td>
                                                </tr>
                                                <tr class="skeleton-row">
                                                    <td>Loading...</td>
                                                    <td>Loading...</td>
                                                    <td>Loading...</td>
                                                </tr>
                                                <tr class="skeleton-row">
                                                    <td>Loading...</td>
                                                    <td>Loading...</td>
                                                    <td>Loading...</td>
                                                </tr>
                                                <tr class="skeleton-row">
                                                    <td>Loading...</td>
                                                    <td>Loading...</td>
                                                    <td>Loading...</td>
                                                </tr>
                                                <tr class="skeleton-row">
                                                    <td>Loading...</td>
                                                    <td>Loading...</td>
                                                    <td>Loading...</td>
                                                </tr>
                                                <tr class="skeleton-row">
                                                    <td>Loading...</td>
                                                    <td>Loading...</td>
                                                    <td>Loading...</td>
                                                </tr>
                                                <tr class="skeleton-row">
                                                    <td>Loading...</td>
                                                    <td>Loading...</td>
                                                    <td>Loading...</td>
                                                </tr>
                                                <tr class="skeleton-row">
                                                    <td>Loading...</td>
                                                    <td>Loading...</td>
                                                    <td>Loading...</td>
                                                </tr>
                                                {{-- @foreach ($user as $key => $row)
                                                <tr>
                                                    <td>
                                                        {{ $row->name }}
                                                    </td>
                                                    <td>
                                                        {{ $row->email }}
                                                    </td>
                                                    <td>
                                                        @if ($row->role == 2)
                                                        System User
                                                        @else
                                                        Mobile Agent
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach --}}
                                            </tbody>
                                        </table>
                                        <nav aria-label="Table Paging" class="mb-0 text-muted">
                                            <ul class="pagination justify-content-center mb-0" id="user-pagination">
                                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
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
        $("input").keyup(function () {
            search = $(this).val();
            fetchDataOnReady();
        });
        $(document).ready(function () {

            // Call the function on document ready
            fetchDataOnReady();

        });
        function fetchDataOnClick(page) {
            console.log(page);
            $.ajax({
                url: "{{ route('admin.user-management.index') }}",
                type: "GET",
                data: {
                    type: 'ajax',
                    page: page
                },
                success: function (response) {
                    console.log("Data fetched successfully on click:", response);
                    generateTableRows(response.data); // Assuming data is returned as 'data' property in the response
                    generatePagination(response); // Pass the entire response to generate pagination
                    // Process the response data as needed
                },
                error: function (xhr, status, error) {
                    console.error("Error fetching data on click:", error);
                }
            });
        }
        // Function to send AJAX request on document ready
        function fetchDataOnReady() {
            $.ajax({
                url: "{{ route('admin.user-management.index') }}",
                type: "GET",
                data: {
                    type: 'ajax',
                    search: search
                },
                success: function (response) {
                    console.log("Data fetched successfully on document ready:", response);
                    $('#user-table-body').empty(); // Clear existing content
                    generateTableRows(response.data); // Assuming data is returned as 'data' property in the response
                    generatePagination(response);
                    // Process the response data as needed
                },
                error: function (xhr, status, error) {
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
                html += '<td>' + user.name + '</td>';
                html += '<td>' + user.email + '</td>';
                html += '<td>' + (user.role == 2 ? 'System User' : (user.role == 3 ? 'Mobile Agent' : (user.role == 1 ? 'Admin' : (user.role == 4 ? 'Department' : (user.role == 5 ? 'Customer' : 'Not Define'))))) + '</td>';
                html += '<td>';
                html += '  <button class="btn btn-sm rounded dropdown-toggle more-horizontal text-muted" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                html += '<span class="text-muted sr-only">Action</span>';
                html += '</button>';
                html += '<div class="dropdown-menu dropdown-menu-right shadow">';
                html += '<a class="dropdown-item" href="'+currentUrl+'/'+user.id+'/edit"><i class="fe fe-edit-2 fe-12 mr-3 text-muted"></i>Edit</a>';
                html += '</div></td>';
                html += '</tr>';
            });
            $('#user-table-body').html(html);
        }
       // Function to generate pagination
        pre = 0;
        nxt = 0;
        function generatePagination(response) {
            var html = '';
            var totalPages = response.last_page;
            var currentPage = response.current_page;

            // Determine how many pages to show at the start and end
            var startPages = 2;
            var endPages = 2;
            var middlePages = 2;
            var range = middlePages * 2 + 1;

            if (response.prev_page_url) {
                pre = currentPage - 1;
                html += '<li class="page-item"><a onclick="fetchDataOnClick(\'' + pre +
                    '\')" href="javascript:void(0);" class="page-link">Previous</a></li>';
            }

            // Show first few pages
            for (var i = 1; i <= startPages && i <= totalPages; i++) {
                html += '<li class="page-item ' + (i == currentPage ? 'active' : '') +
                    '"><a class="page-link pg-btn" onclick="fetchDataOnClick(\'' + i + '\')" data-attr="page=' + i +
                    '" href="javascript:void(0);">' + i + '</a></li>';
            }

            // Show "..." if there are hidden pages before the current page
            if (currentPage > startPages + middlePages + 1) {
                html += '<li class="page-item disabled"><a class="page-link">...</a></li>';
            }

            // Show pages around the current page
            var start = Math.max(startPages + 1, currentPage - middlePages);
            var end = Math.min(totalPages - endPages, currentPage + middlePages);

            for (var i = start; i <= end; i++) {
                html += '<li class="page-item ' + (i == currentPage ? 'active' : '') +
                    '"><a class="page-link pg-btn" onclick="fetchDataOnClick(\'' + i + '\')" data-attr="page=' + i +
                    '" href="javascript:void(0);">' + i + '</a></li>';
            }

            // Show "..." if there are hidden pages after the current page
            if (currentPage < totalPages - endPages - middlePages) {
                html += '<li class="page-item disabled"><a class="page-link">...</a></li>';
            }

            // Show last few pages
            for (var i = totalPages - endPages + 1; i <= totalPages; i++) {
                if (i > startPages) {
                    html += '<li class="page-item ' + (i == currentPage ? 'active' : '') +
                        '"><a class="page-link pg-btn" onclick="fetchDataOnClick(\'' + i + '\')" data-attr="page=' + i +
                        '" href="javascript:void(0);">' + i + '</a></li>';
                }
            }

            if (response.next_page_url) {
                nxt = currentPage + 1;
                html += '<li class="page-item"><a class="page-link" onclick="fetchDataOnClick(\'' + nxt +
                    '\')" href="javascript:void(0);">Next</a></li>';
            }

            $('#user-pagination').html(html);
        }
    </script>

@endsection