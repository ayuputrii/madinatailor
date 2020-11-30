<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png')}}">
        <link rel="icon" type="image/png" href="{{ asset('assets/img/n.jpg')}}">
        <title>
            Inventory Batch 1!
        </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style type="text/css">
        .box{
            width:600px;
            margin:0 auto;
        }
        html, body {
            background-color: lightpink;
            color: black;
            font-family: 'Tekton Pro', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }
        </style>
     </head>
 <body>
  <br />
  <div class="container">
   <h3 align="center">Madina Tailor</h3><br />

   <div class="row">
    <div class="col-md-7" align="right">
     <h4>Inventory</h4>
    </div>
    <div class="col-md-5" align="right">
     <a href="/barangmasuk/convert" class="btn btn-danger">Convert To PDF</a>
    </div>
   </div>
   <br />
   <div class="table-responsive">
    <table class="table table-striped table-bordered" style="background-color:black";>
        <table class="table tablesorter" id="">
            <thead class=" text-primary">
              <tr>
                <th>
                  Number
                </th>
                <th>
                  Code
                </th>
                <th>
                  Name
                </th>
                <th>
                  Specific
                </th>
                <th>
                  Location
                </th>
                <th>
                  Category
                </th>
                <th>
                  Amount
                </th>
                <th>
                  Condition
                </th>
                <th>
                  Type
                </th>
                <th>
                  Source
                </th>
              </tr>
            </thead>
            @foreach ($barang as $brg)
            <tbody>
              <tr>
                <td>{{ $loop->iteration}}</td>
                <td> {{ $brg -> kode_barang }} </td>
                <td> {{ $brg -> nama_barang }} </td>
                <td> {{ $brg -> spesifikasi }} </td>
                <td> {{ $brg -> lokasi_barang }} </td>
                <td> {{ $brg -> kategori }} </td>
                <td> {{ $brg -> jml_barang }} </td>
                <td> {{ $brg -> kondisi }} </td>
                <td> {{ $brg -> jenis_barang }} </td>
                <td> {{ $brg -> sumber_dana }} </td>
              </tr>
            </tbody>
            @endforeach
          </table>
    </table>
   </div>
  </div>
 </body>
</html>
