(function($) {
    "use strict";
    var TEMP = {};
    var $window = $(window),
        $document = $(document);


    function isIsotank() {
        console.log(window.location.href.indexOf("Isotank"));
        return (window.location.href.indexOf("Isotank") > -1) ? true : false;
    };

    TEMP.fetchMonthly = function() {
        $.ajax({
            url: 'http://127.0.0.1:8000/Fetching/Containers/Month',
            type: 'GET',
            dataType: 'Json',
            success: function(data) {
                var getDate;
                // PUSH EVENTS
                var events = PushEvents(data);

                // SET EVENTS
                SetEvents(events);

            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("Status: " + textStatus);
                alert("Error: " + errorThrown);
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

        //========== SET EVENTS ==================
        function SetEvents(events) {
            $('#calendar-list').fullCalendar({
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
                viewRender: function(view, element) {
                    getDate = new Date($('#calendar-list').fullCalendar('getView').start._i);
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
                },
            });
        }
    };

    $document.ready(function() {
        isIsotank ? TEMP.fetchMonthly() : "";
    });
})(jQuery);