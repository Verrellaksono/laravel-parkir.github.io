@extends('template.main')

@section('konten')
    <div class="container-fluid d-flex gap-3 my-3">
        <div style="height:100vh" class="col-8">
            <div class="card shadow h-100 mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h4 class="m-0 font-weight-bold text-secondary">
                        Data Parkir
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-stripped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Plat</th>
                                    <th>Jenis Kendaraan</th>
                                    <th>Jam Masuk</th>
                                    <th>Jam Keluar</th>
                                    <th>Total</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->no_plat }}</td>
                                        <td>
                                            <p class="text-capitalize">{{ $data->jenis_kendaraan }}</p>
                                        </td>
                                        <td>{{ $data->jam_masuk }}</td>
                                        <td>{{ $data->jam_keluar }}</td>
                                        <td><b>Rp {{ $data->total }}</b></td>
                                        <td class="d-flex gap-1">
                                            <a href="{{ url('edit') }}/{{ $data->id }}"
                                                class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                            <form action="{{ url('hapus') }}/{{ $data->id }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" value="Hapus" class="btn btn-danger btn-sm"><i
                                                        class="bi bi-trash3-fill"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <!-- Card Tambah Data -->
        <div class="col-4">
            <div class="card shadow">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h4 class="m-0 font-weight-bold text-secondary">
                        Tambah Data Parkir
                    </h4>
                </div>
                <div class="card-body">
                    <!-- Input Tambah Data Parkir -->
                    <form action="{{ url('proses') }}" method="post">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="no_plat">No Plat</label>
                            <input type="text" class="form-control" id="no_plat" aria-describedby="no_plat"
                                name="no_plat">
                        </div>
                        <div class="form-group mb-2">
                            <label for="jenis_kendaraan">Jenis Kendaraan</label>
                            <select name="jenis_kendaraan" id="jenis_kendaraan" class="form-control">
                                <option value="" selected>Pilih</option>
                                <option value="Motor">Motor</option>
                                <option value="Mobil">Mobil</option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="jam_masuk">Jam Masuk</label>
                            <input type="datetime-local" class="form-control" id="jam_masuk" aria-describedby="jam_masuk"
                                name="jam_masuk">
                        </div>
                        <div class="form-group mb-2">
                            <label for="jam_keluar">Jam Keluar</label>
                            <input type="datetime-local" class="form-control" id="jam_keluar" aria-describedby="jam_keluar"
                                name="jam_keluar">
                        </div>
                        <input type="submit" class="btn btn-primary col-12 mt-3" value="Tambah" name="simpan">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
