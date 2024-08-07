@extends('layouts.app')
@section('title')
    {{$title}}
@endsection
@section('content')

    <section class="section-box-2">
        <div class="box-head-single none-bg">
            <div class="container">
                <h4>There Are {{$Count}} Jobs<br />Here For you!</h4>
                <div class="row mt-15 mb-40">
                    <div class="col-lg-7 col-md-9">
                            <span class="text-mutted">Discover your next career move, freelance gig, or
                                internship</span>
                    </div>
                    <div class="col-lg-5 col-md-3 text-lg-end text-start">
                        <ul class="breadcrumbs mt-sm-15">
                            <li><a href="#">Recent Jobs</a></li>
                            <li>Jobs listing</li>
                        </ul>
                    </div>
                </div>
                <div class="box-shadow-bdrd-15 box-filters">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="box-search-job">
                                <form class="form-search-job">
                                    <input type="text" id="filterJobtitle"  class="input-search-job" placeholder="Search  Job title" />
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="d-flex job-fillter">
                                <div class="d-block d-lg-flex">
                                    <div class="form-group select-style select-style-icon">
                                        <select id="jenisBeritaTop" class="form-control form-icons select-active">
                                            <!-- Options will be loaded here via AJAX -->
                                        </select>
                                        <i class="fi-rr-briefcase"></i>
                                    </div>

                                </div>
                                <div class="box-button-find">
                                    <button  id="applyFilterBtn"  class="btn btn-default float-right">Find Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="archive-header pt-50 pb-50">
        <div class="container">
            <h3 class="mb-30 text-center w-75 mx-auto">
                Relevant news and more for you. Welcome to our blog
            </h3>
            <div class="text-center">
                <div class="sub-categories">
                    <a href="#" class="btn btn-tags-sm mb-10 mr-5">Recruitment</a>
                    <a href="#" class="btn btn-tags-sm mb-10 mr-5">Branding</a>
                    <a href="#" class="btn btn-tags-sm mb-10 mr-5">Workplage</a>
                    <a href="#" class="btn btn-tags-sm mb-10 mr-5">Job Tips</a>
                    <a href="#" class="btn btn-tags-sm mb-10 mr-5">Contributors</a>
                </div>
            </div>
        </div>
    </div>
    <div class="post-loop-grid">
        <div class="container">
            <div class="content-page">
                <div class="row pr-15 pl-15  list-recent-jobs">

                </div>
                <div class="paginations">
                    <ul class="pager">

                    </ul>
                </div>
            </div>
        </div>
    </div>
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



        $(document).ready(function() {
            // Mengambil data upcoming trainings
            $.ajax({
                url: '/fetch-upcoming-trainings',
                method: 'GET',
                success: function(response) {
                    $('#training-list').html(response);
                }
            });

            // Mengambil data news
            $.ajax({
                url: '/fetch-upcoming-jobvacancy',
                method: 'GET',
                success: function(response) {
                    $('#news-list').html(response);
                }
            });
        });

        $(document).ready(function() {

            console.log('Document ready'); // Debugging line

            loadJenisBerita();
            loadJenisBeritaTop();
            //filterEducation();
            let currentSort = 'newest'; // Default sorting

            function loadContent(page = 1, filters = {}, sortBy = currentSort) {
                $.ajax({
                    url: '/get-content-news-list',
                    method: 'GET',
                    data: {
                        page: page,
                        ...filters,
                        sortBy: sortBy
                    },
                    success: function(response) {
                        //console.log('Success response:', response); // Debugging line
                        $('.content-page .list-recent-jobs').html(response.content);
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
                    // jobtype: $('#filterJobtype').val(),
                    jobtitle: $('#filterJobtitle').val(),
                    jenisberita: $('#jenisBeritaSelect').val(),
                    jenisberitatop: $('#jenisBeritaTop').val(),
                };
                loadContent(1, filters, currentSort); // Fetch content with new sort
            });

            $(document).on('click', '.pager-number', function(e) {
                e.preventDefault();
                const page = $(this).data('page');
                console.log('Pager number clicked, page:', page); // Debugging line
                const filters = {
                    jobtitle: $('#filterJobtitle').val(),
                    jenisberita: $('#jenisBeritaSelect').val(),
                    jenisberitatop: $('#jenisBeritaTop').val(),
                };
                loadContent(page, filters, currentSort); // Fetch content with current sort
            });

            $(document).on('click', '.pager-prev', function(e) {
                e.preventDefault();
                const page = $(this).data('page');
                console.log('Pager prev clicked, page:', page); // Debugging line
                if (page) {
                    const filters = {
                        jobtitle: $('#filterJobtitle').val(),
                        jenisberita: $('#jenisBeritaSelect').val(),
                        jenisberitatop: $('#jenisBeritaTop').val(),
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
                        jobtitle: $('#filterJobtitle').val(),
                        jenisberita: $('#jenisBeritaSelect').val(),
                        jenisberitatop: $('#jenisBeritaTop').val(),
                    };
                    loadContent(page, filters, currentSort); // Fetch content with current sort
                }
            });

            $('#applyFilterBtn').on('click', function() {
                const filters = {
                    jobtitle: $('#filterJobtitle').val(),
                        jenisberita: $('#jenisBeritaSelect').val(),
                        jenisberitatop: $('#jenisBeritaTop').val(),
                };
                console.log('Apply filter button clicked'); // Debugging line
                loadContent(1, filters, currentSort); // Fetch content with filters and current sort
            });
            $('#applyFilterBtnBottom').on('click', function() {
                const filters = {
                    jobtitle: $('#filterJobtitle').val(),
                        jenisberita: $('#jenisBeritaSelect').val(),
                        jenisberitatop: $('#jenisBeritaTop').val(),
                };
                console.log('Apply filter button clicked'); // Debugging line
                loadContent(1, filters, currentSort); // Fetch content with filters and current sort
            });
            $('#resetFilterBtn').on('click', function() {
                $('#filterJobtitle').val('');
                $('#jenisBeritaSelect').val('');
                $('#jenisBeritaTop').val('');

                console.log('Reset filter button clicked'); // Debugging line
                loadContent(1, {}, currentSort); // Fetch content without filters and current sort
            });
        });

        function loadJenisBerita() {
            const url = 'load-filter-jenis-berita'; // Ganti dengan URL endpoint Anda

            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    const $selectElement = $('#jenisBeritaSelect');

                    // Clear existing options
                    $selectElement.empty();

                    // Add a default option
                    $selectElement.append('<option value="">Select Jenis Berita</option>');

                    // Loop through the data and create new option elements
                    $.each(data, function(index, item) {
                        $selectElement.append(
                            $('<option></option>').val(item.nama).text(item.nama)
                        );
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching salary ranges:', error);
                }
            });
        }

        function loadJenisBeritaTop() {
            const url = 'load-filter-jenis-berita'; // Ganti dengan URL endpoint Anda

            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    const $selectElement = $('#jenisBeritaTop');

                    // Clear existing options
                    $selectElement.empty();

                    // Add a default option
                    $selectElement.append('<option value="">Select Jenis Berita</option>');

                    // Loop through the data and create new option elements
                    $.each(data, function(index, item) {
                        $selectElement.append(
                            $('<option></option>').val(item.nama).text(item.nama)
                        );
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching salary ranges:', error);
                }
            });
        }


    </script>
@endsection
