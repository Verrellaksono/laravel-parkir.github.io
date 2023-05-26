@extends('template.main')

@section('konten')
    <div class="col-6 mx-auto mt-5">
        <div class="card shadow">
            <form action="{{ url('update') }}/{{ $id }}" method="post">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h4 class="m-0 font-weight-bold text-secondary">
                        Update Data Parkir
                    </h4>
                </div>
                <div class="card-body">

                    <div class="card-body">
                        @csrf
                        @method('put')
                        <div class="form-group mb-2">
                            <label for="no_plat">No Plat</label>
                            <input type="text" class="form-control" id="no_plat" aria-describedby="no_plat"
                                name="no_plat" value="{{ $no_plat }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="jenis_kendaraan">Jenis Kendaraan</label>
                            <select name="jenis_kendaraan" id="jenis_kendaraan" class="form-control">
                                <option value="Motor" @if ($jenis_kendaraan === 'Motor') {{ selected }} @endif>
                                    Motor</option>
                                <option value="Mobil" @if ($jenis_kendaraan === 'Mobil') {{ selected }} @endif>
                                    Mobil</option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="jam_masuk">Jam Masuk</label>
                            <input type="datetime-local" class="form-control" id="jam_masuk" aria-describedby="jam_masuk"
                                name="jam_masuk" value="{{ $jam_masuk }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="jam_keluar">Jam Keluar</label>
                            <input type="datetime-local" class="form-control" id="jam_keluar" aria-describedby="jam_keluar"
                                name="jam_keluar" value="{{ $jam_keluar }}">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-end mb-2">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
