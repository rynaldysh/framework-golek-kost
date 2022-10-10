<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<table id="customers">
   <tr>
        <td>Id</td>
        <td>Nama Pemesan</td>
        <td>Kode Pesan Kost atau Kontrakan</td>
        <td>Tanggal Pemesanan</td>
        <td>Nomor Telfon</td>
        <td>Status</td>
    </tr>
    @foreach($data as $row)
    
    <tr>
        <td>{{$row->id}}</td>
        <td>{{$row->name}}</td>
        <td>{{$row->kode_pesan_kostkontrakan}}</td>
        <td>{{$row->tanggal}}</td>
        <td>{{$row->phone}}</td>
        <td>{{$row->status}}</td>
    </tr>

    @endforeach
    
  
</table>

</body>
</html>