(function($) {
    'use strict';
    var TEMP = {};
    var $document = $(document);
    var start, end;
    var urls = window.location.pathname;

    // FUNCTION =============================
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
        start = $('#startDate').val();
        end = $('#endDate').val();
        $('#endDate').on('change', function() { end = $('#endDate').val(); });
        $('#startDate').on('change', function() { start = $('#startDate').val(); });

        $document.on('click', '#checkISO', function() {
            if (start != undefined || end != undefined) {
                document.getElementById('disable-').style.pointerEvents = 'visible';
                document.getElementById('disable-').style.opacity = '1';
                document.getElementById('disable2-').style.pointerEvents = 'visible';
                document.getElementById('disable2-').style.opacity = '1';
                $("#isotank_").selectize()[0].selectize.destroy();
                loadiso(start, end, $('#origin_').val(), '#isotank_');
            } else { alert('tanggal kosong'); }
        });
    };

    TEMP.SelectItem = function() {
        setOptionIso('#isotank_', [], 'Silahkan Pilih Tanggal Dahulu');
        setOptionIso('#cust_', PushOptions(cust), 'Pilih Customer');
        setOptionIso('#transport_', PushOptions(tra), 'Pilih Transport');
        setOptionIso('#origin_', PushOptions(loc), 'Pilih Lokasi');
        setOptionIso('#destinasi_', PushOptions(loc), 'Pilih Lokasi');
    };

    TEMP.Loadisotank_II = function() {
        start = $('#startDate_').val();
        end = $('#endDate_').val();
        $('#endDate_').on('change', function() { end = $('#endDate_').val(); });
        $('#startDate_').on('change', function() { start = $('#startDate_').val(); });

        $document.on('click', '#checkISO_', function() {
            if (start != undefined || end != undefined) {
                $('#select_opt_isotank').selectize()[0].selectize.destroy();
                loadiso(start, end, $('#select_opt_origin').val(), '#select_opt_isotank');
            } else { alert('tanggal kosong'); }
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
    function isFilter(min, max, location, stats, outdepo, indepo, data, search) {
        if ((min != undefined || min != "" || isNaN(min)) && (max != undefined || max != "" || isNaN(max)) && (location != 'SMA') && (stats != 'SMA') && (search !== undefined || search != '')) {
            console.log('1');
            return (data[5].substring(0, 3) == location) && (data[0].includes(stats) && (data[1].includes(search.toUpperCase()) || data[2].includes(search.toUpperCase()) || data[5].includes(search.toUpperCase()) || data[6].includes(search.toUpperCase()) || data[7].includes(search.toUpperCase()) || data[8].includes(search.toUpperCase()) || data[9].includes(search.toUpperCase()) || data[10].includes(search.toUpperCase())));
        }
        // if ((location != 'SMA') && (stats != 'SMA') && (search !== undefined || search != '')) {
        //     return (data[5].substring(0, 3) == location) && (data[0].includes(stats) && (data[1].includes(search.toUpperCase()) || data[2].includes(search.toUpperCase()) || data[5].includes(search.toUpperCase()) || data[6].includes(search.toUpperCase()) || data[7].includes(search.toUpperCase()) || data[8].includes(search.toUpperCase()) || data[9].includes(search.toUpperCase()) || data[10].includes(search.toUpperCase())));
        // }

        if ((min != undefined || min != "" || isNaN(min)) && (max != undefined || max != "" || isNaN(max)) && (location != 'SMA') && (stats != 'SMA') && (search === undefined || search == '')) {
            console.log('2');
            return (data[5].substring(0, 3) == location) && (data[0].includes(stats));
        }

        if ((min != undefined || min != "" || isNaN(min)) && (max != undefined || max != "" || isNaN(max)) && (location != 'SMA') && (search === undefined || search == '')) {
            console.log('3');
            return data[5].substring(0, 3) == location;
        }
        if ((min <= outdepo && outdepo <= max) || (min <= indepo && indepo <= max)) {
            console.log('4');
            return true;
        }
        if ((min == outdepo || min == indepo) && (isNaN(max) || max === undefined || max == '')) {
            console.log('5');
            return true;
        }
        if ((location != 'SMA') && (stats == 'SMA') && (search === undefined || search == '')) {
            console.log('6');
            return data[5].substring(0, 3) == location;
        }
        if ((stats != 'SMA') && (location == 'SMA') && (search === undefined || search == '')) {
            console.log('7');
            return data[0].includes(stats);
        }
        if ((search != '') && (data[1].includes(search.toUpperCase()) || data[2].includes(search.toUpperCase()) || data[5].includes(search.toUpperCase()) || data[6].includes(search.toUpperCase()) || data[7].includes(search.toUpperCase()) || data[8].includes(search.toUpperCase()) || data[9].includes(search.toUpperCase()) || data[10].includes(search.toUpperCase()))) {
            console.log('8');
            return (data[1].includes(search.toUpperCase()) || data[2].includes(search.toUpperCase()) || data[5].includes(search.toUpperCase()) || data[6].includes(search.toUpperCase()) || data[7].includes(search.toUpperCase()) || data[8].includes(search.toUpperCase()) || data[9].includes(search.toUpperCase()) || data[10].includes(search.toUpperCase()));
        }

        return data[3] || data[5];
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
                if (isFilter(min, max, location, stats, outdepo, indepo, data, search)) {
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
            search = $('#search-filter').val().toUpperCase();
        });

        // DataTables initialisation
        var table = $('#datatable').DataTable();

        // Refilter the table
        $('#min, #max, #loc-filter, #stats-filter, #search-filter').on('change', function() {
            table.draw();
        });
    };
    // ===================================

    $document.ready(function() {
        isUrl('isotank/info/', urls) ? TEMP.fetchMonthly() : TEMP.Loadisotank(),
            isUrl('isotank/create', urls) ? TEMP.SelectItem() : TEMP.SelectItem_II(),
            TEMP.Datatable(),
            TEMP.Loadisotank_II()
    });
})(jQuery);