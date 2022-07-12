(function($) {
    'use strict';
    var TEMP = {};
    var $document = $(document);
    var start, end;
    var urls = window.location.pathname;

    // FUNCTION =============================
    function pdfOpen_newtab() {
        window.location.href = "file:///F:/pdf2.pdf";
    }

    function isEmpty(value) {
        return typeof value == 'string' && !value.trim() || typeof value == 'undefined' || value === null;
      }

    function isUrl(path, url) {
        return url.includes(path) ? true : false;
        // return (window.location.href.indexOf(path + parseInt(url)) > -1) ? true : false;
    };

    function today() {
        let today = new Date();
        return today;
    };

    function checkToday(check, from, to) {
        if (check.getTime() < new Date(from).getTime() && (check.getTime() >= new Date(from).getTime() && check.getTime() <= new Date(to).getTime())) {
            return '<h4 class="mb-0 fw-bold"> In Use - On Schedule</h4>';
        } else if (check.getTime() >= new Date(from).getTime() && check.getTime() <= new Date(to).getTime()) {
            return '<h4 class="mb-0 fw-bold"> In Use </h4>';
        } else if (check.getTime() < new Date(from).getTime()) {
            return '<h4 class="mb-0 fw-bold"> <i class="mdi mdi-checkbox-marked-circle text-green"></i> Ready Today - On Schedule</h4>';
        } else {
            return '<h4 class="mb-0 fw-bold"> <i class="mdi mdi-checkbox-marked-circle text-green"></i> Ready</h4>';
        }
    };

    function loadiso(start, end, loc, target) {
        $.ajax({
            url: '/isotank/checkiso/' + start + '/' + end + '/' + loc,
            type: 'GET',
            dataType: 'Json',
            success: function(data) {
                console.log("TEST")
                if (data == '') {
                    setOptionIso(target, [], 'Isotank tidak ada')
                } else {
                    setOptionIso(target, PushOptions(data), 'Pilih Isotank');
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert('Status: ' + textStatus);
                alert('Error: ' + errorThrown);
            }
        });
    };

    function PushOptions(data) {
        var events = [];
        for (var i = 0; i < data.length; i++) {
            {
                events.push({
                    id: data[i].id,
                    title: data[i].code,
                });
            }
        };
        return events;
    };

    function settext_viewdetail(data) {
        $('#isotankdet').text(data['Month'].slice(-1).pop().code);
        $('#transnodet').text(data['Month'].slice(-1).pop().transnumber);
        $('#tgl_muatdet').text(moment(data['Month'].slice(-1).pop().tgl_outdepo).format('D MMMM YYYY'));
        $('#tgl_indepodet').text(moment(data['Month'].slice(-1).pop().tgl_indepo).format('D MMMM YYYY'));
        $('#oridet').text(data['Month'].slice(-1).pop().lokasi_loading);
        $('#desdet').text(data['Month'].slice(-1).pop().lokasi_bongkar);
        $('#cargo').text(data['Month'].slice(-1).pop().cargo);
        $('#transportdet').text(data['Month'].slice(-1).pop().vessel);
        $('#statusdet').html(checkToday(today(), data['Month'].slice(-1).pop().tgl_outdepo, data['Month'].slice(-1).pop().tgl_indepo));
        $('#lokasiterakhirdet').text(data['Month'].slice(-1).pop().des);
    };

    function setOptionIso(id_sel, setData, info) {
        $(id_sel).selectize({
            valueField: 'id',
            labelField: 'title',
            searchField: 'title',
            create: false,
            maxItems: 1,
            closeAfterSelect: true,
            options: setData,
            placeholder: info,
        });
    };
    // ===================================


    // VIEW =============================
    // CREATE ISOTANK
    TEMP.Loadisotank = function() {
        var origin, des;
        start = $('#startDate').val();
        end = $('#endDate').val();
        $('#endDate').on('change', function() { end = $('#endDate').val(); });
        $('#startDate').on('change', function() { start = $('#startDate').val(); });

        $document.on('click', '#checkISO', function() {
            origin = $('#origin').val();
            des = $('#destinasi').val();

            switch (true) {
                case (start == undefined && end == undefined):
                    alert('Tanggal kosong');
                    break;
                case (!origin.trim()):
                    alert('Origin kosong');
                    break;
                case (!des.trim()):
                    alert('Destinasi kosong');
                    break;
                case (start != undefined && end != undefined && !!origin.trim() && !!des.trim()):
                    document.getElementById('disable-').style.pointerEvents = 'visible';
                    document.getElementById('disable-').style.opacity = '1';
                    document.getElementById('disable2-').style.pointerEvents = 'visible';
                    document.getElementById('disable2-').style.opacity = '1';
                    $("#isotank").selectize()[0].selectize.destroy();
                    loadiso(start, end, $('#origin').val(), '#isotank');
                    break;
                default:
                    return alert('tanggal kosong');
            }
        });
    };

    TEMP.SelectItem = function() {
        setOptionIso('#isotank', [], 'Silahkan Pilih Tanggal Dahulu');
        setOptionIso('#customer', PushOptions(cust), 'Pilih Customer');
        setOptionIso('#transport', PushOptions(tra), 'Pilih Transport');
        setOptionIso('#origin', PushOptions(loc), 'Pilih Lokasi');
        setOptionIso('#destinasi', PushOptions(loc), 'Pilih Lokasi');
    };

    TEMP.Loadisotank_II = function() {
        $('#endDate_').on('change', function() { end = $('#endDate_').val(); });
        $('#startDate_').on('change', function() { start = $('#startDate_').val(); });

        $document.on('click', '#checkISO_', function() {
            start = $('#startDate_').val();
            end = $('#endDate_').val();

            switch (true) {
                case (start == undefined && end == undefined):
                    alert('Tanggal kosong');
                    break;
                case (!origin.trim()):
                    alert('Origin kosong');
                    break;
                case (!des.trim()):
                    alert('Destinasi kosong');
                    break;
                case (start != undefined && end != undefined && !!origin.trim() && !!des.trim()):
                    $('#select_opt_isotank').selectize()[0].selectize.destroy();
                    loadiso(start, end, $('#select_opt_origin').val(), '#select_opt_isotank');
                    break;
                default:
                    return;
            }
        });
    };

    TEMP.SelectItem_II = function() {
        $('#select_opt_origin').selectize({
            valueField: 'id',
            create: true,
            maxItems: 1,
            closeAfterSelect: true
        });

        $('#select_opt_destination').selectize({
            valueField: 'id',
            create: true,
            maxItems: 1,
            closeAfterSelect: true
        });

        $('#select_opt_transport').selectize({
            valueField: 'id',
            create: true,
            maxItems: 1,
            closeAfterSelect: true
        });

        $('#select_opt_isotank').selectize({
            valueField: 'id',
            create: true,
            maxItems: 1,
            closeAfterSelect: true
        });
    };
    // ===================================

    // ISOTANK DETAIL (VIEW)
    TEMP.fetchMonthly = function() {
        $.ajax({
            url: "/isotank/fecthIsotankMonth/" + window.location.href.split("/").pop(),
            type: 'GET',
            dataType: 'Json',
            success: function(data) {
                var getDate;
                var events = PushEvents(data);
                settext_viewdetail(data);

                $('#calendar-list').fullCalendar({
                    viewRender: function(view, element) {
                        // console.log(new Date($('#calendar-list').fullCalendar('getView').end._i));
                        // console.log(new Date($('#calendar-list').fullCalendar('getView').start._i));
                        getDate = getDate == undefined ? today() : new Date($('#calendar-list').fullCalendar('getView').start._i);
                    },
                    dayClick: function(date, jsEvent, view) {
                        $('#calendar-list').fullCalendar('changeView', 'basicDay');
                        $('#calendar-list').fullCalendar('gotoDate', date);
                    },
                    customButtons: {
                        create: {
                            text: 'Buat Jadwal',
                            click: function(jsEvent, view) {
                                // let start = (getDate.getFullYear()) + '-' + (('0' + (getDate.getMonth() + 1)).slice(-2)) + '-' + (('0' + getDate.getDate()).slice(-2));
                                // let end = (getDate.getFullYear()) + '-' + (('0' + (getDate.getMonth() + 1)).slice(-2)) + '-' + (('0' + (getDate.getDate() + 7)).slice(-2));

                                // $('#modal2').modal('show');
                                // document.getElementById('startDate').value = start;
                                // document.getElementById('endDate').value = end;
                                window.location.href = '/isotank/create';
                            },
                        },
                    },
                    header: {
                        right: 'today, prev,next',
                        center: 'title',
                        left: 'month, create'
                    },
                    buttonText: {
                        month: 'Beranda',
                        today: 'Hari Ini'
                    },
                    defaultView: 'month',
                    navLinks: true, // can click day/week names to navigate views
                    disableDragging: true,
                    selectable: true,
                    eventLimit: true, // allow 'more' link when too many events
                    timeZone: 'UTC+7',
                    events: events,
                    eventClick: function(event, jsEvent, view) {
                        $('#modalTitle').html(event.title);
                        $('#modalBody').html(event.description);
                        $('#start').html(event.start);
                        $('#end').html(event.end);
                        $('#calendarModal').modal();
                    },
                });
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert('Status: ' + textStatus);
                alert('Error: ' + errorThrown);
            }
        });

        //========== PUSH EVENTS ==================
        function PushEvents(data) {
            var events = [];
            for (var i = 0; i < data['Month'].length; i++) {
                {
                    events.push({
                        title: data['Month'][i].transnumber + ' - ' + data['Month'][i].packinglist_no + ' - Partai ' + data['Month'][i].partai,
                        start: data['Month'][i].tgl_outdepo,
                        end: data['Month'][i].tgl_indepo,
                    });
                }
            };
            return events;
        }
    };
    // ===================================

    // ISOTANK LIST (VIEW)
    function isSearch(data, search) {
        return (data[1].toLowerCase().includes(search.toLowerCase()) || data[2].toLowerCase().includes(search.toLowerCase()) || data[5].toLowerCase().includes(search.toLowerCase()) || data[6].toLowerCase().includes(search.toLowerCase()) || data[7].toLowerCase().includes(search.toLowerCase()) || data[8].toLowerCase().includes(search.toLowerCase()) || data[9].toLowerCase().includes(search.toLowerCase()) || data[10].toLowerCase().includes(search.toLowerCase()))
    }

    function isSearchII(data, search) {
        return (data[11].toLowerCase().includes(search.toLowerCase()) || data[12].toLowerCase().includes(search.toLowerCase()) || data[13].toLowerCase().includes(search.toLowerCase()) || data[14].toLowerCase().includes(search.toLowerCase()) || data[16].toLowerCase().includes(search.toLowerCase()))
    }

    function tog(v) {
        return v ? "addClass" : "removeClass";
    }
    $(document).on("input", ".clearable", function() {
        $(this)[tog(this.value)]("x");
    }).on("mousemove", ".x", function(e) {
        $(this)[tog(this.offsetWidth - 18 < e.clientX - this.getBoundingClientRect().left)]("onX");
    }).on("touchstart click", ".onX", function(ev) {
        ev.preventDefault();
        $(this).removeClass("x onX").val("").change();
    });

    function isUndifined(d, s) {
        return d !== undefined ? d.toLowerCase().includes(s.toLowerCase()) : false;
    }

    function isSelection(param1, param2, location, stats, data, search, target, idx_data) {
        var getSearchII = target == 2 ? isSearchII(data, search) : false;
        var getLocII = target == 2 ? (data[7].substring(0, 3) == location) : false;
        if (param1) {
            if (param2 && location != 'SMA' && stats != 'SMA' && search != '') {
                return ((data[idx_data].substring(0, 3) == location) || getLocII) && data[0].includes(stats) && (isSearch(data, search) || getSearchII) && param2;
            }
            if (param2 && location != 'SMA' && stats != 'SMA' && search == '') {
                return param2 && (data[0].includes(stats) && ((data[idx_data].substring(0, 3) == location) || getLocII));
            }
            if (param2 && location == 'SMA' && stats != 'SMA' && search != '') {
                return (param2 && (isSearch(data, search) || getSearchII) && (data[0].includes(stats)));
            }
            if (param2 && location != 'SMA' && stats == 'SMA' && search != '') {
                return (param2 && ((data[idx_data].substring(0, 3) == location) || getLocII) && (isSearch(data, search) || getSearchII));
            }
            if (param2 && location != 'SMA' && stats == 'SMA' && search == '') {
                return ((data[idx_data].substring(0, 3) == location) || getLocII) && param2;
            }
            if (param2 && location == 'SMA' && stats != 'SMA' && search == '') {
                return (data[0].includes(stats)) && param2;
            }
            if (param2 && location == 'SMA' && stats == 'SMA' && search != '') {
                return (isSearch(data, search) || getSearchII) && param2;
            }
            return param2;
        }
    }

    TEMP.Datatable = function() {
        var minDate, maxDate;
        var location = 'SMA',
            search = '',
            stats = 'SMA';

        $('#datatable').DataTable({
            scrollX: true,
            iDisplayLength: 15,
            bLengthChange: false,
            ordering: false
        });

        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var min = minDate;
                var max = maxDate;
                var outdepo = new Date(data[3]).getTime();
                var indepo = new Date(data[4]).getTime();
                // var target = isUrl('isotank/transaksi', urls) ? 2 : false;
                var target = false;
                console.log(target);
                var idx = isUrl('isotank/transaksi', urls) ? 6 : 5;
                if ((isSelection((min === undefined || (isNaN(min) || min == '') && (isNaN(max) || max === undefined || max == '')), (min === undefined || (isNaN(min) || min == '') && (isNaN(max) || max === undefined || max == '')), location, stats, data, search, target, idx) || isSelection(((min != undefined || !(isNaN(min)) || min != '') && (isNaN(max) || max === undefined || max == '')), (min === undefined || (isNaN(min) || min == '') && (isNaN(max) || max === undefined || max == '')), location, stats, data, search, target, idx) || isSelection((min != undefined && !(isNaN(min)) && min != '') && (!(isNaN(max)) || max !== undefined || max != ''), ((min <= outdepo && outdepo <= max) || (min <= indepo && indepo <= max)), location, stats, data, search, target, idx)) && (data[3] || data[5])) {
                    return true;
                }
                return false;
            }
        );

        // Create date inputs
        $('#min').on('change', function() {
            minDate = new Date($('#min').val()).setHours(0, 0, 0, 0);
        });
        $('#max').on('change', function() {
            maxDate = new Date($('#max').val()).setHours(0, 0, 0, 0);
        });
        $('#loc-filter').on('change', function() {
            location = $('#loc-filter').val();
        });
        $('#stats-filter').on('change', function() {
            stats = $('#stats-filter').val();
        });
        $('#search-filter').on('change', function() {
            search = $('#search-filter').val().toLowerCase();
        });

        // DataTables initialisation
        var table = $('#datatable').DataTable();

        // Refilter the table
        $('#min, #max, #loc-filter, #stats-filter, #search-filter').on('change', function() {
            table.draw();
        });
    };

    TEMP.DatatableIII = function() {
        var search = '';

        $('#datatable').DataTable({
            scrollX: true,
            iDisplayLength: 15,
            bLengthChange: false,
            ordering: false
        });

        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                if (isUndifined(data[1], search) || isUndifined(data[2], search) || isUndifined(data[5], search) || isUndifined(data[6], search) || isUndifined(data[7], search) || isUndifined(data[8], search) || isUndifined(data[9], search) || isUndifined(data[10], search)) {
                    return true;
                }
                return false;
            }
        );

        // Create date inputs
        $('#search-filter').on('change', function() {
            search = $('#search-filter').val().toLowerCase();
        });

        // DataTables initialisation
        var table = $('#datatable').DataTable();

        // Refilter the table
        $('#min, #max, #loc-filter, #stats-filter, #search-filter').on('change', function() {
            table.draw();
        });
    };

    TEMP.Alert = function() {
        let c = $("#alert_").text();
        if (c == 'success') {
            swal({
                position: 'center',
                icon: 'success',
                title: 'Berhasil',
                text: 'Isotank berhasil dijadwalkan',
                showConfirmButton: false,
                timer: 10000
            })
        } else if (c == 'fail') {
            swal({
                position: 'center',
                icon: 'error',
                title: 'Gagal',
                text: 'Isotank telah terpakai beberapa saat yang lalu, mohon untuk memilih ulang isotank yang lain',
                showConfirmButton: false,
                timer: 10000
            })
        } else if (c == 'duplicate') {
            swal({
                position: 'center',
                icon: 'success',
                title: 'Duplicate Berhasil',
                text: 'Isotank berhasil diduplicate dan berhasil dijadwalkan',
                showConfirmButton: false,
                timer: 10000
            })
        }
    }

    TEMP.ValidationForm = function() {
        $.validator.addMethod("checkPackingList",
            function(value, element) {
                var result = false;
                $.ajax({
                    type: "get",
                    async: false,
                    url: "/isotank/checkPlist/" + $('#PList').val().replaceAll('/', '+'), // script to validate in server side
                    success: function(data) {
                        if (data == 'Ada') { result = false } else { result = true }
                    }
                });
                return result;
            },
            'No Packing List Ini Sudah Pernah Di Buat'
        );

        $("#add-isotank_").validate({
            ignore: ':hidden:not([class~=selectized]),:hidden > .selectized, .selectize-control .selectize-input input',
            rules: {
                PL: {
                    required: true,
                    minlength: 1,
                    checkPackingList: true
                },
                jlhpartai: {
                    required: true,
                },
                outdepo: { required: true, date: true },
                indepo: { required: true, date: true },
                origin: { required: true },
                destinasi: { required: true },
                isotank: { required: true },
                customer: { required: true },
                loading: {
                    required: true,
                    minlength: 1
                },
                bongkar: {
                    required: true,
                    minlength: 1
                },
                transport: { required: true },
            },
            messages: {
                PL: {
                    required: "Mohon Input Nomor Packing List",
                    minlength: "Nomor Packing List Harus Lebih Dari 1 Huruf",
                    checkPackingList: "No Packing List Ini Sudah Pernah Di Buat"
                },
                jlhpartai: {
                    required: "Mohon Input Jumlah Partai",
                },
                outdepo: "Mohon Pilih Tanggal Outdepo",
                indepo: "Mohon Pilih Tanggal Indepo",
                origin: "Mohon Pilih Origin",
                destinasi: "Mohon Pilih Destinasi",
                isotank: "Mohon Pilih Nomor Isotank",
                customer: "Mohon Pilih Customer",
                loading: {
                    required: "Mohon Input Lokasi Loading",
                    minlength: "Lokasi Loading Harus Lebih Dari 1 Huruf Atau Input ' - ' Jika Tidak Ada Lokasi Loading"
                },
                bongkar: {
                    required: "Mohon Input Lokasi Bongkar",
                    minlength: "Lokasi Bongkar Harus Lebih Dari 1 Huruf Atau Input ' - ' Jika Tidak Ada Lokasi Bongkar"
                },
                transport: "Mohon Pilih Transport",
            },
            errorElement: "em",
            errorPlacement: function(error, element) {
                // Add the `help-block` class to the error element
                error.addClass("help-block");

                if (element.prop("type") === "checkbox") {
                    error.insertBefore(element.parent("label"));
                } else {
                    error.insertBefore(element);
                }
            },
            highlight: function(element, errorClass, validClass) {
                $(element).parents(".col-sm-5").addClass("has-error").removeClass("has-success");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).parents(".col-sm-5").addClass("has-success").removeClass("has-error");
            }
        });
    }

    TEMP.LimitDateEdit = function() {
        var limitdate = function (date, dateby) {
            $(dateby).on('change', function() {
                if ($(date).val() <= $(dateby).val()) {
                    $(date).val($(dateby).val());
                }
            });

            $(date).on('change', function() {
                if ($(date).val() < $(dateby).val()) {
                    alert("Tanggal tidak boleh di bawah " + $(dateby).val());
                    $(date).val($(dateby).val());
                }
            });
        }

        limitdate('#limitdate1','#startDate_');
        limitdate('#limitdate2','#startDate_');
        limitdate('#limitdate3','#startDate_');
        limitdate('#limitdate4','#startDate_');
        limitdate('#limitdate5','#startDate_');
        limitdate('#limitaddisotank1','#startDate');
        limitdate('#limitaddisotank2','#startDate');
        limitdate('#limitaddisotank3','#startDate');
        limitdate('#limitaddisotank4','#startDate');
        limitdate('#limitaddisotank5','#startDate');
        limitdate('#endDate','#startDate');
        limitdate('#limitdupisotank1','#startDate_');
        limitdate('#limitdupisotank2','#startDate_');
        limitdate('#limitdupisotank3','#startDate_');
        limitdate('#limitdupisotank4','#startDate_');
        limitdate('#limitdupisotank5','#startDate_');
        limitdate('#limitdupisotank6','#startDate_');
        limitdate('#endDate_','#startDate_');
    }

    TEMP.CheckIfstartenddate_change = function () {
        var check = function(arg){
            if($(arg).length){ $(arg).trigger("click");} 
        }
        $('#startDate, #endDate, #startDate_, #endDate_').on('change', function() {
           check('#checkISO_');
           check('#checkISO');
        });
    }

    TEMP.checkbox_all = function () {
        $('#select-all').click(function(event) {   
            if(this.checked) {
                // Iterate each checkbox
                $(':checkbox').each(function() {
                    this.checked = true;                        
                });
            } else {
                $(':checkbox').each(function() {
                    this.checked = false;                       
                });
            }
        }); 
    }

    TEMP.Export = function(){
        $document.on('click', '#export', function(e) {
            e.preventDefault(); 
            var tgl1 = isEmpty($('#min').val()) ? 'NULL' : $('#min').val();
            var tgl2 = isEmpty($('#max').val()) ? 'NULL' : $('#max').val();
            var loc = isEmpty($('#loc-filter').val()) ?  'NULL' : $('#loc-filter').val();
            var stats = isEmpty($('#stats-filter').val()) ? 'NULL' : $('#stats-filter').val();

            window.location.href = "/isotank/transaksi/export-excel/"+tgl1+"/"+tgl2+"/"+loc+"/"+stats;
        });
    }

    $document.ready(function() {
        isUrl('isotank/info/', urls) ? TEMP.fetchMonthly() : TEMP.Loadisotank(),
            isUrl('isotank/create', urls) ? TEMP.SelectItem() : TEMP.SelectItem_II(),
            isUrl('/master/data/', urls) ? TEMP.DatatableIII() : TEMP.Datatable(),
            TEMP.LimitDateEdit(),
            TEMP.Alert(),
            TEMP.ValidationForm(),
            TEMP.Loadisotank_II(),
            TEMP.Export(),
            TEMP.CheckIfstartenddate_change()
    });
})(jQuery);