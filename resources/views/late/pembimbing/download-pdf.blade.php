<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>SURAT PERNYATAAN -Pdf</title>
  <style>
    body {
      width: 100%;
      height: 100%;
      margin: 0;
      padding: 0;
      background-color: #FAFAFA;
      font: 10pt "Tahoma";
    }

    .page {
      width: 180mm;
      min-height: 297mm;
      padding: 15mm;
      margin: 0 auto;
      background-color: #FFFFFF;
      position: relative;
    }
    
    td {
      padding-top: 5px;
    }

    @page {
      size: A4;
      margin: 0;
    }

    @media print {

      html,
      body {
        width: 210mm;
        height: 297mm;
      }

      .page {
        margin: 0;
        border: initial;
        border-radius: initial;
        width: initial;
        min-height: initial;
        box-shadow: initial;
        background: initial;
        page-break-after: always;
      }
    }
  </style>
</head>
<body>
  <div class="page">
    <h2 style="text-align: center; margin-bottom: 0; font-size: 11pt;">SURAT PERNYATAAN</h2>
    <h2 style="text-align: center; margin-top: 0; font-size: 11pt;">TIDAK AKAN DATANG TERLAMBAT KESEKOLAH</h2>
    <p style="margin-top: 70px;">Yang bertanda tangan dibawah ini :</p>
    <table style="margin-top: 20px; font-size: 10pt">
      <tr>
        <td style="width: 100px;">NIS</td>
        <td>:</td>
        <td>&nbsp;{{ $late->nis }}</td>
      </tr>
      <tr>
        <td style="width: 100px;">Nama</td>
        <td>:</td>
        <td>&nbsp;{{ $late->name }}</td>
      </tr>
      <tr>
        <td style="width: 100px;">Rombel</td>
        <td>:</td>
        <td>&nbsp;{{ $late->rombel->rombel }}</td>
      </tr>
      <tr>
        <td style="width: 100px;">Rayon</td>
        <td>:</td>
        <td>&nbsp;{{ $late->rayon->rayon }}</td>
      </tr>
    </table>
    <p style="margin-top: 50px;">Dengan ini menyatakan bahwa saya telah melakukan pelanggaran tata tertib sekolah, yaitu terlambat datang ke sekolah sebanyak <strong>{{ $totallate }} Kali</strong> yang mana hal tersebut termasuk kedalam pelanggaran kedisiplinan. Saya berjanji tidak akan terlambat datang ke sekolah lagi. Apabila saya terlambat datang ke sekolah lagi saya siap diberi sanksi yang sesuai dengan peraturan sekolah.</p>
    <p style="margin-top: 30px;">Demikian surat pernyataan terlambat saya buat dengan penuh penyesalan.</p>
    <table style="margin-top: 100px; solid; width:665px;">
      <tr>
        <th></th>
        <th style="text-align: center; font-size: 15px; font-weight: normal;">Bogor, {{ $dates }}</th>
      </tr>
      <tr>
        <td style="text-align: center;">Peserta Didik,</td>
        <td style="text-align: center;">Orang Tua/Wali Peserta Didik</td>
      </tr>
      <tr><td></td></tr>
      <tr><td></td></tr>
      <tr><td></td></tr>
      <tr><td></td></tr>
      <tr><td></td></tr>
      <tr><td></td></tr>
      <tr><td></td></tr>
      <tr><td></td></tr>
      <tr><td></td></tr>
      <tr><td></td></tr>
      <tr><td></td></tr>
      <tr><td></td></tr>
      <tr><td></td></tr>
      <tr><td></td></tr>
      <tr><td></td></tr>
      <tr><td></td></tr>
      <tr>
        <td style="text-align: center;">({{ $late->name }})</td>
        <td style="text-align: center;">(............................)</td>
      </tr>
      <tr><td></td></tr>
      <tr><td></td></tr>
      <tr><td></td></tr>
      <tr><td></td></tr>
      <tr><td></td></tr>
      <tr>
        <td style="text-align: center;">Pembimbing Siswa,</td>
        <td style="text-align: center;">Kesiswaan,</td>
      </tr>
      <tr><td></td></tr>
      <tr><td></td></tr>
      <tr><td></td></tr>
      <tr><td></td></tr>
      <tr><td></td></tr>
      <tr><td></td></tr>
      <tr><td></td></tr>
      <tr><td></td></tr>
      <tr><td></td></tr>
      <tr><td></td></tr>
      <tr><td></td></tr>
      <tr><td></td></tr>
      <tr><td></td></tr>
      <tr><td></td></tr>
      <tr><td></td></tr>
      <tr><td></td></tr>
      <tr>
        <td style="text-align: center;">({{ $pembimbing->name }})</td>
        <td style="text-align: center;">(............................)</td>
      </tr>
    </table>
  </div>
</body>
</html>