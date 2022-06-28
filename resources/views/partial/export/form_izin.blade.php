<html>
    <head>
        <style>
            table, th, td {
            border-spacing: 0px;
            border: 0.5px solid black;
            }
            .header-title{
                height: 60px;
                text-align: center;
                font-weight: bold;
            }
            .header-title-2{
                height: 30px;
                text-align: center;
                font-weight: bold;
            }
            .center{
                justify-content: center;
                justify-items: center;
            }
            .right{
                justify-content: right;
                justify-items: right;
            }
            .half-column{
                width:50%
            }
            .tandatangan{
                height: 100px;
                width: 100px;
            }
            .cntr{
                justify-items: center;
                text-align: center;
                justify-content: center;
            }
            .width-30{
                width: 30%;
            }
            .ct_ml{
                padding-left: 1em;
            }

        </style>
    </head>

    <script type="text/javascript">
        window.print()
    </script>

    <table style="width:100%">
        <tbody>
            <tr class="center">
                <td colspan="2" class="cntr"><span class="header-title">FORM IZIN KARYAWAN</span><br>{{$Kayr[0]->no_form}}</td>
            </tr>
            <tr>
                <td class="half-column" colspan="1">Nama</td>
                <td class="half-column">{{ucfirst($Kayr[0]->created_by)}}</td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>{{ucfirst($Kayr_iz[0]->jabatan)}}</td>
            </tr>
            <tr>
                <td>Departemen</td>
                <td>{{ucfirst($Kayr_iz[0]->departement)}}</td>
            </tr>
            <tr>
                <td>Alasan</td>
                <td colspan="2">
                    @if($Kayr_iz[0]->izin_pekerjaan == 'Y')<input type="checkbox" checked>Pekerjaan/Dinas @endif
                    @if($Kayr_iz[0]->izin_pribadi == 'Y')<input type="checkbox" checked>Pribadi @endif
                    @if($Kayr_iz[0]->terlambat == 'Y') <input type="checkbox" checked>Terlambat @endif
                    @if($Kayr_iz[0]->keluarkantor == 'Y')<input type="checkbox" checked>Keluar Kantor @endif
                    @if($Kayr_iz[0]->pulangcepat == 'Y')<input type="checkbox" checked>Pulang Cepat @endif
                    @if($Kayr_iz[0]->tidakclock == 'Y')<input type="checkbox" checked>Tidak Clock In / Out @endif
                    @if($Kayr_iz[0]->sakit == 'Y')<input type="checkbox" checked>Sakit** @endif
                    @if($Kayr_iz[0]->sebab_lain == 'Y')<input type="checkbox" checked>Sebab Lain @endif
                </td>
            </tr>

            <tr>
                <td>Hari / Tanggal Izin</td>
                <td>{{ \Carbon\Carbon::parse($Kayr_iz[0]->tgl_izin)->format('j F, Y') }}</td>
            </tr>

            <tr>
                <td>Waktu</td>
                <td>{{$Kayr_iz[0]->jam_s}} s/d {{$Kayr_iz[0]->jam_e}}</td>
            </tr>

            <tr>
                <td>Keterangan Izin</td>
                <td>{{ucfirst($Kayr_iz[0]->keteranganizin)}}</td>
            </tr>

            <tr>
                <td colspan="2">Catatan : </td>
            </tr>
            <tr>
                <td colspan="2">* Wajib input dengan lengkap tanggal dan jam pada kolom Waktu Pengajuan Izin</td>
            </tr>
            <tr>
                <td colspan="2">** Wajib Dilampirkan Dokumen Pendukung</td>
            </tr>
        </tbody>
    </table>
    <table style="width: 100%">
        <tbody>
            <tr class="cntr">
                <td colspan="1" class="width-30">Diajukan Oleh,</td>
                <td colspan="1" class="width-30">Disetujui Oleh,</td>
                <td colspan="1" class="width-30">Diverifikasi Oleh,</td>
            </tr>
            <tr class="cntr">
                <td colspan="1" class="width-30"> <img class="tandatangan" src={{ Asset("storage/file_tanda_tangan/".Auth::user()->id.".jpg")}}></td>
                <td colspan="1" class="width-30"> @if ($Kayr[0]->approved == 'Y')<img class="tandatangan" src={{ Asset("storage/file_tanda_tangan/".$Kayr_iz[0]->atasanid.".jpg")}}>@endif</td>
                <td colspan="1" class="width-30">@if($Kayr[0]->verif == 1)<img class="tandatangan" src={{ Asset("storage/file_tanda_tangan/".$Kayr[0]->verified_by_id.".jpg")}}>@endif</td>
            </tr>
            <tr class="cntr">
                <td colspan="1" class="width-30">({{ucfirst($Kayr[0]->created_by)}})</td>
                <td colspan="1" class="width-30">({{ucfirst($Kayr_iz[0]->atasan)}})</td>
                <td colspan="1" class="width-30">@if ($Kayr[0]->verif == 1)({{ucfirst($Kayr[0]->verified_by)}}) @else(...........................................)@endif</td>
            </tr>
            <tr class="cntr">
                <td colspan="1" class="width-30">Karyawan</td>
                <td colspan="1" class="width-30">Atasan Langsung</td>
                <td colspan="1" class="width-30">Human Resources Departement</td>
            </tr>
        </tbody>
    </table>

    <table style="width:100%;  margin-top:40px">
        <tbody>
            <tr class="center">
                <td colspan="2" class="cntr"><span class="header-title">FORM IZIN KARYAWAN</span><br>{{$Kayr[0]->no_form}}</td>
            </tr>
            <tr>
                <td class="half-column" colspan="1">Nama</td>
                <td class="half-column">{{ucfirst($Kayr[0]->created_by)}}</td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>{{ucfirst($Kayr_iz[0]->jabatan)}}</td>
            </tr>
            <tr>
                <td>Departemen</td>
                <td>{{ucfirst($Kayr_iz[0]->departement)}}</td>
            </tr>
            <tr>
                <td>Alasan</td>
                <td colspan="2">
                    @if($Kayr_iz[0]->izin_pekerjaan == 'Y')<input type="checkbox" checked>Pekerjaan/Dinas @endif
                    @if($Kayr_iz[0]->izin_pribadi == 'Y')<input type="checkbox" checked>Pribadi @endif
                    @if($Kayr_iz[0]->terlambat == 'Y') <input type="checkbox" checked>Terlambat @endif
                    @if($Kayr_iz[0]->keluarkantor == 'Y')<input type="checkbox" checked>Keluar Kantor @endif
                    @if($Kayr_iz[0]->pulangcepat == 'Y')<input type="checkbox" checked>Pulang Cepat @endif
                    @if($Kayr_iz[0]->tidakclock == 'Y')<input type="checkbox" checked>Tidak Clock In / Out @endif
                    @if($Kayr_iz[0]->sakit == 'Y')<input type="checkbox" checked>Sakit** @endif
                    @if($Kayr_iz[0]->sebab_lain == 'Y')<input type="checkbox" checked>Sebab Lain @endif
                </td>
            </tr>

            <tr>
                <td>Hari / Tanggal Izin</td>
                <td>{{ \Carbon\Carbon::parse($Kayr_iz[0]->tgl_izin)->format('j F, Y') }}</td>
            </tr>

            <tr>
                <td>Waktu</td>
                <td>{{$Kayr_iz[0]->jam_s}} s/d {{$Kayr_iz[0]->jam_e}}</td>
            </tr>

            <tr>
                <td>Keterangan Izin</td>
                <td>{{ucfirst($Kayr_iz[0]->keteranganizin)}}</td>
            </tr>

            <tr>
                <td colspan="2">Catatan : </td>
            </tr>
            <tr>
                <td colspan="2">* Wajib input dengan lengkap tanggal dan jam pada kolom Waktu Pengajuan Izin</td>
            </tr>
            <tr>
                <td colspan="2">** Wajib Dilampirkan Dokumen Pendukung</td>
            </tr>
        </tbody>
    </table>
    <table style="width: 100%;">
        <tbody>
            <tr class="cntr">
                <td colspan="1" class="width-30">Diajukan Oleh,</td>
                <td colspan="1" class="width-30">Disetujui Oleh,</td>
                <td colspan="1" class="width-30">Diverifikasi Oleh,</td>
            </tr>
            <tr class="cntr">
                <td colspan="1" class="width-30"> <img class="tandatangan" src={{ Asset("storage/file_tanda_tangan/".Auth::user()->id.".jpg")}}></td>
                <td colspan="1" class="width-30"> @if ($Kayr[0]->approved == 'Y')<img class="tandatangan" src={{ Asset("storage/file_tanda_tangan/".$Kayr_iz[0]->atasanid.".jpg")}}>@endif</td>
                <td colspan="1" class="width-30">@if($Kayr[0]->verif == 1)<img class="tandatangan" src={{ Asset("storage/file_tanda_tangan/".$Kayr[0]->verified_by_id.".jpg")}}>@endif</td>
            </tr>
            <tr class="cntr">
                <td colspan="1" class="width-30">({{ucfirst($Kayr[0]->created_by)}})</td>
                <td colspan="1" class="width-30">({{ucfirst($Kayr_iz[0]->atasan)}})</td>
                <td colspan="1" class="width-30">@if($Kayr[0]->verif == 1)({{ucfirst($Kayr[0]->verified_by)}}) @else(...........................................)@endif</td>
            </tr>
            <tr class="cntr">
                <td colspan="1" class="width-30">Karyawan</td>
                <td colspan="1" class="width-30">Atasan Langsung</td>
                <td colspan="1" class="width-30">Human Resources Departement</td>
            </tr>
        </tbody>
    </table>
</html>