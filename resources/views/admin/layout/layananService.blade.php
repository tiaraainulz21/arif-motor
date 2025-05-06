<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{{ asset('adminpage') }}/">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Arif Motor</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    @yield('css')

    <!-- Icon Kelola Data Pelanggan -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        .custom-shadow {
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            /* Bayangan merata semua sisi */
            border-radius: 10px;
        }
    </style>

</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        @include('admin.layout.navbar')

        @include('admin.layout.sidebar')

        <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content pt-3">
        <div class="card p-4 custom-shadow">
            <div class="card-header bg-white border-0 text-center mb-3">
                <h1 style="color: #074F0A;" class="m-0">
                    <i class="bi bi-tools"></i> <strong>Kelola Layanan Service</strong>
                </h1>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="#" class="btn" style="background-color: #074F0A; color: white;">
                    <i class="bi bi-plus-lg"></i> Tambah Layanan Service
                </a>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Cari..." aria-label="Search"
                        name="keyword">
                    <button class="btn" type="submit" style="background-color: #074F0A; color: white;">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
            </div>

            <table class="table table-bordered">
                <thead style="background-color: #074F0A; color: white;">
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No HP</th>
                        <th scope="col">Varian Motor</th>
                        <th scope="col">Jenis Service</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Jam Kedatangan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>mala</td>
                        <td>karangampel</td>
                        <td>089673804908</td>
                        <td>lampu</td>
                        <td>scoppie</td>
                        <td>tanggal</td>
                        <td>jam kedatangan</td>
                        <td>
                            <a href="#" class="btn btn-warning">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <a href="#" class="btn btn-danger">
                                <i class="bi bi-trash-fill"></i> Hapus
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


        <footer class="main-footer text-center py-3" style="background-color: #074F0A;">
        <div class="float-right d-none d-sm-block"></div>
        <strong class="text-white fw-bold">@Karya Kelompok 6 | 2025</strong>
        </footer>


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    @yield('js')
</body>

</html>
