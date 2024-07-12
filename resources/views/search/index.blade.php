@extends('layouts.app')

@section('title', 'Hasil Pencarian')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2>Hasil Pencarian</h2>
                <hr>
                <h3>Mekanik</h3>
                @if ($mekaniks->isEmpty())
                    <p>Data Mekanik tidak ditemukan.</p>
                @else
                    <ul>
                        @foreach ($mekaniks as $mekanik)
                            <li>{{ $mekanik->nama }}</li>
                            <!-- Tampilkan data lainnya sesuai kebutuhan -->
                        @endforeach
                    </ul>
                    <!-- {{ $mekaniks->links() }} -->
                @endif

                <hr>

                <h3>Servis</h3>
                @if ($servis->isEmpty())
                    <p>Data Servis tidak ditemukan.</p>
                @else
                    <ul>
                        @foreach ($servis as $abc)
                            <li>{{ $abc->jenis_servis }}</li>
                            <!-- Tampilkan data lainnya sesuai kebutuhan -->
                        @endforeach
                    </ul>
                    <!-- {{ $servis->links() }} -->
                @endif
            </div>
        </div>
    </div>
@endsection
