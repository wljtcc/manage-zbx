@extends('layout.main')

@section('content')

    <div class="box-header with-border">
        <h3 class="box-title">Status dos Servidores</h3>
    </div>
    <div class="box-body">
        <!-- small box -->
        <div class="row" id="monitoring">
            @foreach($hosts as $h)
                @if ($h->available == 0)
                    <div class="col-md-4">
                        <div class="small-box bg-yellow-active">
                            <div class="inner">
                                <h3> {{ $h->host }} </h3>
                                <p> {{ $h->ip }} </p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-flash-off"></i>
                            </div>
                            <a href="#" class="small-box-footer"> Inativo </a>
                        </div>
                    </div>
                @elseif($h->available == 1)
                    <div class="col-md-4">
                        <div class="small-box bg-green-active">
                            <div class="inner">
                                <h3>{{ $h->host }}</h3>
                                <p> {{ $h->ip }} </p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-ios-pulse-strong"></i>
                            </div>
                            <a href="#" class="small-box-footer"> Online </a>
                        </div>
                    </div>
                @elseif($h->available == 2)
                    <div class="col-md-4">
                        <div class="small-box bg-red-active">
                            <div class="inner">
                                <h3>{{ $h->host }}</h3>
                                <p> {{ $h->ip }} </p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-power"></i>
                            </div>
                            <a href="#" class="small-box-footer"> OffLine </a>
                        </div>
                    </div>
                @else
                    <div class="col-md-4">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $h->host }}</h3>
                                <p>Status</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-refresh"></i>
                            </div>
                            <a href="#" class="small-box-footer"> ERROR </a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <!-- end row -->
    </div>
    <!-- /.box-body -->

@stop

@section('jscript')
    var settime = window.setInterval(upload, 5000);
    function upload()
    {
    $('#content').load(". #content");
    }
@stop