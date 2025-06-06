@extends('department.layouts.app')

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
                <h2 class="page-title">Complaint Management</h2>
                {{-- <p> Tables with built-in bootstrap styles </p> --}}
                <div class="col-12 text-right">
                    {{-- <a class="btn btn-primary" href="{{ route('department.complaint.create') }}">add</i>&nbsp;&nbsp;<i
                            class="fa fa-user"></i></a> --}}
                </div>
                <div class="row">
                    <div class="col-md-12 my-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="card-title">
                                    <h5>
                                        Complaints List
                                    </h5>
                                    {{-- <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p> --}}
                                </div>
                                <div class="toolbar">
                                    {{-- <form class="form"> --}}
                                    <div class="form-row">
                                        <div class="form-group col-auto mr-auto">
                                        </div>
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
                                            <label for="search" class="sr-only">Status Pending/Solve</label>
                                            <select class="form-control select2" id="comp-status-id">
                                                <option disabled selected> -- Select Status --</option>
                                                <option value="1"> Completed</option>
                                                <option value="2"> Work In Progress</option>
                                                <option value="0">Pending</option>
                                            </select>
                                        </div>
                                        {{-- <div class="form-group col-auto">
                                            <label for="search" class="sr-only">Complaint Type</label>
                                            <select class="form-control select2" id="type-id">
                                                <option disabled selected> -- Select Complaint Type --</option>
                                                @foreach ($comptype as $row)
                                                    <option value="{{ $row->id }}"> {{ $row->title }} </option>
                                                @endforeach
                                            </select>
                                        </div> --}}
                                        <div class="form-group col-auto">
                                            <label for="search" class="sr-only">Search</label>
                                            <input type="text" class="form-control" id="search1" value=""
                                                placeholder="Search">
                                        </div>
                                    </div>
                                    {{-- </form> --}}
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 skeleton-container">
                                        <table class="skeleton-table table table-borderless table-hover table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Compaint ID</th>
                                                    <th>
                                                        Consumer Number</th>
                                                    <th>
                                                        Consumer Name</th>
                                                    <th>
                                                        Town</th>
                                                    <th>
                                                        Complaint Type / Priority</th>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script>
            var search = null;
            var town = null;
            var type = null;
            var comp_status = null;
            fetchDataOnReady();

            function updateStatus(id, status) {
                if (status == 0) {
                    const complaintId = id;

                    // AJAX request
                    $.ajax({
                        url: '/admin/complaints/update-status', // Laravel route URL
                        method: 'POST',
                        data: {
                            complaint_id: complaintId,
                            status: status,
                            _token: $('meta[name="csrf-token"]').attr('content') // CSRF token
                        },
                        success: function(response) {
                            if (response.success) {
                                alert('Complaint status updated successfully!');
                            } else {
                                alert('Failed to update complaint status.');
                            }
                        },
                        error: function() {
                            alert('An error occurred while updating the status.');
                        }
                    });
                }

            }
            $(document).ready(function() {


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
                $("#comp-status-id").change(function() {
                    comp_status = $(this).val();
                    fetchDataOnReady();
                });

                // Call the function on document ready

            });
            console.log('input :' + search + ', town : ' + town + ', type : ' + type );
            function fetchDataOnClick(page) {
                console.log(page);
                $.ajax({
                    url: "{{ route('deparment.complaint.index') }}",
                    type: "GET",
                    data: {
                        type: 'ajax',
                        search: search,
                        town: town,
                        type_id: type,
                        comp_status: comp_status,
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
            console.log('Second input :' + search + ', town : ' + town + ', type : ' + type );

            // Function to send AJAX request on document ready
            function fetchDataOnReady() {
                $.ajax({
                    url: "{{ route('deparment.complaint.index') }}",
                    type: "GET",
                    data: {
                        type: 'ajax',
                        search: search,
                        town: town,
                        type_id: type,
                        comp_status: comp_status
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
                    html += '<td class="w-20">';
                    if (row.customer_id != 0) {
                        html += '<p class="text-xs font-weight-bold mb-0">' + row.customer.customer_id + '</p>';
                    } else {
                        html += '<p class="text-xs font-weight-bold mb-0">' + row.customer_num + '</p>';
                    }
                    html += '</td>';
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
                    html += row.status == 1 ?
                        '<span class="badge bg-success text-white">Completed</span>' :

                        '<span class="badge bg-danger text-white">Pending</span>';
                    html += '</td>';
                    html += '<td class="align-middle">';
                   
                    html +=
                        '  <button class="btn btn-sm rounded dropdown-toggle more-horizontal text-muted" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                    html += '<span class="text-muted sr-only">Action</span>';
                    html += '</button>';
                    html += '<div class="dropdown-menu dropdown-menu-right shadow">';
                    html += '<a class="dropdown-item" href="' + currentUrl + '/' + row.id +
                        '/edit"><i class="fe fe-edit-2 fe-12 mr-3 text-muted"></i>Edit</a>';
                    // html += '<a class="dropdown-item" href="#"><i class="fe fe-trash fe-12 mr-3 text-muted"></i>Remove</a>';
                    // if (row.status != 1) {
                        html += '<a class="dropdown-item" href="' +
                            "{{ route('deparment.complaint.detail', '') }}/" + row.id +
                            '"><i class="fe fe-flag fe-12 mr-3 text-muted"></i>Detail</a>';
                    // }
                    html += '</div>';
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
