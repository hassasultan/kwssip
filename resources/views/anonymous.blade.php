<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Perfect Scrollbar CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/simplebar.css') }}">
    <!-- Fonts CSS -->
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/feather.css') }}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/daterangepicker.css') }}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/app-light.css') }}" id="lightTheme">
    <link rel="stylesheet" href="{{ asset('assets/css/app-dark.css') }}" id="darkTheme" disabled>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/fullcalendar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/uppy.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.steps.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/quill.snow.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    


    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>

<body class="vertical"
    style="background-color:#fff !important; background-image:url('{{ asset('assets/images/cmp-bg.jpg') }}') !important;">
    <style>
        .item-required {
            color: red;
        }

        .my-element {
            display: grid;
            align-items: center;
        }

        .skiptranslate {
            display: none !important;
        }

        .goog-te-combo {
            width: 170px;
            background: black;
            color: white;
            border-radius: 5px;
            padding: 3px;
            font-family: NexaBook;
            font-style: normal;
        }

        .goog-te-banner-frame.skiptranslate {
            display: none !important;
        }

        body {
            top: 0px !important;
        }

        .goog-logo-link {
            display: none !important;
        }

        .goog-te-gadget {
            display: none !important;
        }

        .goog-te-gadget {
            color: transparent !important;
        }

        #goog-gt-tt {
            display: none !important;
            top: 0px !important;
        }

        .goog-tooltip skiptranslate {
            display: none !important;
            top: 0px !important;
        }

        .activity-root {
            display: hide !important;
        }

        .status-message {
            display: hide !important;
        }

        .started-activity-container {
            display: hide !important;
        }

        .goog-text-highlight {
            background: none !important;
            box-shadow: none !important;
        }

        #google_element {
            display: block;
        }

        .make-header {
            height: 80px;
            margin-top: 32px !important;
        }

        .mobile-header {
            display: none;
        }

        @media only screen and (max-width: 767px) {

            .desktop-header {
                display: none;
            }

            .mobile-header {
                display: block;
            }

            .make-header {
                height: 150px !important;
            }
        }

        .mobile-heading {
            font-size: 0.9rem;
        }

        .mobile-row {
            display: flex;
        }

        .w-20 {
            max-width: 20%;
        }

        .w-80 {
            max-width: 80%;
        }
        .bg-main-page
        {
            background: #02abe9;
        }
    </style>
    <div id="app" class="wrapper">
        <div class="container-fluid">
            <div class="bg-main-page col-12 mt-3 make-header desktop-header">
                {{-- <div class="container"> --}}
                <div class="row">
                    <div class="col-md-2">
                        <img src="{{ asset('assets/images/kwssip.png') }}" class="img-fluid" alt="main_logo"
                            style="width: 200px; margin-top:14px;">
                    </div>
                    <div class="col-md-5 pt-3">
                        <h5 class="text-white" style="font-size: 1.8rem; margin-bottom:0% !important;">GRIEVANCE REDRESSAL MECHANISM
                        </h5>
                        <span class="text-white" style="font-size: 0.8rem">KWSSIP |
                            {{ \Carbon\Carbon::now()->format('d F Y') }}</span>
                    </div>
                    <div class="col-md-2 pt-3">
                        <div id="google_translate_element"></div>
                        <a target="_blank" class="btn btn-link text-white font-weight-bolder"
                            href="{{ route('front.anonymous') }}/#googtrans(en|en)">English</a>
                        <a target="_blank" class="btn btn-link text-white font-weight-bolder"
                            href="{{ route('front.anonymous') }}/#googtrans(en|ur)">Urdu</a>
                        <a target="_blank" class="btn btn-link text-white font-weight-bolder"
                            href="{{ route('front.anonymous') }}/#googtrans(en|sd)">Sindhi</a>
                    </div>
                    <div class="col-md-1  text-right border-right mt-3">
                        <img src="{{ asset('assets/images/sg.png') }}" class="img-fluid" alt="main_logo"
                        style="width: 40px;">
                    </div>
                    <div class="col-md-1  text-left border-left mt-3">
                        <img src="{{ asset('assets/images/unnamed.png') }}" class="img-fluid" alt="main_logo"
                        style="width: 50px;">
                    </div>
                </div>
                {{-- </div> --}}
            </div>
            <div class="bg-main-page col-12 mt-3 make-header mobile-header">
                {{-- <div class="container-fluid"> --}}
                <div class="mobile-row">
                    <div class="w-80 pt-3 pl-2">
                        <img src="{{ asset('assets/images/kwssip.png') }}" class="img-fluid" alt="main_logo"
                            style="width: 180px;">
                        <h5 class="mobile-heading text-white">GRIEVANCE REDRESSAL MECHANISM
                            <br />
                            <span style="font-size: 0.6rem">KWSSIP |
                                {{ \Carbon\Carbon::now()->format('d F Y') }}</span>
                        </h5>
                    </div>
                    <div class="w-20 pt-3 pl-2">
                        <div class="row">
                            <div class="col-md-6 text-right pr-1">
                                <img src="{{ asset('assets/images/sg.png') }}" class="img-fluid" alt="main_logo"
                                style="width: 30px;">
                            </div>
                            <div class="col-md-6 text-right pr-0">
                                <img src="{{ asset('assets/images/unnamed.png') }}" class="img-fluid" alt="main_logo"
                                style="width: 40px;">
                            </div>
                        </div>
                    
                    </div>
                </div>
                 <div class="w-100 text-right">
                    <div id="google_translate_element"></div>
                    <a target="_blank" class="btn btn-link text-white font-weight-bolder"
                        href="{{ route('front.anonymous') }}./#googtrans(en|en)">English</a>
                    <a target="_blank" class="btn btn-link text-white font-weight-bolder"
                        href="{{ route('front.anonymous') }}./#googtrans(en|ur)">Urdu</a>
                    <a target="_blank" class="btn btn-link text-white font-weight-bolder"
                        href="{{ route('front.anonymous') }}./#googtrans(en|sd)">Sindhi</a>
                </div> 
                {{-- </div> --}}
            </div>
        </div>
        <div class="container-fluid p-4  text-left " id="getPrint">
            <div class=" m-auto">
                <div class="row">
                    <div class="col-2 text-right">

                    </div>
                    <div class="col-10 text-left pt-3 my-element" style=" padding-top:2.4rem;">

                        {{-- <p style="font-size: 1.2rem"><span class="bg-dark text-white">COMPLAINT TYPE REPORT</span></p>
                        <h5 style="font-size: 0.8rem"> DATE: {{ \Carbon\Carbon::now()->format('d F Y') }}
                        </h5> --}}
                    </div>
                    <div class="col-12 mt-2">
                        <div class="card my-4">
                            <div class="card-header bg-grey">
                                <div class="row">
                                    <div class="col-9">
                                        <h5>Anonymous Complaint...</h5>
                                    </div>
                                    <div class="col-3">


                                        {{-- <button onclick="translateTo('en')">English</button>
                                        <btton onclick="translateTo('ur')">Urdu</button> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="card-body px-4 pb-2" style="">
                                {{-- {{ dd($errors) }} --}}
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                {{-- <form role="form" method="get" action="{{ route('front.home') }}"
                                    enctype="multipart/form-data">
                                    <div class="row">
            
                                        <div class="form-group col-md-3 p-3">
                                            <label>Customer Number</label>
                                            <input type="text" class="form-control border-bottom border-1 border-dark"
                                                placeholder="Enter Customer Number for search ..." name="search" required
                                                value="{{ old('search') }}" />
                                            <button type="submit"
                                                class="btn btn-lg btn-primary btn-lg w-20 mt-4 mb-0">Search</button>
                                        </div>
                                    </div>
                                </form> --}}

                                <form role="form" method="POST" action="{{ route('front.compalaint.store') }}"
                                    enctype="multipart/form-data" id="complaint-form">
                                    @csrf

                                    {{-- <div class="col-6 card-body px-4 pb-2 ">
                                            <div class="row border border-2 border-dark p-2">
                                                <h5>Consumer Informarion...</h5>
                                                <div class="form-group col-md-3 p-3">
                                                    <label>Consumer #<span class="item-required">*</span></label>
                                                    <input type="text" class="form-control border-bottom border-1 border-dark"
                                                        value="@if ($customer != null){{ $customer->customer_id }}@endif" disabled />
                                                </div>
                                                <div class="form-group col-md-3 p-3">
                                                    <label>Consumer Name<span class="item-required">*</span></label>
                                                    <input type="text" class="form-control border-bottom border-1 border-dark"
                                                        value="@if ($customer != null){{ $customer->customer_name }}@endif" disabled />
                                                </div>
                                                <div class="form-group col-md-3 p-3">
                                                    <label>Town<span class="item-required">*</span></label>
                                                    <input type="text" class="form-control border-bottom border-1 border-dark"
                                                        value="@if ($customer != null){{ $customer->town }}@endif" disabled />
                                                </div>
                                                <div class="form-group col-md-3 p-3">
                                                    <label>Sub Town<span class="item-required">*</span></label>
                                                    <input type="text" class="form-control border-bottom border-1 border-dark"
                                                        value="@if ($customer != null){{ $customer->sub_town }}@endif" disabled />
                                                </div>
                                            </div>
                                        </div> --}}

                                    {{-- <div class="col-12 card-body px-4 pb-2 ">
                                            <div class="row  border border-2 border-dark p-2">

                                            </div>
                                        </div> --}}
                                    <div class="col-12 card-body " style="background-color: #f8f8f8;">
                                        {{-- <h5>Complaint Informarion...</h5> --}}
                                        <div class="row">
                                            {{-- <div class="form-group col-md-3 p-3">
                                                <label>Consumer # on BILL </label>
                                                <input type="text"
                                                    class="form-control border-bottom border-1 border-dark"
                                                    placeholder="Enter Consumer Number Here..." name="customer_num"
                                                    value="{{ old('customer_num') }}" />
                                            </div> --}}
                                            <div class="form-group col-md-3 p-3">
                                                <label>Applicant Name</label>
                                                <input type="text"
                                                    class="form-control border-bottom border-1 border-dark"
                                                    placeholder="Enter Person  Name Here..." name="customer_name"
                                                    value="{{ old('customer_name') }}"  />
                                            </div>
                                            <div class="form-group col-md-3 p-3">
                                                <label>Applicant Phone Number</label>
                                                <input type="tel"
                                                    class="form-control border-bottom border-1 border-dark"
                                                    placeholder="Enter Phone Number Here..." name="phone"
                                                    value="{{ old('phone') }}"  />
                                            </div>
                                            <div class="form-group col-md-3 p-3">
                                                <label>Applicant CNIC</label>
                                                <input type="tel"
                                                    class="form-control border-bottom border-1 border-dark"
                                                    placeholder="Enter Phone Number Here..." name="customer_cnic"
                                                    value="{{ old('customer_cnic') }}" />
                                            </div>
                                            <div class="form-group col-md-3 p-3">
                                                <label>Applicant Email</label>
                                                <input type="email"
                                                    class="form-control border-bottom border-1 border-dark"
                                                    placeholder="Enter Email Here..." name="email"
                                                    value="{{ old('email') }}" />
                                            </div>
                                            <div class="form-group col-md-3 p-3">
                                                <label>Select Project<span class="item-required">*</span></label>
                                                <select name="town_id" id="town_id"
                                                    class="form-control select2 border-dark" required>
                                                    <option selected disabled>-- Select Project --</option>
                                                    @foreach ($town as $row)
                                                        <option value="{{ $row->id }}">{{ $row->town }}

                                                        </option>
                                                    @endforeach
                                                </select>
                                                @if ($customer != null)
                                                    <input type="hidden" name="customer_id"
                                                        value="@if (isset($customer->customer_id)) {{ $customer->id }} @endif" />
                                                @endif
                                            </div>
                                            <div class="form-group col-md-3 p-3">
                                                <label>Select Project Location<span class="item-required">*</span></label>
                                                <select name="sub_town_id" id="sub_town_id"
                                                    class="form-control select2 border-dark" required>
                                                    <option selected disabled>-- Select Project Location --</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3 p-3">
                                                <label>Applicant Person Address</label>
                                                <input type="text"
                                                    class="form-control border-bottom border-1 border-dark"
                                                    placeholder="Enter Address Here..." name="address"
                                                    value="{{ old('address') }}" />
                                            </div>
                                            <div class="form-group col-md-3 p-3">
                                                <label>Applicant Person Nearest Land Mark</label>
                                                <input type="text"
                                                    class="form-control border-bottom border-1 border-dark"
                                                    placeholder="Enter Nearest Land Mark Here..." name="landmark"
                                                    value="{{ old('landmark') }}"  />
                                            </div>

                                            <div class="form-group col-md-3 p-3">
                                                <label>Select Complaint Type<span
                                                        class="item-required">*</span></label>
                                                <select name="type_id" id="type_id"
                                                    class="form-control select2 border-dark" required>
                                                    <option selected disabled>-- Select Complaint Type --</option>

                                                    @foreach ($type as $row)
                                                        <option value="{{ $row->id }}">{{ $row->title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3 p-3">
                                                <label>Select Grievance<span class="item-required">*</span></label>
                                                <select name="subtype_id" id="subtype_id"
                                                    class="form-control select2 border-dark" required>
                                                    <option selected disabled>-- Select Grivence --</option>
                                                </select>
                                            </div>
                                            {{-- <div class="form-group col-md-3 p-3">
                                                <label>Select Priority<span class="item-required">*</span></label>
                                                <select name="prio_id" class="form-control select2 border-dark"
                                                    required>
                                                    @foreach ($prio as $row)
                                                        <option value="{{ $row->id }}">{{ $row->title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div> --}}
                                            {{-- <div class="form-group col-md-3 p-3">
                                                <label>Select Source<span class="item-required">*</span></label>
                                                <select name="source" class="form-control select2 border-dark"
                                                    required>
                                                    @foreach ($source as $row)
                                                        <option value="{{ $row->title }}">{{ $row->title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div> --}}
                                            {{-- <div class="form-group col-md-3 p-3">
                                                    <label>Title<span class="item-required">*</span></label>
                                                    <input type="text" class="form-control border-bottom border-1 border-dark"
                                                        placeholder="Enter Sub Town Here..." name="title" required
                                                        value="{{ old('title') }}" />
                                                </div> --}}
                                            <div class="form-group col-md-3 p-3">
                                                <label>Description<span class="item-required">*</span></label>
                                                <textarea class="form-control border-bottom border-1 border-dark" placeholder="Enter Description Here..."
                                                    name="description" required>{{ old('description') }}</textarea>
                                            </div>
                                            {{--
                                            <div class="form-group col-md-3 p-3">
                                                <label>Picture</label>
                                                <input type="file"
                                                    class="form-control border-bottom border-1 border-dark"
                                                    name="image" value="{{ old('image') }}" />
                                            </div>
                                            --}}
                                            <div class="form-group col-md-3 p-3">
                                                {!! NoCaptcha::renderJs() !!}
                                                {!! NoCaptcha::display() !!}
                                                <button type="submit"
                                                    class="btn btn-lg btn-primary btn-lg mt-4 mb-0" id="submit-button">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- @if ($customer != null) --}}
                                    {{-- @endif --}}

                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (session('success'))
        <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Congratulation you have Registered your
                            Complaint</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Your Registered Complaint Number is <b>{{ session('success') }}</b>
                    </div>
                    <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                    </div>
                </div>
            </div>
        </div>
    @endif
    {{-- <button type="button"onclick="getPrint()" class="btn btn-primary">print</button> --}}

    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/simplebar.min.js') }}"></script>
    <script src='{{ asset('assets/js/daterangepicker.js') }}'></script>
    <script src='{{ asset('assets/js/jquery.stickOnScroll.js') }}'></script>
    <script src="{{ asset('assets/js/chroma.min.js') }}"></script>
    <script src="{{ asset('assets/js/ifbreakpoint.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <script src="{{ asset('assets/js/theme.switcher.js') }}"></script>
    <script src="{{ asset('assets/js/d3.min.js') }}"></script>
    <script src="{{ asset('assets/js/leaflet.js') }}"></script>

    <script src="{{ asset('assets/js/map.world.js') }}"></script>
    <script src="{{ asset('assets/js/map.euro.js') }}"></script>
    <script src="{{ asset('assets/js/map.us.js') }}"></script>
    <script src="{{ asset('assets/js/maps.custom.js') }}"></script>
    <!-- select2 -->
    <script src="{{ asset('assets/js/jquery.sparkline.min.js') }}"></script>

    <script src="{{ asset('assets/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/apexcharts.custom.js') }}"></script>
    <script src='{{ asset('assets/js/jquery.dataTables.min.js') }}'></script>
    <script src='{{ asset('assets/js/dataTables.bootstrap4.min.js') }}'></script>
    <script>
        $(document).ready(function() {
            $('#submit-button').click(function() {
                $('#submit-button').prop('disabled', true);
            });
        });
    </script>
    <script>
        $('#dataTable-1').DataTable({
            autoWidth: true,
            "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "bPaginate": false,
            "bFilter": true,
            "bSort": true,
            "aaSorting": [
                [1, "asc"]
            ],
            "aoColumnDefs": [{
                "bSortable": false,
                "aTargets": [0]
            }, {
                "bSortable": true,
                "aTargets": [1]
            }, {
                "bSortable": false,
                "aTargets": [2]
            }],
            "lengthMenu": [
                [16, 32, 64, -1],
                [16, 32, 64, "All"]
            ]
        });
        $('#dataTable-2').DataTable({
            "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "bPaginate": false,
            "bFilter": true,
            "bSort": true,
            "aaSorting": [
                [1, "asc"]
            ],
            "aoColumnDefs": [{
                "bSortable": false,
                "aTargets": [0]
            }, {
                "bSortable": true,
                "aTargets": [1]
            }, {
                "bSortable": false,
                "aTargets": [2]
            }],
            autoWidth: true,
            lengthMenu: [
                [16, 32, 64, -1],
                [16, 32, 64, "All"]
            ],
            language: {
                search: '',
                searchPlaceholder: "Search..."
            },
            order: [],
            //   columnDefs: [
            //     { targets: 'no-sort', orderable: false }
            //   ],
            dom: "<'row align-items-center'<'col-sm-12 col-md-6 text-muted mb-2'i>" +
                "<'col-sm-12 col-md-6 text-muted mb-2'f>>" +
                "<'row mb-4'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5 text-muted'l><'col-sm-12 col-md-7'p>>",
        });

        //custom search input
        $('.dataTables_filter input').removeClass('form-control-sm');
        $('.dataTables_filter input').addClass('form-control');

        //custom page #
        $('.dataTables_length select').removeClass('form-control-sm');
        $('.dataTables_length select').addClass('form-control');
    </script>
    <script src='{{ asset('assets/js/jquery.mask.min.js') }}'></script>
    <script src='{{ asset('assets/js/select2.min.js') }}'></script>
    <script src='{{ asset('assets/js/jquery.steps.min.js') }}'></script>
    <script src='{{ asset('assets/js/jquery.validate.min.js') }}'></script>
    <script src='{{ asset('assets/js/jquery.timepicker.js') }}'></script>
    <script src='{{ asset('assets/js/dropzone.min.js') }}'></script>
    <script src='{{ asset('assets/js/uppy.min.js') }}'></script>
    <script src='{{ asset('assets/js/ion.rangeSlider.min.js') }}'></script>
    <script src='{{ asset('assets/js/jQuery.tagify.min.js') }}'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $(document).ready(function() {
            console.log("check");

            @if (session('success'))
                toastr.success('Your Compaint has been Registered Successfully...');
                $('#successModal').modal('show');
                // toastr.success('{{ session('success') }}');
            @endif
            @if ($errors->any())
                console.log("check");
                @foreach ($errors->all() as $error)
                    toastr.error('{{ $error }}');
                @endforeach
            @endif
        });
    </script>
    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>

    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE
            }, 'google_translate_element');
        }
    </script>
    {{-- <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                includedLanguages: 'en,ur',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                autoDisplay: false
            }, 'google_translate_element');
            // $('#:2.container').css('display', 'none');
        }

        // Function to trigger translation to a specific language
        function translateTo(language) {
            var selector = 'a.VIpgJd-ZVi9od-xl07Ob-lTBxed';
            var languageLinks = document.querySelectorAll(selector);
            if (languageLinks.length > 0) {
                for (var i = 0; i < languageLinks.length; i++) {
                    var languageLink = languageLinks[i];
                    var languageText = languageLink.querySelector('span').textContent.trim();
                    if (languageText.toLowerCase() === language.toLowerCase()) {
                        languageLink.click();
                        return;
                    }
                }
            }
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script> --}}

    </script>
    </script>

    <script src='{{ asset('assets/js/quill.min.js') }}'></script>
    <script>
        $(document).ready(function() {
            $('#complaint-form').submit(function(e) {
                e.preventDefault();
                //var isEmpty = false;
                //$(this).find('input[type="text"], input[type="tel"], input[type="email"], textarea, select')
                //    .each(function() {
                //        var value = $(this).val();
                //        if (!value || value.trim() === '') {
                           // if ($(this).attr('name') != 'customer_num') {
                                //$(this).addClass('is-invalid');
                                //isEmpty = true;
                                //var fieldName = $(this).attr('name');
                                // console.log('check');
                                //toastr.error('Please fill in ' + fieldName + ' field.');
                            //}
                        //} else {
                //             $(this).removeClass('is-invalid');
                //         }
                //     });

                //if (isEmpty) {
                //    return false;
                //}
                this.submit();
            });
        });
    </script>

    <!-- select2 -->
    <script>
        $('.select2').select2({
            theme: 'bootstrap4',
        });
        $('.select2-multi').select2({
            multiple: true,
            theme: 'bootstrap4',
        });

        $('.drgpicker').daterangepicker({
            singleDatePicker: true,
            timePicker: false,
            showDropdowns: true,
            locale: {
                format: 'MM/DD/YYYY'
            }
        });

        $('.time-input').timepicker({
            'scrollDefault': 'now',
            'zindex': '9999' /* fix modal open */
        });

        /** date range picker */
        if ($('.datetimes').length) {
            $('.datetimes').daterangepicker({
                timePicker: true,
                startDate: moment().startOf('hour'),
                endDate: moment().startOf('hour').add(32, 'hour'),
                locale: {
                    format: 'M/DD hh:mm A'
                }
            });
        }

        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }

        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf(
                    'month')]
            }
        }, cb);

        cb(start, end);

        $('.input-placeholder').mask("00/00/0000", {
            placeholder: "__/__/____"
        });
        $('.input-zip').mask('00000-000', {
            placeholder: "____-___"
        });
        $('.input-money').mask("#.##0,00", {
            reverse: true
        });
        $('.input-phoneus').mask('(000) 000-0000');
        $('.input-mixed').mask('AAA 000-S0S');
        $('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
            translation: {
                'Z': {
                    pattern: /[0-9]/,
                    optional: true
                }
            },
            placeholder: "___.___.___.___"
        });

        // editor
        var editor = document.getElementById('editor');

        if (editor) {
            var toolbarOptions = [
                [{
                    'font': []
                }],
                [{
                    'header': [1, 2, 3, 4, 5, 6, false]
                }],
                ['bold', 'italic', 'underline', 'strike'],
                ['blockquote', 'code-block'],

                [{
                    'header': 1
                }, {
                    'header': 2
                }],
                [{
                    'list': 'ordered'
                }, {
                    'list': 'bullet'
                }],
                [{
                    'script': 'sub'
                }, {
                    'script': 'super'
                }],
                [{
                    'indent': '-1'
                }, {
                    'indent': '+1'
                }], // outdent/indent
                [{
                    'direction': 'rtl'
                }], // text direction

                [{
                    'color': []
                }, {
                    'background': []
                }], // dropdown with defaults from theme
                [{
                    'align': []
                }],

                ['clean'] // remove formatting button
            ];

            var quill = new Quill(editor, {
                modules: {
                    toolbar: toolbarOptions
                },
                theme: 'snow'
            });
        }

        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

        //ion-rangeslider
        $(".js-range-slider").ionRangeSlider({
            type: "double",
            min: 0,
            max: 1000,
            from: 200,
            to: 500,
            grid: true
        });

        var tinput = $('input[name=tags-jquery]').tagify({
                whitelist: [{
                    "id": 1,
                    "value": "some string"
                }]
            })
            .on('add', function(e, tagName) {
                console.log('JQEURY EVENT: ', 'added', tagName)
            })
            .on("invalid", function(e, tagName) {
                console.log('JQEURY EVENT: ', "invalid", e, ' ', tagName);
            });

        // get the Tagify instance assigned for this jQuery input object so its methods could be accessed
        var jqTagify = tinput.data('tagify');
    </script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
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
        $("#type_id").on("change", function() {
            var type_id = $(this).val();
            $.ajax({
                type: "get",
                url: "{{ route('subtype.by.type') }}",
                data: {
                    'type_id': type_id,
                },
                success: function(data) {
                    $("#subtype_id").html("");
                    var your_html = "";
                    $.each(data, function(key, val) {
                        console.log(val);
                        your_html += "<option value=" + val['id'] + ">" + val['title'] +
                            "</option>"
                    });
                    $("#subtype_id").append(your_html); //// For Append
                },
                error: function() {
                    console.log(data);
                }
            });
        });
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    {{-- <script src="{{ asset('assets/js/material-dashboard.min.js?v=3.0.0') }}"></script> --}}
</body>

</html>
