(function($) {
    "use strict";
    var TEMP = {};
    var $document = $(document);


    function isUrl(url) {
        return (window.location.href.indexOf(url) > -1) ? true : false;
    };

    function today() {
        let today = new Date();
        return today;
    }

    function setUrlDatabase() {
        return $.ajax({
            url: 'http://127.0.0.1:8000/Fetching/Containers/Month',
            type: 'GET',
            dataType: 'Json',
            complete: functionReturningPromise
        });
    }

    function functionReturningPromise(data) {
        // setUrlDatabase().success(data => alert(data));
        // setUrlDatabase().then(data => alert(data)).catch(error => alert(error))
        // console.log(setUrlDatabase().success(data => alert(data)));
        try {
            data
        } catch (error) {

        }
        return data;
    }

    TEMP.fetchMonthly = function() {
        setUrlDatabase();
        try {
            console.log(functionReturningPromise());
        } catch (error) {

        }

        $('#calendar-list').fullCalendar({
            viewRender: function(view, element) {
                console.log(new Date($('#calendar-list').fullCalendar('getView').end._i));
                console.log(new Date($('#calendar-list').fullCalendar('getView').start._i));
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
                        let start = (getDate.getFullYear()) + "-" + (("0" + (getDate.getMonth() + 1)).slice(-2)) + "-" + (("0" + getDate.getDate()).slice(-2));
                        let end = (getDate.getFullYear()) + "-" + (("0" + (getDate.getMonth() + 1)).slice(-2)) + "-" + (("0" + (getDate.getDate() + 7)).slice(-2));

                        $('#modal2').modal('show');
                        document.getElementById("startDate").value = start;
                        document.getElementById("endDate").value = end;
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
            eventLimit: true, // allow "more" link when too many events
            timeZone: 'UTC+7',
            events: events,
            eventClick: function(event, jsEvent, view) {
                $('#modalTitle').html(event.title);
                $('#modalBody').html(event.description);
                $('#start').html(event.start);
                $('#end').html(event.end);
                $('#calendarModal').modal();
            }
        });


        //========== PUSH EVENTS ==================
        function PushEvents(data) {
            var events = [];
            for (var i = 0; i < data['Month'].length; i++) {
                {
                    events.push({
                        title: data['Month'][i].Code,
                        start: data['Month'][i].start,
                        end: data['Month'][i].end,
                        description: data['Month'][i].packinglist,
                        color: data['Month'][i].Colors,
                    })
                }
            };
            return events;
        }
    };

    $document.ready(function() {
        isUrl('Isotank') ? TEMP.fetchMonthly() : ''
    });
})(jQuery);