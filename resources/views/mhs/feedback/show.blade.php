@extends('layouts.app')

@section('css')
<style>
     table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
          .biodata td {
            padding: 4px 8px;
            vertical-align: top;
        }
         .station-title {
            font-weight: bold;
            font-size: 13px;
            background: #eee;
        }

        .feedback td {
            padding: 5px 8px;
            vertical-align: top;
            border: 1px solid #999;
        }

</style>

@endsection

@section('breadcrumb')
   <!-- START BREADCRUMB -->
   <ul class="breadcrumb">
    <li ><a href="{{ route('dashbord')}}">Dashboard</a></li>
    <li ><a href="{{ route('mahasiswa.feedback.index')}}">Feedback</a></li>
        <li class="active">Lihat Feedback</li>
</ul>
<!-- END BREADCRUMB -->
@endsection
@section('page-title')
<div class="page-title">
    <h2><span class="fa fa-arrow-circle-o-left"></span> Feedback Ujian - {{ $feedback->ujian_name }}</h2>
</div>
@endsection
@section('content')

<!-- START WIDGETS -->
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><strong>Feedback </strong>{{ $feedback->jenis_feedback }}</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                </ul>
            </div>
            <div class="panel-body">
            <table class="biodata">
                <tr>
                    <td style="width: 300px;"><strong>Nama Mahasiswa</strong></td>
                    <td style="width: 2%;">:</td>
                    <td>{{ $feedback->nama }}</td>
                </tr>
                <tr>
                    <td><strong>NPM</strong></td>
                    <td>:</td>
                    <td>{{ $feedback->npm }}</td>
                </tr>
            </table>

            @foreach($feedback->detail_feedbacks as $feeds)
                @php $feed = feedparser($feeds->feedback)  @endphp
                    <table class="feedback">
                        <tr>
                            <td colspan="2" class="station-title">Feedback {{ $feeds->station }}</td>
                        </tr>
                        <tr>
                            <td style="width: 25%;"><strong>Kelebihan</strong></td>
                            <td>{{$feed['kelebihan']}}</td>
                        </tr>
                        <tr>
                            <td><strong>Kekurangan</strong></td>
                            <td>{{$feed['kekurangan']}}</td>
                        </tr>
                        <tr>
                            <td><strong>Saran</strong></td>
                            <td>{{$feed['saran']}}</td>
                        </tr>
                    </table>
                    @endforeach



            </div>


            <div class="panel-footer">
                <a href="{{ route('mahasiswa.feedback.index') }}" class="btn btn-default">Kembali</a>

            </div>
        </div>

        </form>
    </div>
</div>
<!-- END WIDGETS -->




@endsection

@section('javascript')

@endsection
