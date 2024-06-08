<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />

        <title>Kategori Wisata</title>
        <meta content="" name="description" />
        <meta content="" name="keywords" />

        <!-- Favicons -->
        <link href="{{asset('backend/assets/img/apple-touch-icon.png')}}" rel="icon" />

        <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"/>

        <!-- Vendor CSS Files -->
        <link href="{{asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
        <link href="{{asset('backend/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet" />
        <link href="{{asset('backend/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet" />
        <link href="{{asset('backend/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet" />
        <link href="{{asset('backend/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet" />
        <link href="{{asset('backend/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet" />

        <!--Get your own code at fontawesome.com-->
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

        <!-- Template Main CSS File -->
        <link href="{{asset('backend/assets/css/style.css')}}" rel="stylesheet" />
    </head>

    <body>
        <!-- ======= Header ======= -->
        <header id="header" class="header fixed-top d-flex align-items-center">
            <div class="d-flex align-items-center justify-content-between">
                <a href="/" class="logo d-flex align-items-center">
                    <img src="{{asset('backend/assets/img/niceadmin.png')}}" alt="IMAGELOGO" />
                    <span class="d-none d-lg-block">Destination Tourism</span>
                </a>
                <i class="bi bi-list toggle-sidebar-btn"></i>
            </div>
            <!-- End Logo -->

            <nav class="header-nav ms-auto">
                <ul class="d-flex align-items-center">
                    <li class="nav-item pe-3">
                        <div class="nav-item mb-0">
                            <span class="d-lg-block d-none" id="dateTime"></span>
                        </div>
                    </li>

                    <li class="nav-item dropdown pe-3">
                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                            <img src="{{ asset('backend/assets/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle" />
                            <span class="d-none d-md-block dropdown-toggle ps-2">{{-- {{ Auth::user()->username }} --}}ADMIN</span>
                        </a><!-- End Profile Image Icon -->

                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                            <li class="dropdown-header">
                                <h6>{{-- {{ Auth::user()->username }} --}}ADMIN</h6>
                                <span>{{-- {{ session('current_role') }} --}}</span>
                            </li>
                            <li><hr class="dropdown-divider" /></li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                    <i class="bi bi-gear"></i>
                                    <span>Account Settings</span>
                                </a>
                            </li>

                            <li><hr class="dropdown-divider" /></li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{-- {{ route('logout') }} --}}">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Sign Out</span>
                                </a>
                            </li>
                        </ul><!-- End Profile Dropdown Items -->
                    </li>
                    <!-- End Profile Nav -->
                </ul>
            </nav>
            <!-- End Icons Navigation -->
        </header>
        <!-- End Header -->

        <!-- ======= Sidebar ======= -->
        <aside id="sidebar" class="sidebar">
            <ul class="sidebar-nav" id="sidebar-nav">
                <!-- Start Dashboard Nav -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="/">
                        <i class="bi bi-grid"></i>
                        <span>Dashboard</span>
                    </a>
                </li><!-- End Dashboard Nav -->

                <!-- Start like Nav -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="/like">
                        <i class="bi bi-grid"></i>
                        <span>Data Like</span>
                    </a>
                </li><!-- End like Nav -->

                <!-- Start Users Nav -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="/user">
                        <i class="bi bi-grid"></i>
                        <span>Data Users</span>
                    </a>
                </li><!-- End Users Nav -->

                <!-- Start Daerah Wisata Nav -->
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#daerahWisata-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-journal-text"></i><span>Daerah Wisata</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="daerahWisata-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="/daerahWisata/">
                                <i class="bi bi-circle"></i><span>Daerah Wisata Data</span>
                            </a>
                        </li>
                        <li>
                            <a href="/daerahWisata/create" >
                                <i class="bi bi-circle"></i><span>Add Daerah Wisata</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Daerah Wisata Nav -->

                <!-- Start Kategori Wisata Nav -->
                <li class="nav-item">
                    <a class="nav-link " data-bs-target="#kategoriWisata-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-journal-text"></i><span>Kategori Wisata</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="kategoriWisata-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="/kategoriWisata" class="active">
                                <i class="bi bi-circle"></i><span>Kategori Wisata Data</span>
                            </a>
                        </li>
                        <li>
                            <a href="/kategoriWisata/create">
                                <i class="bi bi-circle"></i><span>Add Kategori Wisata</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Kategori Wisata Nav -->

                <!-- Start Tempat Wisata Nav -->
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#tempatWisata-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-journal-text"></i><span>Tempat Wisata</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="tempatWisata-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="/tempatWisata">
                                <i class="bi bi-circle"></i><span>Tempat Wisata Data</span>
                            </a>
                        </li>
                        <li>
                            <a href="/tempatWisata/create">
                                <i class="bi bi-circle"></i><span>Add Tempat Wisata</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Tempat Wisata Nav -->

                <!-- Start Fasilitas Wisata Nav -->
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#fasilitasWisata-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-journal-text"></i><span>Fasilitas Wisata</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="fasilitasWisata-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="/fasilitasWisata">
                                <i class="bi bi-circle"></i><span>Fasilitas Wisata Data</span>
                            </a>
                        </li>
                        <li>
                            <a href="/fasilitasWisata/create">
                                <i class="bi bi-circle"></i><span>Add Fasilitas Wisata</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Fasilitas Wisata Nav -->

                <!-- Start Image Wisata Nav -->
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#imageWisata-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-journal-text"></i><span>Image Wisata</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="imageWisata-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="/imageWisata">
                                <i class="bi bi-circle"></i><span>Image Wisata Data</span>
                            </a>
                        </li>
                        <li>
                            <a href="/imageWisata/create">
                                <i class="bi bi-circle"></i><span>Add Image Wisata</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Image Wisata Nav -->
            </ul>
        </aside>
        <!-- End Sidebar-->

        <main id="main" class="main">
            <div class="pagetitle">
                <h1>Form Validation</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item "><a href="/kategoriWisata">Kategori Wisata</a></li>
                        <li class="breadcrumb-item active">Edit Kategori Wisata</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->

            <section class="section">
                <div class="row">
                    <div class="card col-lg">
                        <div class="card-body">
                            <h5 class="card-title">Edit Data Kategori Wisata</h5>

                            <!-- Custom Styled Validation with Tooltips novalidate -->
                            <form action="{{ route('kategoriWisata.update', $kategoriWisata->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group mb-3">
                                    <label class="font-weight-bold" for="name">Nama Kategori Wisata</label>
                                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $kategoriWisata->name ?? old('name') }}" placeholder="Masukkan Nama Kategori Wisata">

                                    <!-- Error message untuk name -->
                                    @error('name')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-md btn-primary me-3">SAVE</button>
                                <button type="reset" class="btn btn-md btn-warning">RESET</button>
                            </form>
                            <!-- End Custom Styled Validation with Tooltips -->
                        </div>
                    </div>
                </div>
            </section>
        </main><!-- End #main -->

        <!-- ======= Footer ======= -->
        <footer id="footer" class="footer">
            <div class="copyright">
                &copy; Copyright <strong><span>Destination Tourism Recomendation Systems</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </footer><!-- End Footer -->


        <a
            href="#"
            class="back-to-top d-flex align-items-center justify-content-center"
            ><i class="bi bi-arrow-up-short"></i
        ></a>

        <!-- Vendor JS Files -->
        <script src="{{asset('backend/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
        <script src="{{asset('backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('backend/assets/vendor/chart.js/chart.umd.js')}}"></script>
        <script src="{{asset('backend/assets/vendor/echarts/echarts.min.js')}}"></script>
        <script src="{{asset('backend/assets/vendor/quill/quill.min.js')}}"></script>
        <script src="{{asset('backend/assets/vendor/tinymce/tinymce.min.js')}}"></script>
        <script src="{{asset('backend/assets/vendor/php-email-form/validate.js')}}"></script>

        <!-- Template Main JS File -->
        <script src="{{asset('backend/assets/js/main.js')}}"></script>

        {{-- Library Sweatalert --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            // get datetime to view in header
            document.addEventListener("DOMContentLoaded", function() {
                getDateTime();
                // getSelamat();
            });

            function getDateTime() {
                const hari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
                const bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September",
                    "Oktober", "November", "Desember"
                ];
                const today = new Date();
                let D = today.getDay();
                let M = today.getMonth();
                let Y = today.getFullYear();
                let d = today.getDate();
                let h = ('0' + today.getHours()).substr(-2);
                let m = today.getMinutes();
                let s = today.getSeconds();
                m = m < 10 ? m = "0" + m : m;
                s = s < 10 ? s = "0" + s : s;
                document.getElementById('dateTime').innerHTML = hari[D] + ", " + d + " " + bulan[M] + " " + Y + " • " + h +
                    ":" + m + ":" + s + " WIB";
                setTimeout(getDateTime, 1000);
            }

            // function getSelamat() {
            //     var dt = new Date().getHours();
            //     if (dt >= 5 && dt <= 9) {
            //         document.getElementById("selamat").innerHTML =
            //             "Pagi";
            //     } else if (dt >= 10 && dt <= 14) {
            //         document.getElementById("selamat").innerHTML =
            //             "Siang";
            //     } else if (dt >= 15 && dt <= 17) {
            //         document.getElementById("selamat").innerHTML =
            //             "Sore";
            //     } else {
            //         document.getElementById("selamat").innerHTML =
            //             "Malam";
            //     }
            //     setTimeout(getSelamat, 1000);
            // }

            // Message with SweetAlert if user tries to access unauthorized route
            @if(session('unauthorized'))
                Swal.fire({
                    icon: 'error',
                    title: 'Akses Ditolak!',
                    text: '{{ session('unauthorized') }}',
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                });
            @endif

            //message with sweetalert
            @if(session('success'))
                Swal.fire({
                    icon: "success",
                    title: "BERHASIL",
                    text: "{{ session('success') }}",
                    showConfirmButton: false,
                    timer: 2000
                });
            @elseif(session('error'))
                Swal.fire({
                    icon: "error",
                    title: "GAGAL!",
                    text: "{{ session('error') }}",
                    showConfirmButton: false,
                    timer: 2000
                });
            @endif
        </script>
    </body>
</html>
