@extends('layout.admin')

@section('title', 'Dashboard Admin - KaryaTera')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Dashboard Admin</h2>
    <a href="#" class="btn btn-dark"><i class="fas fa-plus"></i> Tambah Layanan</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <h5 class="fw-semibold mb-3">Daftar Layanan</h5>
        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Layanan</th>
                    <th>Deskripsi</th>
                    <th>Icon</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Advertising</td>
                    <td>Pembuatan konten iklan kreatif untuk perusahaan atau brand.</td>
                    <td><i class="fas fa-bullhorn fa-lg"></i></td>
                    <td class="text-center">
                        <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Documentation</td>
                    <td>Dokumentasi foto dan video profesional untuk event dan perusahaan.</td>
                    <td><i class="fas fa-camera fa-lg"></i></td>
                    <td class="text-center">
                        <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Company Profile</td>
                    <td>Pembuatan video profil dan branding untuk perusahaan.</td>
                    <td><i class="fas fa-building fa-lg"></i></td>
                    <td class="text-center">
                        <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
