@extends('admin.home.master')

@section('title')
    Calendar
@endsection

@section('css')
    <!-- third party css -->
    <link href="{{ asset('assets/css/vendor/fullcalendar.min.css') }}" rel="stylesheet" type="text/css">
    <!-- third party css end -->
    <!-- App css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="light-style">
    <link href="{{ asset('assets/css/app-dark.min.css') }}" rel="stylesheet" type="text/css" id="dark-style">
@endsection

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        @php
            $route = preg_replace('/(admin)|\d/i', '', str_replace('/', '', Request::getPathInfo()));
        @endphp
        {{-- {{ Breadcrumbs::render($route) }} --}}
        <!-- end page title -->

        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="d-grid">
                                    <button class="btn btn-lg font-16 btn-danger" id="btn-new-event"><i
                                            class="mdi mdi-plus-circle-outline"></i> Create New
                                        Event</button>
                                </div>
                                <div id="external-events" class="m-t-20">
                                    <br>
                                    <p class="text-muted">Drag and drop your event or click in the calendar
                                    </p>
                                    <div class="external-event bg-success-lighten text-success" data-class="bg-success">
                                        <i class="mdi mdi-checkbox-blank-circle me-2 vertical-middle"></i>New
                                        Theme Release
                                    </div>
                                    <div class="external-event bg-info-lighten text-info" data-class="bg-info">
                                        <i class="mdi mdi-checkbox-blank-circle me-2 vertical-middle"></i>My
                                        Event
                                    </div>
                                    <div class="external-event bg-warning-lighten text-warning" data-class="bg-warning">
                                        <i class="mdi mdi-checkbox-blank-circle me-2 vertical-middle"></i>Meet
                                        manager
                                    </div>
                                    <div class="external-event bg-danger-lighten text-danger" data-class="bg-danger">
                                        <i class="mdi mdi-checkbox-blank-circle me-2 vertical-middle"></i>Create
                                        New theme
                                    </div>
                                </div>


                                <div class="mt-5 d-none d-xl-block">
                                    <h5 class="text-center">How It Works ?</h5>

                                    <ul class="ps-3">
                                        <li class="text-muted mb-3">
                                            It has survived not only five centuries, but also the leap into
                                            electronic typesetting, remaining essentially unchanged.
                                        </li>
                                        <li class="text-muted mb-3">
                                            Richard McClintock, a Latin professor at Hampden-Sydney College
                                            in Virginia, looked up one of the more obscure Latin words,
                                            consectetur, from a Lorem Ipsum passage.
                                        </li>
                                        <li class="text-muted mb-3">
                                            It has survived not only five centuries, but also the leap into
                                            electronic typesetting, remaining essentially unchanged.
                                        </li>
                                    </ul>
                                </div>

                            </div> <!-- end col-->

                            <div class="col-lg-9">
                                <div class="mt-4 mt-lg-0">
                                    <div id="calendar"></div>
                                </div>
                            </div> <!-- end col -->

                        </div> <!-- end row -->
                    </div> <!-- end card body-->
                </div> <!-- end card -->

                <!-- Add New Event MODAL -->
                <div class="modal fade" id="event-modal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form class="needs-validation" name="event-form" id="form-event" novalidate="">
                                <div class="modal-header py-3 px-4 border-bottom-0">
                                    <h5 class="modal-title" id="modal-title">Event</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body px-4 pb-4 pt-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="control-label form-label">Event Name</label>
                                                <input class="form-control" placeholder="Insert Event Name" type="text"
                                                    name="title" id="event-title" required="">
                                                <div class="invalid-feedback">Please provide a valid event name</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="control-label form-label">Category</label>
                                                <select class="form-select" name="category" id="event-category"
                                                    required="">
                                                    <option value="bg-danger" selected="">Danger</option>
                                                    <option value="bg-success">Success</option>
                                                    <option value="bg-primary">Primary</option>
                                                    <option value="bg-info">Info</option>
                                                    <option value="bg-dark">Dark</option>
                                                    <option value="bg-warning">Warning</option>
                                                </select>
                                                <div class="invalid-feedback">Please select a valid event category</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <button type="button" class="btn btn-danger"
                                                id="btn-delete-event">Delete</button>
                                        </div>
                                        <div class="col-6 text-end">
                                            <button type="button" class="btn btn-light me-1"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success"
                                                id="btn-save-event">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div> <!-- end modal-content-->
                    </div> <!-- end modal dialog-->
                </div>
                <!-- end modal-->
            </div>
            <!-- end col-12 -->
        </div> <!-- end row -->

    </div> <!-- container -->
@endsection

@section('script')
    <!-- bundle -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>

    <!-- third party js -->
    <script src="{{ asset('assets/js/vendor/fullcalendar.min.js') }}"></script>
    <!-- third party js ends -->

    <!-- demo app -->
    <script src="{{ asset('assets/js/pages/demo.calendar.js') }}"></script>
    <!-- end demo js-->
@endsection