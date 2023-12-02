@extends('layouts.main')

@section('content-grafik')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Grafik Produk</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
        <div class="row-mr-5">
            <a href="/grafikTotalProduk" class="btn btn-warning btn-sm-3 mb-3 mr-3">
              <i class="nav-icon fas fa-chart-pie"></i> Grafik Jumlah Produk Per Kategori
            </a>
            <a href="/grafikTotalHargaProduk" class="btn btn-success btn-sm-3 mb-3">
              <i class="nav-icon fas fa-chart-bar"></i> Grafik Total Harga Produk Per Kategori
            </a>
        </div>
      <div class="card">
        <div class="card-body">
            <div id="grafik-stok" style="width:100%; height:400px;"></div> <br>
            <hr>
            <br>
            <div id="grafik-pie" style="width:100%; height:400px;"></div>
        </div>
            <!-- /.card-header -->
            <!-- /.card-body -->

    </div>
</div>

</section>
<script type="text/javascript">
    var stok = @json($total_stok);
    var kategori = @json($kategori);

    document.addEventListener('DOMContentLoaded', function () {
        Highcharts.chart('grafik-stok', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Grafik Total Stok Produk Per Kategori',
                align: 'center'
            },
            xAxis: {
                categories: kategori
            },
            yAxis: {
                title: {
                    text: 'Total Stok Produk'
                }
            },
            plotOptions: {
                series: {
                    allowPointSelect: true
                }
            },
            series: [
                {
                    name: 'Total Stok Produk',
                    data: stok
                }
            ]
        });
    });
</script>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
       var jmlStok = <?php echo json_encode($sum_stok); ?>;
       var options = {
           chart: {
               renderTo: 'grafik-pie',
               plotBackgroundColor: null,
               plotBorderWidth: null,
               plotShadow: false
           },
           title: {
               text: 'Grafik Total Harga Produk dengan Pie Diagram'
           },
           tooltip: {
               pointFormat: '{series.name}: <b> {point.percentage}%<b>'
           },
           plotOptions: {
               pie: {
                   allowPointSelect: true,
                   cursor: 'pointer',
                   dataLabels: {
                       enable: true,
                       color: '#000000',
                       connectColor: '#000000',
                       formatter: function() {
                           return '<b>' + this.point.name + '<b> : ' + this.point.percentage + '%';
                       }
                   }
               }
           },
           series: [{
               type: 'pie',
               name: 'Total'
           }]
       }
       myarray = [];
       $.each(jmlStok, function(index, val) {
           myarray[index] = [val.category_name,val.jmlStok];
       });
       options.series[0].data = myarray;
       chart = new Highcharts.Chart(options);
   });
</script>
// {{-- <script src="https://code.highcharts.com/modules/exporting.js"></script>
// <script src="https://code.highcharts.com/modules/export-data.js"></script>
// <script src="https://code.highcharts.com/modules/accessibility.js"></script> --}}
@endsection

