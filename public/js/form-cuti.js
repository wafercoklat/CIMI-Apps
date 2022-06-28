(function($) {
    'use strict';
    var GET = {};
    var $document = $(document);
    // var url_calendar = 'https://www.googleapis.com/calendar/v3/calendars/id.indonesian%23holiday%40group.v.calendar.google.com/events?key=AIzaSyA3YRsBl2u_6w9G3gMe8McLCkTPn79sRe4';
    var url_calendar = 'https://calendar.google.com/calendar/u/0/embed?src=en.indonesian.official%23holiday@group.v.calendar.google.com&ctz=Asia/Jakarta';

    function getWeekendCountBetweenDates(startDate, endDate){
        var totalWeekends = 0;
        for (var i = startDate; i <= endDate; i.setDate(i.getDate()+1)){
           if (i.getDay() == 0 || i.getDay() == 1) totalWeekends++;
        }
        return totalWeekends;
     }

    function date_calculation_cuti(tpc1, tpc2, tgl_link, total) {
        if (tgl_link == "dan") {
            var a = ((tpc1 === undefined || tpc1 === "" || tpc1 === NaN) ? 0 : 1);
            var b = ((tpc2 === undefined || tpc2 === "" || tpc2 === NaN) ? 0 : 1);
            total = a + b;
        }
        if (tgl_link == "sampai") {
            var totalweekend = getWeekendCountBetweenDates(new Date(tpc1), new Date(tpc2));
            total = (((new Date(tpc2) - new Date(tpc1)) / (1000 * 60 * 60 * 24)) + 1) - totalweekend;
            
            if (isNaN(total)) {
                total = 1;
            }
        }

        if ($('#csh').is(':checked')) {
            total = 0.5;
            $('#tgl_kembali').attr("disabled", true).val(tpc1);
        }

        $('#tc_real').val(total);
        $("#tc_show").text(total == 0.5 ? "Setengah Hari" : total + " Hari");
    }

    GET.TotalCuti = function() {
        var total = 0;
        var tpc1, tpc2;
        var csh, tgl_link = "sampai";
        $("#tc_show").text(total + " hari");

        date_calculation_cuti($('#tpc1').val(),  $('#tpc2').val(),  $('#tlink').val(), total);
        
        $('#check-ck').on('change', function() {
            if ($('#check-ck').is(':checked')) {
                $("#div_ck").attr("class", "visible");
            } else {
                $("#div_ck").attr("class", "invisible");
            }

        })

        $('#csh').on('change', function() {
            if ($('#csh').is(':checked')) {
                $('#tlink').attr("disabled", true);
                $('#tpc2').attr("disabled", true).val("");
                $('#tpc2').attr("disabled", true).val("");
                $('#tgl_kembali').attr("disabled", true).val(tpc1);
                $('#tlink').val("");
                total = 0.5;
            } else {
                $('#tlink').attr("disabled", false);
                $('#tpc2').attr("disabled", false);
                $('#tgl_kembali').attr("disabled", false).val("");
                total = 0;
            }
            date_calculation_cuti("", "", "", total);
        });

        $('#tlink').on('change', function() {
            tgl_link = $('#tlink').val();
            date_calculation_cuti(tpc1, tpc2, tgl_link, total);
        });

        $('#tpc1').on('change', function() {
            tpc1 = $('#tpc1').val();
            $('#tpc2').val(tpc1);
            if ($('#csh').is(':checked')) {
                $('#tgl_kembali').val(tpc1);                
            }
            date_calculation_cuti(tpc1, tpc2, tgl_link, total);
        });

        $('#tpc2').on('change', function() {
            tpc2 = $('#tpc2').val();
            if (tpc2 < tpc1) {
                alert("Tanggal tidak boleh di bawah " + tpc1);
                $('#tpc2').val(tpc1);
                tpc2 = tpc1;
            }
            date_calculation_cuti(tpc1, tpc2, tgl_link, total);
        });

        $('#csh').on('change', function() {
            csh = $('#csh').val();
            date_calculation_cuti(tpc1, tpc2, tgl_link, total);
        });
    }

    $document.ready(function() {
        GET.TotalCuti()
    });
})(jQuery);