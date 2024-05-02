@extends('layouts.app')
@section('main')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if(session('create'))
<script>
    // Tampilkan pesan dengan SweetAlert
    Swal.fire({
        title: 'Success',
        text: '{{ session('create') }}',
        icon: 'success',
        confirmButtonText: 'OK'
    });
</script>
@endif
@if(session('update'))
<script>
    // Tampilkan pesan dengan SweetAlert
    Swal.fire({
        title: 'Update',
        text: '{{ session('update') }}',
        icon: 'success',
        confirmButtonText: 'OK'
    });
</script>
@endif
@if(session('delete'))
<script>
    // Tampilkan pesan dengan SweetAlert
    Swal.fire({
        title: 'Delete',
        text: '{{ session('delete') }}',
        icon: 'success',
        confirmButtonText: 'OK'
    });
</script>
@endif
<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2>Input Data User</h2>
            </div>
            <div class="body">
                <div class="d-flex justify-content-between">
                    <h6>Form Bank</h6>
                    <span>{{$data->nik_k}}</span>
                </div>
                <hr>
                <form action="{{url('change-password/'.$data->id_account)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" value="{{$data->nama}}" readonly>
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>

</div>
@endsection