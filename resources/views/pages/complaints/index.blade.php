@extends('layouts.app')

@section('content')
    <style>
        .skeleton-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .skeleton-table {
            width: 100%;
            border-collapse: collapse;
        }

        .skeleton-table th,
        .skeleton-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .skeleton-item {
            background-color: #f0f0f0;
            border-radius: 5px;
            overflow: hidden;
            position: relative;
        }

        .skeleton-item::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.5), transparent);
            animation: loading 1.5s infinite;
        }

        @keyframes loading {
            0% {
                left: -100%;
            }

            100% {
                left: 100%;
            }
        }

        .skeleton-content {
            padding: 20px;
        }

        .skeleton-line {
            height: 12px;
            margin-bottom: 10px;
            background-color: #ddd;
            border-radius: 5px;
        }
    </style>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title">Grievance Management</h2>
                {{-- <p> Tables with built-in bootstrap styles </p> --}}
                <div class="col-12 text-right">
                    @if (auth()->user()->role == 1)
                        <a class="btn btn-primary"
                            href="{{ route('admin.compaints-management.create') }}">add</i>&nbsp;&nbsp;<i
                                class="fa fa-user"></i></a>
                    @else
                        <a class="btn btn-primary"
                            href="{{ route('system.compaints-management.create') }}">add</i>&nbsp;&nbsp;<i
                                class="fa fa-user"></i></a>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-12 my-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="card-title">
                                    <h5>
                                        Grievance List
                                    </h5>
                                    {{-- <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p> --}}
                                </div>
                                <div class="toolbar">
                                    <div class="alert alert-danger alert-dismissible d-none" id="show-error">
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-auto">
                                            <label for="search" class="sr-only">Town</label>
                                            <select class="form-control select2" id="town-id">
                                                <option disabled selected> -- Select Town --</option>
                                                @foreach ($town as $row)
                                                    <option value="{{ $row->id }}"> {{ $row->town }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-auto">
                                            <label for="search" class="sr-only">Complaint Type</label>
                                            <select class="form-control select2" id="type-id">
                                                <option disabled selected> -- Select Complaint Type --</option>
                                                @foreach ($comptype as $row)
                                                    <option value="{{ $row->id }}"> {{ $row->title }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-auto">
                                            <label for="search" class="sr-only">Status</label>
                                            <select class="form-control select2" id="status-id">
                                                <option disabled selected> -- Select Status --</option>
                                                <option value="1"> Assigned</option>
                                                <option value="0">Not Assigned Yet</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-auto">
                                            <label for="startDate" class="sr-only">Start Date</label>
                                            <input type="date" class="form-control" id="startDate" value=""
                                                placeholder="Select Start Date">
                                        </div>
                                        <div class="form-group col-auto">
                                            <label for="endDate" class="sr-only">End Date</label>
                                            <input type="date" class="form-control" id="endDate" value=""
                                                placeholder="Select End Date">
                                        </div>
                                        <div class="form-group col-auto">
                                            <label for="search" class="sr-only">Search</label>
                                            <input type="text" class="form-control" id="search1" value=""
                                                placeholder="Search">
                                        </div>
                                        <div class="form-group col-auto">
                                            <button type="button" class="btn btn-primary" id="reset-button">Reset Filter</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 skeleton-container">
                                        <table class="skeleton-table table table-borderless table-hover table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Grievance ID</th>
                                                    {{-- <th>
                                                        Consumer Number</th> --}}
                                                    <th>
                                                        Consumer Name</th>
                                                    <th>
                                                        Project</th>
                                                    <th>
                                                        Grievance Type / Priority</th>
                                                    {{-- <th>
                                                        Title Description</th> --}}
                                                    <th>
                                                        Picture</th>
                                                    <th>
                                                        Created At</th>
                                                    <th>
                                                        Resolve Date</th>
                                                    <th>
                                                        Source</th>
                                                    <th>
                                                        Status</th>
                                                    {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Trucks</th> --}}
                                                    <th class="text-secondary opacity-7">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="user-table-body">
                                                {{-- @if (count($user) > 0) --}}
                                                @foreach ($complaint as $key => $row)
                                                    @for ($i = 1; $i <= 10; $i++)
                                                        <tr>
                                                            <td class="skeleton-item">
                                                                <div class="skeleton-content">
                                                                    <div class="skeleton-line" style="width: 100%;"></div>
                                                                </div>
                                                            </td>
                                                            <td class="skeleton-item">
                                                                <div class="skeleton-content">
                                                                    <div class="skeleton-line" style="width: 100%;"></div>
                                                                </div>
                                                            </td>
                                                            <td class="skeleton-item">
                                                                <div class="skeleton-content">
                                                                    <div class="skeleton-line" style="width: 100%;"></div>
                                                                </div>
                                                            </td>
                                                            <td class="skeleton-item">
                                                                <div class="skeleton-content">
                                                                    <div class="skeleton-line" style="width: 100%;"></div>
                                                                </div>
                                                            </td>
                                                            <td class="skeleton-item">
                                                                <div class="skeleton-content">
                                                                    <div class="skeleton-line" style="width: 100%;"></div>
                                                                </div>
                                                            </td>
                                                            <td class="skeleton-item">
                                                                <div class="skeleton-content">
                                                                    <div class="skeleton-line" style="width: 100%;"></div>
                                                                </div>
                                                            </td>
                                                            <td class="skeleton-item">
                                                                <div class="skeleton-content">
                                                                    <div class="skeleton-line" style="width: 100%;"></div>
                                                                </div>
                                                            </td>
                                                            <td class="skeleton-item">
                                                                <div class="skeleton-content">
                                                                    <div class="skeleton-line" style="width: 100%;"></div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endfor
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <nav aria-label="Table Paging" class="mb-0 text-muted">
                                            <ul class="pagination justify-content-center mb-0" id="user-pagination">
                                                <li class="page-item"><a class="page-link" href="#">Previous</a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item active"><a class="page-link" href="#">2</a>
                                                </li>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script>
            var search = null;
            var town = null;
            var type = null;
            var change_status = null;
            var startDate = null;
            var endDate = null;
            // $("input").keyup(function() {
            //     search = $(this).val();
            //     fetchDataOnReady();
            // });
            $(document).ready(function() {

                // Call the function on document ready
                $("#reset-button").click(function() {
                    resetFilters();
                });

                fetchDataOnReady();
                $("input").keyup(function() {
                    search = $(this).val();
                    fetchDataOnReady();
                });
                $("#town-id").change(function() {
                    town = $(this).val();
                    fetchDataOnReady();
                });
                $("#type-id").change(function() {
                    type = $(this).val();
                    fetchDataOnReady();
                });
                $("#status-id").change(function() {
                    change_status = $(this).val();
                    fetchDataOnReady();
                });
                $("#endDate").change(function() {

                    if ($("#startDate").val() == "") {
                        $("#show-error").html("Please Select Start Date...");
                        $("#show-error").removeClass('d-none');
                    } else {
                        startDate = $("#startDate").val();
                        endDate = $(this).val();
                        fetchDataOnReady();
                        $("#show-error").addClass('d-none');

                    }
                });
                $("#startDate").change(function() {
                    if ($("#endDate").val() != "") {
                        $("#endDate").trigger('change');
                    }
                });


            });

            function resetFilters() {
                $("#search1").val('');
                $("#town-id").val('').trigger('change'); // Trigger change for select2
                $("#type-id").val('').trigger('change');
                $("#status-id").val('').trigger('change');
                $("#startDate").val('');
                $("#endDate").val('');

                search = null;
                town = null;
                type = null;
                change_status = null;
                startDate = null;
                endDate = null;


                console.log('reset');
                fetchDataOnReady(); // Ensure this function exists
            }
            var url = '';
            if ({{ auth()->user()->role }} == 1) {
                url = "{{ route('admin.compaints-management.index') }}";
            } else {
                url = "{{ route('system.compaints-management.index') }}";

            }

            function fetchDataOnClick(page) {
                console.log(page);
                $.ajax({
                    url: url,
                    type: "GET",
                    data: {
                        type: 'ajax',
                        search: search,
                        town: town,
                        type_id: type,
                        startDate: startDate,
                        endDate: endDate,
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
                console.log('Start '+startDate);
                console.log('End '+endDate);
                $.ajax({
                    url: url,
                    type: "GET",
                    data: {
                        type: 'ajax',
                        search: search,
                        status: change_status,
                        town: town,
                        startDate: startDate,
                        endDate: endDate,
                        type_id: type
                    },
                    success: function(response) {
                        console.log("Data fetched successfully on document ready:", response);
                        $('#user-table-body').empty(); // Clear existing content
                        generateTableRows(response
                            .data); // Assuming data is returned as 'data' property in the response
                        generatePagination(response);
                        // Process the response data as needed
                    },
                    error: function(xhr, status, error) {
                        console.error("Error fetching data on document ready:", error);
                    }
                });
            }

            // Function to generate table rows
            function generateTableRows(response) {
                var html = '';
                const currentUrl = window.location.href;
                $.each(response, function(index, row) {
                    html += '<tr>';
                    html += '<td class="w-20">';
                    html += '<p class="text-xs font-weight-bold mb-0">' + row.comp_num + '</p>';
                    html += '</td>';
                    // html += '<td class="w-20">';
                    // if (row.customer_id != 0) {
                    //     html += '<p class="text-xs font-weight-bold mb-0">' + row.customer.customer_id + '</p>';
                    // } else {
                    //     html += '<p class="text-xs font-weight-bold mb-0">' + row.customer_num + '</p>';
                    // }
                    // html += '</td>';
                    html += '<td class="w-20">';
                    if (row.customer_id != 0) {
                        html += '<p class="text-xs font-weight-bold mb-0">' + row.customer.customer_name + '</p>';
                    } else {
                        html += '<p class="text-xs font-weight-bold mb-0">' + row.customer_name + '</p>';
                    }
                    html += '</td>';
                    html += '<td class="w-20">';
                    html += '<p class="text-xs font-weight-bold mb-0">' + row.town.town + ' (' + (row.subtown ? row
                        .subtown.title : '') + ')</p>';
                    html += '</td>';
                    html += '<td>';
                    html += '<p class="text-xs font-weight-bold mb-0">' + (row.type ? row.type.title : '') + '</p>';
                    html += '<p class="text-xs font-weight-bold mb-0">' + (row.prio ? row.prio.title : '') + '</p>';
                    html += '</td>';
                    // html += '<td class="align-middle text-center text-sm">';
                    // html += '<p class="text-xs text-secondary mb-0">' + row.title + '</p>';
                    // html += '</td>';
                    html += '<td class="align-middle text-center text-sm">';
                    if (row.image != null) {
                        html += '<img src="{{ asset('storage/') }}/' + row.image +
                            '" class="img-fluid" style="width: 70px; height: 70px;" />';
                    } else {
                        html += 'Not Available';
                    }
                    html += '</td>';
                    html += '<td class="text-center">';
                    html += '<p class="text-xs font-weight-bold mb-0">' + moment(row.created_at).format(
                        'DD/MM/YYYY hh:mm:ss') + '</p>';
                    html += '</td>';
                    html += '<td class="text-center">';
                    if (row.status == 1) {
                        html += '<p class="text-xs font-weight-bold mb-0">' + moment(row.updated_at).format(
                            'DD/MM/YYYY hh:mm:ss') + '</p>';
                    } else {
                        html += '<span class="bg-danger text-white">Yet Not Resolve</span>';
                    }
                    html += '</td>';
                    html += '<td class="text-center">';
                    html += '<p class="text-xs font-weight-bold mb-0">' + row.source + '</p>';
                    html += '</td>';
                    html += '<td class="text-center">';
                    html += row.status == 1 ? '<span class="badge bg-success text-white">Completed</span>' :
                        '<span class="badge bg-danger text-white">Pending</span>';
                    html += '</td>';
                    html += '<td class="align-middle">';
                    if ({{ auth()->user()->role }} == 1) {
                        html += row.assigned_complaints == null ? '<a href="' +
                            "{{ route('admin.compaints-management.details', '') }}/" + row.id +
                            '" class="text-secondary font-weight-bold text-xs m-3" data-toggle="tooltip" data-original-title="Edit user">Assign</a>' :
                            '<a href="{{ route('admin.agent-management.details', '') }}/' + row.assigned_complaints
                            .agent_id +
                            '" class="text-secondary font-weight-bold text-xs m-3" data-toggle="tooltip" data-original-title="Edit user">Already Assigned</a>';
                    } else {
                        html += row.assigned_complaints == null ? '<a href="' +
                            "{{ route('system.compaints-management.details', '') }}/" + row.id +
                            '" class="text-secondary font-weight-bold text-xs m-3" data-toggle="tooltip" data-original-title="Edit user">Assign</a>' :
                            '<a href="{{ route('system.agent-management.details', '') }}/' + row.assigned_complaints
                            .agent_id +
                            '" class="text-secondary font-weight-bold text-xs m-3" data-toggle="tooltip" data-original-title="Edit user">Already Assigned</a>';

                    }
                    html += '<a href="' + currentUrl + '/' + row.id +
                        '/edit" class="text-secondary font-weight-bold text-xs m-3" data-toggle="tooltip" data-original-title="Edit user">Edit</a>';
                    html += '</td>';
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
