
@extends('layouts.app')
<head >
    <title>
        Genel Koronavirüs Tablosu
    </title>

    <script src="https://dosyamerkez.saglik.gov.tr/2020webfiles/sablonlar/js/jquery_harita.js">
    </script>

</head>
<form method="post" action="/TR-66935/genel-koronavirus-tablosu.html" id="form2">






<section class="pages-content" style="margin:30px 50px;">


    <div class="sticky-table sticky-rtl-cells">
        <table class="table table-striped">
            <thead>
                <tr class="sticky-header">

                    <th>Tarih</th>
                    <th>Toplam Test Sayısı</th>
                    <th>Toplam Vaka Sayısı</th>
                    <th>Toplam Vefat Sayısı</th>

                    <th>Testlerden Aşi Alan Oranı (%)</th>
                    <th>Ağır Hasta Sayısı</th>
                    <th>Toplam İyileşen Hasta Sayısı</th>
                    <th>Bugünkü Vaka Sayısı</th>
                    <th>Bugünkü Hasta Sayısı</th>
                    <th>Bugünkü Test Sayısı</th>
                    <th>Bugünkü Vefat Sayısı</th>
                    <th>Bugünkü İyileşen Sayısı</th>

                </tr>

            </thead>
            <tbody id="TumVerileriGetir">

                <script type="text/javascript">
                    $(document).ready(function() {
                        //TumVeriler();

                        $.each(geneldurumjson, function(i, item) {
                            var str = item.tarih;
                            var tarih = str.split(".");
                            var aylar = ['', 'OCAK', 'ŞUBAT', 'MART',
                                'NİSAN', 'MAYIS', 'HAZİRAN',
                                'TEMMUZ', 'AĞUSTOS', 'EYLÜL',
                                'EKİM', 'KASIM', 'ARALIK'
                            ];

                            var yeni_tarih = "  " + Number(tarih[0]) +
                                " " + aylar[Number(tarih[1])] + " " +
                                Number(tarih[2]) + " ";

                            itemhtml = " <tr>  <td> " + yeni_tarih +
                                " </td>   <td> " + item.toplam_test +
                                " </td> <td> " + item.toplam_hasta +
                                " </td> <td> " + item.toplam_vefat +
                                " </td>  <td> " + item
                                .test_edilen_aşı_alan_hasta_orani +
                                " </td> <td> " + item
                                .agir_hasta_sayisi + " </td> <td> " +
                                item.toplam_iyilesen + " </td> <td> " +
                                item.gunluk_vaka + " </td>  <td> " +
                                item.gunluk_hasta + " </td> <td> " +
                                item.gunluk_test + " </td>  <td> " +
                                item.gunluk_vefat + " </td> <td> " +
                                item.gunluk_iyilesen + " </td>  </tr>";
                            $("#TumVerileriGetir").append(itemhtml);
                        });
                    });

                </script>

            </tbody>

        </table>

    </div>


</section>





</div>
<script src="/assets/js/sticky.js"></script>


<script src="/assets/js/default.js"></script>
<script src="/assets/js/carosel.js"></script>
<script src="/assets/js/lang/tr.js"></script>





<script>
    $(document).on("ready", function() {
        illere_gore_vakasayisi();
        riskDurumuHaritasi();
    });

</script>






<script type="text/javascript">
    //<![CDATA[
    var geneldurumjson = [{
        "tarih": "06.05.2021",
        "gunluk_test": {{$toplam}},
        "gunluk_vaka": {{$vaka}},
        "gunluk_hasta": {{$kretik}},
        "gunluk_vefat": {{$vefat}},
        "gunluk_iyilesen": {{$sifa}},
        "toplam_test": {{$toplam}},
         "toplam_hasta": {{$vaka}},
         "toplam_vefat": {{$vefat}},
         "toplam_iyilesen": {{$sifa}},
        // "toplam_yogun_bakim": "",
        // "toplam_entube": "",

         "agir_hasta_sayisi": {{$agir}},
         "test_edilen_aşı_alan_hasta_orani": {{$asi}},
        // "yatak_doluluk_orani": "56,3",
        // "eriskin_yogun_bakim_doluluk_orani": "69,1",
        // "ventilator_doluluk_orani": "35,7",
        "ortalama_filyasyon_suresi": "",
        "ortalama_temasli_tespit_suresi": "9",
        "filyasyon_orani": "99,9"
    }, {
         "tarih": "07.05.2021",
        // "gunluk_test": "318.869",
        // "gunluk_vaka": "55.149",
        // "gunluk_hasta": "2.862",
        // "gunluk_vefat": "341",
        // "gunluk_iyilesen": "48.947",
        // "toplam_test": "44.087.628",
        // "toplam_hasta": "4.323.596",
        // "toplam_vefat": "36.267",
        // "toplam_iyilesen": "3.736.537",
        // "toplam_yogun_bakim": "",
        // "toplam_entube": "",
        // "hastalarda_zaturre_oran": "2,9",
        // "agir_hasta_sayisi": "3.319",
        // "yatak_doluluk_orani": "56,3",
        // "eriskin_yogun_bakim_doluluk_orani": "69,1",
        // "ventilator_doluluk_orani": "35,7",
        // "ortalama_filyasyon_suresi": "",
        // "ortalama_temasli_tespit_suresi": "9",
        // "filyasyon_orani": "99,9"
    }, {
        "tarih": "08.05.2021",
        // "gunluk_test": "318.869",
        // "gunluk_vaka": "55.149",
        // "gunluk_hasta": "2.862",
        // "gunluk_vefat": "341",
        // "gunluk_iyilesen": "48.947",
        // "toplam_test": "44.087.628",
        // "toplam_hasta": "4.323.596",
        // "toplam_vefat": "36.267",
        // "toplam_iyilesen": "3.736.537",
        // "toplam_yogun_bakim": "",
        // "toplam_entube": "",
        // "hastalarda_zaturre_oran": "2,9",
        // "agir_hasta_sayisi": "3.319",
        // "yatak_doluluk_orani": "56,3",
        // "eriskin_yogun_bakim_doluluk_orani": "69,1",
        // "ventilator_doluluk_orani": "35,7",
        // "ortalama_filyasyon_suresi": "",
        // "ortalama_temasli_tespit_suresi": "9",
        // "filyasyon_orani": "99,9"
    }]; //]]>

</script>

</form>

