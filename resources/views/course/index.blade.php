@extends('layouts.app')
@section('title')
    {{$title}}
@endsection
@section('content')

    <section class="section-box-2">
        <div class="box-head-single none-bg">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8 text-center">
                    <h1 class="section-title-large mb-30 wow animate__animated animate__fadeInUp">There Are {{$Counttraining}} Training / Course<br />Here For you!</h1>
                    <h5 class="mb-30 text-muted wow animate__animated animate__fadeInUp">Find your course or training here</h5>
                </div>
                <hr>
            </div>
        </div>
    </section>

    <section class="section-box mt-80">

        <div class="container">
            <div class="row flex-row-reverse">
                <!-- Item Training & News -->
                <div class="col-lg-3 col-md-12 col-sm-12 col-12 float-right">
                    <div class="sidebar-shadow sidebar-news-small">
                        <h5 class="sidebar-title">Upcoming Job</h5>
                        <div class="post-list-small" id="jobvacancy-list"></div>
                    </div>
                    <div class="sidebar-shadow sidebar-news-small">
                        <h5 class="sidebar-title">News</h5>
                        <div class="post-list-small" id="news-list"> </div>
                    </div>
                </div>
                <!-- End Training & News -->

                <!-- Page content -->
                <div class="col-lg-6 col-md-12 col-sm-12 col-12 float-right">
                    <div class="content-page">
                        <div class="box-filters-job mt-15 mb-10">
                            <div class="row">
                                <div class="col-lg-7" >
                                    <div class="showing"></div>

                                </div>
                                <div class="col-lg-5 text-lg-end mt-sm-15">
                                    <div class="display-flex2">
                                        <div class="dropdown dropdown-sort">
                                            <button class="btn dropdown-toggle" type="button" id="dropdownSort" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static">
                                                <span id="currentSort">Newest Post</span> <i class="fi-rr-angle-small-down"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownSort">
                                                <li><a class="dropdown-item" href="#" data-sort="newest">Newest Post</a></li>
                                                <li><a class="dropdown-item" href="#" data-sort="oldest">Oldest Post</a></li>
                                                <li><a class="dropdown-item" href="#" data-sort="rating">Rating Post</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                                    <div class="list-recent-training-course">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="paginations">
                            <ul class="pager">

                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End page content -->

                <!-- Filter -->
                <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="sidebar-shadow none-shadow mb-30">
                        <h5 class="sidebar-title">Filters</h5>
                        <div class="sidebar-filters">
                            <div class="filter-block mb-30">
                                <h5 class="medium-heading mb-15">Training name</h5>
                                <div class="form-group">

                                    <input type="text" id="filterTrainingname" class="form-control form-icons" placeholder="Search Training name" />
                                </div>
                            </div>
                            <h5 class="sidebar-title"></h5>
                            <div class="filter-block mb-30">
                                <h5 class="medium-heading mb-15">Category</h5>
                                <div class="form-group">
                                    <input type="text" id="filterCategory" class="form-control form-icons" placeholder="Search Category" />
                                </div>
                            </div>
                            <h5 class="sidebar-title"></h5>
                            <div class="filter-block mb-30">
                                <h5 class="medium-heading mb-15">Jenis sertifikasi</h5>
                                <div class="form-group">
                                    <ul class="list-checkbox">
                                        <div id="filterJenissertifikasi">
                                            <!-- Pratinjau filter akan ditampilkan di sini -->
                                        </div>

                                    </ul>
                                </div>
                            </div>

                            <div class="filter-block mb-30">
                                <h5 class="medium-heading mb-15">Type Course</h5>
                                <div class="form-group">
                                    <ul class="list-checkbox">
                                        <div id="filterTypecourse">
                                            <!-- Pratinjau filter akan ditampilkan di sini -->
                                        </div>

                                    </ul>
                                </div>
                            </div>
                            <h5 class="sidebar-title"></h5>


                            <h5 class="sidebar-title"></h5>

                            <div class="buttons-filter">
                                <button id="applyFilterBtn" class="btn btn-default">Apply filter</button>
                                <button id="resetFilterBtn" class="btn">Reset filter</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Filter -->

            </div>
        </div>
    </section>

    <section class="section-box mt-50 mb-60">
        <div class="container">
            <div class="box-newsletter">
                <h5 class="text-md-newsletter">Sign up to get</h5>
                <h6 class="text-lg-newsletter">the latest jobs</h6>
                <div class="box-form-newsletter mt-30">
                    <form class="form-newsletter">
                        <input type="text" class="input-newsletter" value="" placeholder="contact.alithemes@gmail.com" />
                        <button class="btn btn-default font-heading icon-send-letter">Subscribe</button>
                    </form>
                </div>
            </div>
            <div class="box-newsletter-bottom">
                <div class="newsletter-bottom"></div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>

        document.addEventListener('DOMContentLoaded', function() {
            const input = document.getElementById('filterSalary');

            // Check if input element exists
            if (input) {
                // Function to format input as currency
                function formatCurrency(value) {
                    // Remove all non-numeric characters
                    value = value.replace(/\D/g, '');

                    // Format the number with commas
                    return value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                }

                // Event listener to format input on change
                input.addEventListener('input', function(e) {
                    // Get the input value and format it
                    const formattedValue = formatCurrency(e.target.value);
                    // Set the formatted value back to input
                    e.target.value = formattedValue;
                });

                // Optional: Restrict input to numeric values only
                input.addEventListener('keypress', function(e) {
                    if (e.key < '0' || e.key > '9') {
                        e.preventDefault();
                    }
                });
            } else {
                console.error('Element with id "filterSalary" not found');
            }
        });

        $(document).ready(function() {
            // Mengambil data upcoming trainings
            $.ajax({
                url: '/fetch-upcoming-jobvacancy',
                method: 'GET',
                success: function(response) {
                    $('#jobvacancy-list').html(response);
                }
            });

            // Mengambil data news
            $.ajax({
                url: '/fetch-upcoming-news',
                method: 'GET',
                success: function(response) {
                    $('#news-list').html(response);
                }
            });
        });

        $(document).ready(function() {

            console.log('Document ready'); // Debugging line
            previewFilter();
            filterTypeCourse();
            // filterExperienceLevel();
            // filterEducation();
            let currentSort = 'newest'; // Default sorting

            function loadContent(page = 1, filters = {}, sortBy = currentSort) {
                $.ajax({
                    url: '/get-content-training-course',
                    method: 'GET',
                    data: {
                        page: page,
                        ...filters,
                        sortBy: sortBy
                    },
                    success: function(response) {
                        //console.log('Success response:', response); // Debugging line
                        $('.content-page .list-recent-training-course').html(response.content);
                        $('.content-page .paginations').html(response.pagination);
                        $('.content-page .showing').html(response.showing);
                        $('.content-page .sort-and-view').html(response.sort_and_view);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching data:', error);
                    }
                });
            }

            // Test function call directly
            loadContent(); // Test if the function works when called directly

            // Event handler for sorting
            $(document).on('click', '.dropdown-menu a', function(e) {
                e.preventDefault();
                currentSort = $(this).data('sort');
                $('#currentSort').text($(this).text()); // Update button text with selected sort
                console.log('Sort by selected:', currentSort); // Debugging line
                const filters = {
                    trainingname: $('#filterTrainingname').val(),
                    category: $('#filterCategory').val(),
                    salary: $('#filterSalary').val(),
                    jenissertifikasi: $('.filterJenissertifikasi:checked').map(function() {
                        return $(this).val();
                    }).get(),
                    type: $('.filterTypecourse:checked').map(function() {
                        return $(this).val();
                    }).get(),

                    // experiencelevel: $('.filterExperiencelevel:checked').map(function() {
                    //     return $(this).val();
                    // }).get(),
                    // education: $('.filterEducation:checked').map(function() {
                    //     return $(this).val();
                    // }).get(),
                };
                loadContent(1, filters, currentSort); // Fetch content with new sort
            });

            $(document).on('click', '.pager-number', function(e) {
                e.preventDefault();
                const page = $(this).data('page');
                console.log('Pager number clicked, page:', page); // Debugging line
                const filters = {
                    trainingname: $('#filterTrainingname').val(),
                    category: $('#filterCategory').val(),
                    salary: $('#filterSalary').val(),

                    jenissertifikasi: $('.filterJenissertifikasi:checked').map(function() {
                        return $(this).val();
                    }).get(),
                    type: $('.filterTypecourse:checked').map(function() {
                        return $(this).val();
                    }).get(),

                    // experiencelevel: $('.filterExperiencelevel:checked').map(function() {
                    //     return $(this).val();
                    // }).get(),
                    // education: $('.filterEducation:checked').map(function() {
                    //     return $(this).val();
                    // }).get(),
                };
                loadContent(page, filters, currentSort); // Fetch content with current sort
            });

            $(document).on('click', '.pager-prev', function(e) {
                e.preventDefault();
                const page = $(this).data('page');
                console.log('Pager prev clicked, page:', page); // Debugging line
                if (page) {
                    const filters = {
                        trainingname: $('#filterTrainingname').val(),
                        category: $('#filterCategory').val(),
                        salary: $('#filterSalary').val(),
                        jenissertifikasi: $('.filterJenissertifikasi:checked').map(function() {
                            return $(this).val();
                        }).get(),
                        type: $('.filterTypecourse:checked').map(function() {
                            return $(this).val();
                        }).get(),

                        // experiencelevel: $('.filterExperiencelevel:checked').map(function() {
                        //     return $(this).val();
                        // }).get(),
                        // education: $('.filterEducation:checked').map(function() {
                        //     return $(this).val();
                        // }).get(),
                    };
                    loadContent(page, filters, currentSort); // Fetch content with current sort
                }
            });

            $(document).on('click', '.pager-next', function(e) {
                e.preventDefault();
                const page = $(this).data('page');
                console.log('Pager next clicked, page:', page); // Debugging line
                if (page) {
                    const filters = {
                        trainingname: $('#filterTrainingname').val(),
                        category: $('#filterCategory').val(),
                        salary: $('#filterSalary').val(),
                        jenissertifikasi: $('.filterJenissertifikasi:checked').map(function() {
                            return $(this).val();
                        }).get(),
                        type: $('.filterTypecourse:checked').map(function() {
                            return $(this).val();
                        }).get(),

                        // experiencelevel: $('.filterExperiencelevel:checked').map(function() {
                        //     return $(this).val();
                        // }).get(),
                        // education: $('.filterEducation:checked').map(function() {
                        //     return $(this).val();
                        // }).get(),
                    };
                    loadContent(page, filters, currentSort); // Fetch content with current sort
                }
            });

            $('#applyFilterBtn').on('click', function() {
                const filters = {
                    trainingname: $('#filterTrainingname').val(),
                    category: $('#filterCategory').val(),
                    salary: $('#filterSalary').val(),
                    jenissertifikasi: $('.filterJenissertifikasi:checked').map(function() {
                        return $(this).val();
                    }).get(),

                    type: $('.filterTypecourse:checked').map(function() {
                        return $(this).val();
                    }).get(),

                    // experiencelevel: $('.filterExperiencelevel:checked').map(function() {
                    //     return $(this).val();
                    // }).get(),
                    // education: $('.filterEducation:checked').map(function() {
                    //     return $(this).val();
                    // }).get(),
                };
                console.log('Apply filter button clicked'); // Debugging line
                loadContent(1, filters, currentSort); // Fetch content with filters and current sort
            });

            $('#resetFilterBtn').on('click', function() {
                $('#filterTrainingname').val('');
                $('#filterCategory').val('');
                $('#filterSalary').val('');
                $('#filterexperiencelevel').val('');
                $('#filtereducation').val('');
                $('.filterJenissertifikasi').prop('checked', false);
                $('.filterTypecourse').prop('checked', false);
                // $('.filterexperiencelevel').prop('checked', false);
                // $('.filtereducation').prop('checked', false);
                console.log('Reset filter button clicked'); // Debugging line
                loadContent(1, {}, currentSort); // Fetch content without filters and current sort
            });
        });

        function previewFilter() {
            const filters = {
                skill: $('#filterJenissertifikasi').val(),
                jenissertifikasi: $('.filterJenissertifikasi:checked').map(function() {
                    return $(this).val();
                }).get()
            };
            $.ajax({
                url: '/preview-filter-jenis-sertifikasi-course', // Endpoint untuk pratinjau filter
                method: 'GET',
                data: filters,
                success: function(response) {
                    $('#filterJenissertifikasi').html(response);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching filter preview:', error);
                }
            });
        }

        function filterTypeCourse() {
            const filters = {
                worklocation: $('.filterTypecourse:checked').map(function() {
                    return $(this).val();
                }).get(),

            };
            $.ajax({
                url: '/filter-type-course', // Endpoint untuk pratinjau filter
                method: 'GET',
                data: filters,
                success: function(response) {
                    $('#filterworklocation').html(response);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching filter preview:', error);
                }
            });
        }

        // function filterExperienceLevel() {
        //     const filters = {
        //         experiencelevel: $('.filterExperiencelevel:checked').map(function() {
        //             return $(this).val();
        //         }).get(),
        //
        //     };
        //     $.ajax({
        //         url: '/filter-experience-level-job', // Endpoint untuk pratinjau filter
        //         method: 'GET',
        //         data: filters,
        //         success: function(response) {
        //             $('#filterexperiencelevel').html(response);
        //         },
        //         error: function(xhr, status, error) {
        //             console.error('Error fetching filter preview:', error);
        //         }
        //     });
        // }
        //
        // function filterEducation() {
        //     const filters = {
        //         education: $('.filterEducation:checked').map(function() {
        //             return $(this).val();
        //         }).get(),
        //
        //     };
        //     $.ajax({
        //         url: '/filter-education-job', // Endpoint untuk pratinjau filter
        //         method: 'GET',
        //         data: filters,
        //         success: function(response) {
        //             $('#filtereducation').html(response);
        //         },
        //         error: function(xhr, status, error) {
        //             console.error('Error fetching filter preview:', error);
        //         }
        //     });
        // }

    </script>
@endsection

