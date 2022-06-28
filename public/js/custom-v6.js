(function($) {
    'use strict';
    var TEMP = {};
    var $document = $(document);
    var start, end;
    var urls = window.location.href.split("/").pop();

    // FUNCTION =============================
    function isUrl(path, url) {
        return (window.location.href.indexOf(path + parseInt(url)) > -1) ? true : false;
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

    function loadiso(start, end, loc) {
        $.ajax({
            url: '/isotank/checkiso/' + start + '/' + end + '/' + loc,
            type: 'GET',
            dataType: 'Json',
            success: function(data) {
                if (data == '') { setOptionIso('#isotank_', [], 'Isotank tidak ada') } else {
                    setOptionIso('#isotank_', PushOptions(data), 'Pilih Isotank');
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
        console.log(data.length);
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
                loadiso(start, end, $('#origin_').val());
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
    // ===================================



    // ISOTANK DETAIL (VIEW)
    TEMP.fetchMonthly = function() {
        $.ajax({
            url: "/isotank/calendar/" + urls,
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
    TEMP.Datatable = function() {
        var minDate, maxDate;
        var location, stats = 'SMA';

        // $.fn.dataTable.render.moment = function(from, to, locale) {
        //     // Argument shifting
        //     if (arguments.length === 1) {
        //         locale = 'en';
        //         to = from;
        //         from = 'YYYY-MM-DD';
        //     } else if (arguments.length === 2) {
        //         locale = 'en';
        //     }

        //     return function(d, type, row) {
        //         if (!d) {
        //             return type === 'sort' || type === 'type' ? 0 : d;
        //         }

        //         var m = window.moment(d, from, locale, true);

        //         // Order and type get a number value from Moment, everything else
        //         // sees the rendered value
        //         return m.format(type === 'sort' || type === 'type' ? 'x' : to);
        //     };
        // };

        function format(d) {
            // `d` is the original data object for the row
            return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
                '<tr>' +
                '<td>' + d.stats + '</td>' +
                '<td>' + d.code + '</td>' +
                '<td>' + d.transnumber + '</td>' +
                '<td>' + d.tgl_outdepo + '</td>' +
                '<td>' + d.tgl_indepo + '</td>' +
                '<td>' + d.des + '</td>' +
                '<td>' + d.customername + '</td>' +
                '<td>' + d.lokasi_loading + '</td>' +
                '</tr>' +
                '</table>';
        }

        var table = $('#datatable').DataTable({
            ajax: {
                url: 'isotank/fetching/containers/get',
                dataSrc: 'Isotank',
                type: "GET"
            },
            columns: [
                { title: 'Status', data: 'stats' },
                { title: 'No. Isotank', data: 'code' },
                { title: 'Transaction', data: 'transnumber' },
                {
                    title: 'OutDepo Date',
                    data: 'tgl_outdepo',
                    render: function(data, type, row) {
                        return moment(new Date(data).toString()).format('DD MMM YYYY');
                    }
                },
                {
                    title: 'InDepo Date',
                    data: 'tgl_indepo',
                    render: function(data, type, row) {
                        return moment(new Date(data).toString()).format('DD MMM YYYY');
                    }
                },
                { title: 'Current Loc.', data: 'des' },
                { title: 'Customer', data: 'customername' },
                { title: 'Load Loc.', data: 'lokasi_loading' },
                { title: 'Unload Loc', data: 'lokasi_bongkar' },
                { title: 'Transport', data: 'vessel' },
                { title: 'Packing List No', data: 'packinglist_no' },
                { title: 'Cargo', data: 'cargo' },
                { title: 'Party', data: 'partai' },
            ],
            scrollX: true,
            iDisplayLength: 15,
            bLengthChange: false,
            ordering: false
        });

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

        // Refilter the table
        $('#min, #max, #loc-filter, #stats-filter').on('change', function() {
            $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
                    var min = minDate;
                    var max = maxDate;
                    var outdepo = new Date(data[3]).getTime();
                    var indepo = new Date(data[4]).getTime();
                    if (
                        ((min === undefined && max === undefined) ||
                            (min === undefined && indepo <= max) ||
                            (min <= outdepo && max === undefined) ||
                            (isNaN(min) && isNaN(max)) ||
                            (min === undefined && isNaN(max)) ||
                            (isNaN(min) && max === undefined) ||
                            (isNaN(min) && indepo <= max) ||
                            (outdepo >= min && isNaN(max)) ||
                            (outdepo >= min && outdepo <= max) ||
                            (indepo >= min && indepo <= max) ||
                            (data[3] == "")) &&
                        (location != 'SMA' ? data[5].substring(0, 3) == location : data[5]) &&
                        (stats != 'SMA' ? data[0].includes(stats) : data[0])
                    ) {
                        return true;
                    }
                    return false;
                }
            );
            table.draw();
        });
    };
    // ===================================


    $document.ready(function() {
        isUrl('isotank/', urls) ? TEMP.fetchMonthly() : TEMP.Loadisotank(),
            TEMP.Datatable()
            // TEMP.SelectItem()
    });
})(jQuery);