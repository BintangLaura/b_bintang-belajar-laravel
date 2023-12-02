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
            <li class="breadcrumb-item active">Grafik Total Harga Produk</li>
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
            <a href="/grafikStokProduk" class="btn btn-success btn-sm-3 mb-3">
              <i class="nav-icon fas fa-chart-bar"></i> Grafik Jumlah Stok Produk Per Kategori
            </a>
        </div>
      <div class="card">
        <div class="card-body">
            <div id="grafik_harga" style="width:100%; height:400px;"></div> <br>
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
    var harga = @json($total_harga);
    var kategori = @json($kategori);

    document.addEventListener('DOMContentLoaded', function () {
        Highcharts.chart('grafik_harga', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Grafik Total Harga Produk Per Kategori',
                align: 'center'
            },
            xAxis: {
                categories: kategori
            },
            yAxis: {
                title: {
                    text: 'Total Harga Produk'
                }
            },
            plotOptions: {
                series: {
                    allowPointSelect: true
                }
            },
            series: [
                {
                    name: 'Total Harga Produk',
                    data: harga
                }
            ]
        });
    });
</script>

<script type="text/javascript">
     document.addEventListener('DOMContentLoaded', function () {
        var jmlHarga = <?php echo json_encode($sum_harga); ?>;
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
        $.each(jmlHarga, function(index, val) {
            myarray[index] = [val.category_name,val.harga];
        });
        options.series[0].data = myarray;
        chart = new Highcharts.Chart(options);
    });
</script>
@endsection

