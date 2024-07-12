<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ReyLab - CRUD Servis</title>
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
            background-color: white;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-body {
            padding: 20px;
        }
        .card-title {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }
        .card-text {
            color: #6c757d;
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

    <!-- Main Content -->
    <div class="content">
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body">
                            <h3 class="card-title">ID Servis: {{ $servis->id_servis }}</h3>
                            <hr/>
                            <p class="card-text">Nama Mekanik: {{ $servis->mekanik->nama }}</p>
                            <p class="card-text">Jenis Servis: {{ $servis->jenis_servis }}</p>
                            <hr/>
                            <p class="card-text">Tanggal Servis: {{ $servis->tanggal_servis }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
