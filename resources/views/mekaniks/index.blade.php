<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ReyLab - CRUD Mekanik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8f9fc;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            background-color: #4e73df;
            color: white;
            padding-top: 56px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            z-index: 1;
        }

        .sidebar a {
            padding: 10px;
            color: white;
            text-decoration: none;
            display: block;
        }

        .sidebar a:hover {
            background-color: #224abe;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            padding-top: 76px;
        }

        .navbar {
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            z-index: 2;
        }

        .navbar-brand {
            color: #4e73df;
            font-weight: bold;
        }

        .navbar-nav .nav-item .nav-link {
            color: #4e73df;
        }

        .navbar-nav .nav-item .nav-link:hover {
            color: #224abe;
        }

        .card {
            border-radius: 10px;
            border: none;
        }

        .pagination .page-link {
            color: #4e73df;
            background-color: #ffffff;
            border: 1px solid #dee2e6;
        }

        .pagination .page-item.active .page-link {
            color: #ffffff;
            background-color: #4e73df;
            border-color: #4e73df;
        }

        .pagination .page-item.disabled .page-link {
            color: #6c757d;
            background-color: #ffffff;
            border-color: #dee2e6;
        }

        .pagination .page-link:hover {
            color: #ffffff;
            background-color: #224abe;
            border-color: #224abe;
        }
    </style>
</head>

<body>

    <!-- Top Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><b class="text-primary">ReyLab</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <div class="search-bar ms-auto">
                    <!-- Search Form -->
                    <form class="d-flex" action="{{ route('search') }}" method="GET">
                        <input class="form-control me-2" type="search" name="query" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-primary" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-heading text-center py-4">
            <h1 class="h4"><b>ReyLab</b></h1>
        </div>
        <ul class="list-unstyled components">
            <li>
                <a href="{{ route('mekaniks.index') }}"><i class="fas fa-tools me-2"></i> Mekanik</a>
            </li>
            <li>
                <a href="{{ route('servis.index') }}"><i class="fas fa-wrench me-2"></i> Servis</a>
            </li>
            <li>
            <a href="{{ route('logout') }}"><i class="fas fa-sign-out-alt me-2"></i></i>Logout</a>
            </li>
        </ul>
    </div>

    <!-- Content -->
    <div class="content">
        <!-- Main Content -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-header bg-primary text-white">
                            <b>CRUD Mekanik</b>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('mekaniks.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
                            <table id="datatable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th> <!-- New column -->
                                        <th scope="col">ID Mekanik</th>
                                        <th scope="col">ID Servis</th>
                                        <th scope="col">Nama Mekanik</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">No Telp</th>
                                        <th scope="col">Waktu</th>
                                        <th scope="col" style="width: 20%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($mekaniks as $index => $mekanik)
                                    <tr>
                                        <td>{{ $index + 1 }}</td> <!-- New column data -->
                                        <td>{{ $mekanik->id_mekanik }}</td>
                                        <td>{{ $mekanik->id_servis }}</td>
                                        <td>{{ $mekanik->nama }}</td>
                                        <td>{{ $mekanik->alamat }}</td>
                                        <td>{{ $mekanik->notelp }}</td>
                                        <td>{{ $mekanik->created_at }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin Ingin Menghapus Data nya?');" action="{{ route('mekaniks.destroy', ['mekanik' => $mekanik->id_mekanik]) }}" method="POST">
                                                <a href="{{ route('mekaniks.show', $mekanik->id_mekanik) }}" class="btn btn-sm btn-info">Show</a>
                                                <a href="{{ route('mekaniks.edit', $mekanik->id_mekanik) }}" class="btn btn-sm btn-warning">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger text-dark">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" class="text-center alert alert-danger">
                                            Data Mekanik tidak ditemukan.
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            <div class="d-flex justify-content-end">
                                {{ $mekaniks->links('vendor.pagination.bootstrap-4') }}
                            </div>
                        </div>
                        <div class="card-footer text-center bg-primary text-white">
                            <b> ReyLab Copyright &copy; 2024 </b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>
    <script>
        new DataTable('#datatable');
    </script>
    <script>
    // SweetAlert Messages
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
