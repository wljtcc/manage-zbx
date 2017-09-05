<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>ZABBIX - Manage Dashboard</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="./css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="./css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="./css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="./css/_all-skins.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>

    <body class="hold-transition skin-blue sidebar-mini">

    <div>

        <section class="overlay-wrapper">
            <h1>
                ZABBIX
                <small>List hosts</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Zabbix</a></li>
                <li><a href="#">Host</a></li>
                <li class="active">List</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- AREA CHART -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Memory</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="box-body chart-responsive">
                                <div class="chart" id="sales-chart" style="height: 300px; position: relative;"></div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-md-12">
                    <!-- AREA CHART -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Area Chart</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="box-body chart-responsive">
                                <div class="chart" id="memory-chart" style="height: 300px; position: relative;"></div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>

    <!-- jQuery 3 -->
    <script src="./js/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="./js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="./js/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="./js/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="./js/adminlte.min.js"></script>
    <!-- FLOT CHARTS -->
    <script src="./js/jquery.flot.js"></script>
    <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
    <script src="./js/jquery.flot.resize.js"></script>
    <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
    <script src="./js/jquery.flot.pie.js"></script>
    <!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
    <script src="./js/jquery.flot.categories.js"></script>
    <!-- Morris.js charts -->
    <script src="./js//raphael.min.js"></script>
    <script src="./js/morris.min.js"></script>

    <script>
        //DONUT CHART
        var donut = new Morris.Donut({
            element: 'sales-chart',
            resize: true,
            colors: ["#3c8dbc", "#00a65a", "#ac030b"],
            data: [
                {label: "Total", value: 100},
                {label: "Available", value: 70},
                {label: "Used", value: 30}
            ],
            hideHover: 'auto'
        })

        var memory = new Morris.Donut({
            element: 'memory-chart',
            resize: true,
            colors: ["#3c8dbc", "#00a65a", "#ac030b"],
            data: [
                {label: "Total", value: 100},
                {label: "Available", value: 70},
                {label: "Used", value: 30}
            ],
            hideHover: 'auto',
            formatter: function (y, data) { return y + '%' }
        })

        /*
         * END DONUT CHART
         */


    </script>

    </body>

</html>