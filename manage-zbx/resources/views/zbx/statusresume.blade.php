@extends('layout.main')

@section('content')

    <div class="box-header with-border">
        <h3 class="box-title">Status dos Servidores</h3>
    </div>
    <div class="box-body">
        <!-- small box -->
        <div class="row">
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th></th>
                        <th>Host</th>
                        <th>IP</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                    @foreach($hosts as $h)
                        <tr>
                            <td></td>
                            <td>{{ $h->host }}</td>
                            <td>{{ $h->ip }}</td>

                            @if ($h->available == 0)
                                 <td><span class="label label-warning">Inactive</span></td>
                                <td><i class="ion ion-flash-off"></i></td>
                            @elseif($h->available == 1)
                                <td><span class="label label-success">OnLine</span></td>
                                <td><i class="ion ion-ios-pulse-strong"></i></td>
                            @elseif($h->available == 2)
                                <td><span class="label label-danger">OffLine</span></td>
                                <td><i class="ion ion-power"></i></td>
                            @endif
                        </tr>
                    @endforeach
                </table>
            </div>
        <!-- /.box-body -->
        </div>
        <!-- end row -->
    </div>
    <!-- /.box-body -->

@stop