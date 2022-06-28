<html>
    <script>
        $(document).ready(function () {
            window.print();
        });
    </script>
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
        <script type="text/javascript">
                window.print()
        </script>
    </head>

    <table style="width:100%">
        <tbody>
            <tr class="center">
                <td colspan="2" class="cntr"><span class="header-title">FORM CUTI KARYAWAN</span><br>{{$Kayr[0]->no_form}}</td>
            </tr>
            <tr>
                <td class="half-column">Nama</td>
                <td class="half-column">{{ucfirst($Kayr[0]->created_by)}}</td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>{{ucfirst($Kayr_ct[0]->jabatan)}}</td>
            </tr>
            <tr>
                <td>Departemen</td>
                <td>{{ucfirst($Kayr_ct[0]->departement)}}</td>
            </tr>
            <tr>
                <td>Atasan</td>
                <td>{{ucfirst($Kayr_ct[0]->atasan)}}</td>
            </tr>
            <tr>
                <td>Jenis Cuti Yang Diajukan</td>
                <td>
                    @if ($Kayr_ct[0]->cuti_tahunan == 'Y')  <input type="checkbox" checked>Cuti Tahunan @endif
                    @if ($Kayr_ct[0]->cuti_diluar_tanggungan == 'Y') <input type="checkbox" checked>CDT @endif
                    @if ($Kayr_ct[0]->cuti_khusus == 'Y') <input type="checkbox" checked>Cuti Khusus @endif
                </td>
            </tr>
            <tr>
                <td colspan="2" class="header-title-2">TAHUNAN / CUTI DILUAR TANGGUNGAN (CDT)</td>
            </tr>
            <tr>
                <td>Tanggal Pengajuan Cuti</td>
                <td>{{\Carbon\Carbon::createFromFormat('Y-m-d', $Kayr_ct[0]->tgl_pengajuan_s)->format('d M Y')}} s/d {{\Carbon\Carbon::createFromFormat('Y-m-d', $Kayr_ct[0]->tgl_pengajuan_e)->format('d M Y')}}</td>
            </tr>
            <tr>
                <td>Tanggal Kembali Bekerja</td>
                <td>{{\Carbon\Carbon::createFromFormat('Y-m-d', $Kayr_ct[0]->tgl_kembali_kerja)->format('d M Y')}}</td>
            </tr>
            <tr>
                <td>Jumlah Pengambilan Cuti</td>
                <td>{{$Kayr_ct[0]->total_cuti}} Hari</td>
            </tr>
            <tr>
                <td>Hak cuti Yang Dapat Dipergunakan</td>
                <td></td>
            </tr>
            <tr>
                <td>Sisa Hak Cuti Setelah Pengambilan</td>
                <td></td>
            </tr>
            <tr>
                <td>Alasan Pengambilan Cuti</td>
                <td>{{ucfirst($Kayr_ct[0]->alasan)}}</td>
            </tr>


            <tr>
                <td colspan="2" class="header-title-2">CUTI KHUSUS</td>
            </tr>
            <tr>
                <td>Cuti Menikah</td>
                <td>@if ($Kayr_ct[0]->cuti_menikah_st <> NULL) {{\Carbon\Carbon::createFromFormat('Y-m-d', $Kayr_ct[0]->cuti_menikah_st)->format('d M Y')}} s/d {{\Carbon\Carbon::createFromFormat('Y-m-d', $Kayr_ct[0]->cuti_menikah_en)->format('d M Y')}} @endif
            </td>
            </tr>
            <tr>
                <td colspan="1">Cuti Membaptiskan/Khitanan/Menikahkan anak</td>
                <td>@if ($Kayr_ct[0]->cuti_anak_st <> NULL) {{\Carbon\Carbon::createFromFormat('Y-m-d', $Kayr_ct[0]->cuti_anak_st)->format('d M Y')}} S/D {{\Carbon\Carbon::createFromFormat('Y-m-d', $Kayr_ct[0]->cuti_anak_en)->format('d M Y')}}</td> @endif
            </tr>
            <tr>
                <td>Cuti Dukacita</td>
                <td>@if ($Kayr_ct[0]->cuti_dukacita_st <> NULL) {{\Carbon\Carbon::createFromFormat('Y-m-d', $Kayr_ct[0]->cuti_dukacita_st)->format('d M Y')}} S/D {{\Carbon\Carbon::createFromFormat('Y-m-d', $Kayr_ct[0]->cuti_dukacita_en)->format('d M Y')}}</td> @endif
            </tr>
            <tr>
                <td colspan="3">Cuti Melahirkan</td>
            </tr>
            <tr>
                <td class="ct_ml">Cuti Sebelum Melahirkan</td>
                <td>@if ($Kayr_ct[0]->cuti_sblm_melahirkan_st <> NULL) {{\Carbon\Carbon::createFromFormat('Y-m-d', $Kayr_ct[0]->uti_sblm_melahirkan_st)->format('d M Y')}} S/D {{\Carbon\Carbon::createFromFormat('Y-m-d', $Kayr_ct[0]->uti_sblm_melahirkan_en)->format('d M Y')}}</td> @endif
            </tr>
            <tr>
                <td class="ct_ml">Cuti Setelah Melahirkan</td>
                <td>@if ($Kayr_ct[0]->cuti_stlh_melahirkan_st <> NULL) {{\Carbon\Carbon::createFromFormat('Y-m-d', $Kayr_ct[0]->cuti_stlh_melahirkan_st)->format('d M Y')}} S/D {{\Carbon\Carbon::createFromFormat('Y-m-d', $Kayr_ct[0]->cuti_stlh_melahirkan_en)->format('d M Y')}}</td> @endif
            </tr>
            <tr>
                <td>Cuti Istri Melahirkan / Keguguran</td>
                <td>@if ($Kayr_ct[0]->cuti_istri_st <> NULL) {{\Carbon\Carbon::createFromFormat('Y-m-d', $Kayr_ct[0]->cuti_istri_st)->format('d M Y')}} S/D {{\Carbon\Carbon::createFromFormat('Y-m-d', $Kayr_ct[0]->cuti_istri_en)->format('d M Y')}}</td> @endif
            </tr>

            <tr>
                <td colspan="3" class="header-title-2">KETERANGAN TAMBAHAN</td>
            </tr>
            <tr>
                <td>PIC Pengganti Selama Cuti</td>
                <td>{{ucfirst($Kayr_ct[0]->pengganti_pic)}}</td>
            </tr>
            <tr>
                <td>Jabatan PIC Pengganti</td>
                <td>{{ucfirst($Kayr_ct[0]->jabatan_pic)}}</td>
            </tr>

            <tr>
                <td colspan="2">Catatan : </td>
            </tr>
            <tr>
                <td colspan="2">* Hak Cuti Disesuaikan Dengan Ketentuan Yang Berlaku</td>
            </tr>
            <tr>
                <td colspan="2">* Wajib Dilampirkan Dokumen Pendukung</td>
            </tr>
            <tr>
                <td colspan="2">* Formulir Cuti Wajib Diserahkan Kepada HRD 1 Minggu Sebelum Hari Cuti</td>
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
                <td colspan="1" class="width-30"> @if ($Kayr[0]->approved == 'Y')<img class="tandatangan" src={{ Asset("storage/file_tanda_tangan/".$Kayr_ct[0]->atasanid.".jpg")}}>@endif</td>
                <td colspan="1" class="width-30">@if($Kayr[0]->verif == 1)<img class="tandatangan" src={{ Asset("storage/file_tanda_tangan/".$Kayr[0]->verified_by_id.".jpg")}}>@endif</td>
            </tr>
            <tr class="cntr">
                <td colspan="1" class="width-30">({{ucfirst($Kayr[0]->created_by)}})</td>
                <td colspan="1" class="width-30">({{ucfirst($Kayr_ct[0]->atasan)}})</td>
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