<!DOCTYPE html>
<html>
<head>
    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
</head>
<body>
	<center>
		<h5>Laporan data aduan</h4>
	</center>
 
    <div class="container">
    @foreach($pengaduan as $aduan)
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ $aduan->judul_aduan }}</h4>
                <h6 class="card-link">Dikirim oleh : {{ $aduan->users->name }}</h6>
                <p class="card-text text-break">{{ $aduan->isi_aduan }}</p>
                <p class="card-link">{{ $aduan->tanggal_aduan }}</p>
            </div>
        </div>
        <hr>
    @endforeach
    </div>
</body>
</html>
