@extends('layouts.app')
@section('main')
<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2>Input Data Sortir</h2>
            </div>
            <div class="body">
                <h6>Form Sorting Salary</h6>
                <hr>
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Bulan Payroll</label>
                        <select class="form-control" name="periode" required>
                            <option value='#'>Pilih Bulan</option>
                            @foreach ($data as $item)
                                <option value="{{$item->id_periode}}">{{$item->bulan}} - {{$item->tahun}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-warning">Clear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection