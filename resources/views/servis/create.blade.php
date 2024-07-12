<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ReyLab - Tambah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
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
            padding-top: 76px; /* Adjusted for the navbar height */
        }
        .navbar {
            background-color: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
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
    </style>
</head>
<body>

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
        </ul>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><b class="text-primary">ReyLab</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <form class="d-flex ms-auto my-2 my-lg-0">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="content">
        <!-- Main Content -->
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-body">
                            <form action="{{ route('servis.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">ID Servis</label>
                                    <input type="number" class="form-control @error('id_servis') is-invalid @enderror" name="id_servis" value="{{ old('id_servis') }}" placeholder="Input ID Servis">
                                    @error('id_servis')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nama Mekanik</label>
                                    <select name="id_mekanik" id="id_mekanik" class="form-select">
                                        <option selected disabled>Pilih Mekanik</option>
                                        @foreach ($mekanik as $data)
                                            <option value="{{$data->id_mekanik}}">{{$data->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Jenis Servis</label>
                                            <input type="text" class="form-control @error('jenis_servis') is-invalid @enderror" name="jenis_servis" value="{{ old('jenis_servis') }}" placeholder="Input Jenis Servis">
                                            @error('jenis_servis')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Tanggal Servis</label>
                                            <input type="date" class="form-control @error('tanggal_servis') is-invalid @enderror" name="tanggal_servis" value="{{ old('tanggal_servis') }}" placeholder="Input Tanggal Servis">
                                            @error('tanggal_servis')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                                    </div>
                                    <div class="col-6">
                                        <button type="reset" class="btn btn-warning btn-block">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
