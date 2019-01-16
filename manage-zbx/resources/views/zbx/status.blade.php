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
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-yellow-active"><i class="ion ion-flash-off"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-number">{{ $h->host }}</span>
                                <span class="info-box-text">{{ $h->ip }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                @elseif($h->available == 1)
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-green-active"><i class="ion ion-ios-pulse-strong"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-number">{{ $h->host }}</span>
                                <span class="info-box-text">{{ $h->ip }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                @elseif($h->available == 2)
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-red-active"><i class="ion ion-power"></i></span>

                            <div class="info-box info-box-content">
                                <span class="info-box-number">{{ $h->host }}</span>
                                <span class="info-box-text">{{ $h->ip }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
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
    // Refresh DIV for update stats servers
    var settime = window.setInterval(reload, 2000);
    function reload(){
        $('#content').load(' #content');
    };
@stop