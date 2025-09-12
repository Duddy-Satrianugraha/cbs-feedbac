@extends('layouts.app')

@section('css')

@endsection

@section('breadcrumb')
   <!-- START BREADCRUMB -->
   <ul class="breadcrumb">
    <li ><a href="{{ route('dashbord')}}">Dashboard</a></li>
        <li class="active">Daftar Feedback</li>
</ul>
<!-- END BREADCRUMB -->
@endsection
@section('page-title')
<div class="page-title">
    <h2><span class="fa fa-arrow-circle-o-left"></span> List feedback</h2>
</div>
@endsection
@section('content')

<!-- START WIDGETS -->
<div class="row">
                    <!-- START RESPONSIVE TABLES -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">

                                <div class="panel-heading">

                                    <h3 class="panel-title">List Feedback Mahasiswa </h3>

                                </div>

                                <div class="panel-body">

                                    <div class="row">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-actions">
                                            <thead>
                                                <tr>
                                                    <th width="50">Nomor</th>
                                                    <th width="400">jenis Feedback</th>
                                                    <th>Nama Ujian</th>
                                                    <th>action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr >
                                                    <td class="text-center">1</td>
                                                    <td> Osce </td>
                                                    <td>
                                                        Osce Semester 4 2024/2025
                                                    </td>
                                                    <td> <a href="#" class="btn btn-xs btn-info">Lihat</a> <a href="#" class="btn btn-xs btn-danger">Cetak</a> </td>
                                                </tr>
                                                  <tr >
                                                    <td class="text-center">2</td>
                                                    <td> Osoca </td>
                                                    <td>
                                                        Osoca Semester 4 2024/2025
                                                    </td>
                                                    <td> <a href="#" class="btn btn-xs btn-info">Lihat</a> <a href="#" class="btn btn-xs btn-danger">Cetak</a> </td>
                                                </tr>
                                            </tbody>
                                        </table>


                                    </div>
                                    </div>

                                </div>



                            </div>

                        </div>
                    </div>
                    <!-- END RESPONSIVE TABLES -->

</div>
<!-- END WIDGETS -->




@endsection

@section('javascript')
<script type="text/javascript" src="{{ asset('js/plugins/bootstrap/bootstrap-select.js')}}"></script>
@endsection
