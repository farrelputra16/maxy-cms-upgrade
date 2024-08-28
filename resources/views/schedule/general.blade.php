@extends('layout.main-v3')

@section('title', 'General Schedule')

@section('style')
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
    .fc-tooltip {
        position: absolute;
        z-index: 10000;
        background-color: #fff;
        border: 1px solid #ccc;
        padding: 10px;
        border-radius: 5px;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
    }
</style>
@endsection

@section('content')
<select id="academic-period">
    <option value="">Select Academic Period</option>
    <option value="1">Ganjil 2004</option>
    <option value="2">Genap 2004</option>
    <option value="3">Ganjil 2005</option>
    <option value="4">Genap 2005</option>
    <!-- Populate with available periods -->
</select>

<div id='external-events'>
    <!-- List of classes -->
    @foreach ($course_class as $schedule)
        <div class='fc-event' data-id="{{ $schedule->id }}">{{ $schedule->slug }}</div>
    @endforeach
</div>

<div id='calendar'></div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        let calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
            headerToolbar: {
                left: '',
                center: 'title',
                right: ''
            },
            initialView: 'timeGridWeek',
            editable: true,
            droppable: true,
            allDaySlot: false,
            slotMinTime: '08:00:00',
            slotMaxTime: '20:00:00',
            dayHeaderFormat: { weekday: 'long' }, // Display only day names
            hiddenDays: [],
            defaultTimedEventDuration: '02:00:00', // 1-hour default duration
            forceEventDuration: true,
            eventContent: function(info) {
                let startTime = info.event.start.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
                // Format the end time if available
                let endTime = info.event.end ? info.event.end.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }) : '';
                return {
                    html: `<div class="fc-event-title">${info.event.title}</div><div class="fc-event-title">${startTime} - ${endTime}</div>`
                };
            },
            events: function(fetchInfo, successCallback, failureCallback) {
                let academicPeriod = $('#academic-period').val();
                if (academicPeriod) {
                    $.ajax({
                        url: "{{ route('getAddGeneralSchedule') }}",
                        dataType: 'json',
                        data: { period: academicPeriod },
                        success: function(data) {//console.log(data);
                            successCallback(data);
                        }
                    });
                }
            },
            eventReceive: function(info) {console.log('eventReceive');
                handleEventUpdate(info,'c');

                // let startTime = info.event.start;
                // let endTime = info.event.end;
                // if (startTime) {
                //     let today = new Date();
                //     let datePart = today.toISOString().split('T')[0]; // "YYYY-MM-DD"

                //     let start_time = startTime.toTimeString().split(' ')[0]; // "HH:MM:SS"
                //     let end_time = endTime ? endTime.toTimeString().split(' ')[0] : null; // "HH:MM:SS"

                //     let eventData = {
                //         id: info.event.id,
                //         day: startTime.getUTCDay(), // Get day of the week (0 for Sunday, 1 for Monday, etc.)
                //         start_time: datePart + ' ' +start_time,
                //         end_time: datePart + ' ' +end_time,
                //         title: info.event.id,
                //         academic_period: $('#academic-period').val(),
                //     };

                //     // Save to database
                //     $.ajax({
                //         url: "{{ route('postAddGeneralSchedule') }}",
                //         method: 'POST',
                //         data: eventData,
                //         headers: {
                //             'X-CSRF-TOKEN': document.querySelector(
                //                 'meta[name="csrf-token"]').getAttribute('content')
                //         },
                //         success: function(response) {
                //             if (response.conflict) {
                //                 info.event.setProp('backgroundColor', 'red');
                //             } else {
                //                 info.event.setProp('backgroundColor', 'blue');
                //             }
                //         }
                //     });
                // } else {
                //     console.error('Event start time is null or undefined');
                // }
            },
            eventDrop: function(info) {console.log('eventDrop');
                handleEventUpdate(info,'u');
                
                // let startTime = info.event.start;
                // let endTime = info.event.end;
                // if (startTime) {
                //     let datePart = startTime.toISOString().split('T')[0]; // "YYYY-MM-DD"
                //     let start_time = startTime.toTimeString().split(' ')[0]; // "HH:MM:SS"
                //     let end_time = endTime ? endTime.toTimeString().split(' ')[0] : null; // "HH:MM:SS"

                //     let eventData = {
                //         id: info.event.id,
                //         day: startTime.getUTCDay(),
                //         start_time: datePart + ' ' + start_time,
                //         end_time: datePart + ' ' + end_time,
                //         academic_period: $('#academic-period').val(),
                //     };

                //     // Update in the database
                //     $.ajax({
                //         url: "{{ route('postEditGeneralSchedule') }}", // Make sure this route handles update logic
                //         method: 'POST',
                //         data: eventData,
                //         headers: {
                //             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                //         },
                //         success: function(response) {
                //             if (response.conflict) {
                //                 info.event.setProp('backgroundColor', 'red');
                //             } else {
                //                 info.event.setProp('backgroundColor', 'blue');
                //             }
                //         }
                //     });
                // } else {
                //     console.error('Event start time is null or undefined');
                // }
            },
            eventResize: function(info) {console.log('eventResize');
                handleEventUpdate(info,'u');

                // let startTime = info.event.start;
                // let endTime = info.event.end;
                // if (startTime && endTime) {
                //     let datePart = startTime.toISOString().split('T')[0]; // "YYYY-MM-DD"
                //     let start_time = startTime.toTimeString().split(' ')[0]; // "HH:MM:SS"
                //     let end_time = endTime.toTimeString().split(' ')[0]; // "HH:MM:SS"

                //     let eventData = {
                //         id: info.event.id,
                //         day: startTime.getUTCDay(),
                //         start_time: datePart + ' ' + start_time,
                //         end_time: datePart + ' ' + end_time,
                //         academic_period: $('#academic-period').val(),
                //     };

                //     // Update in the database
                //     $.ajax({
                //         url: "{{ route('postEditGeneralSchedule') }}", // Make sure this route handles update logic
                //         method: 'POST',
                //         data: eventData,
                //         headers: {
                //             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                //         },
                //         success: function(response) {
                //             if (response.conflict) {
                //                 info.event.setProp('backgroundColor', 'red');
                //             } else {
                //                 info.event.setProp('backgroundColor', 'blue');
                //             }
                //         }
                //     });
                // } else {
                //     console.error('Event start time or end time is null or undefined');
                // }
            },
            eventMouseEnter: function(info) {
                // Format the start time
                let startTime = info.event.start.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
                // Format the end time if available
                let endTime = info.event.end ? info.event.end.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }) : '';

                // Create the tooltip content
                let tooltip = `<div class="fc-tooltip">${info.event.title}<br>Start: ${startTime}<br>End: ${endTime}<button class="delete-event-btn">Delete</button></div>`;
                $('body').append(tooltip);

                $(".fc-tooltip").css({
                    top: info.jsEvent.pageY + 10 + 'px',
                    left: info.jsEvent.pageX + 10 + 'px',
                    zIndex: 10000,
                    position: 'absolute',
                    backgroundColor: '#fff',
                    border: '1px solid #ccc',
                    padding: '10px',
                    borderRadius: '5px',
                    boxShadow: '2px 2px 5px rgba(0,0,0,0.3)'
                });

                $(".delete-event-btn").on('click', function() {
                    handleEventUpdate(info, 'd');
                });

                let hideTooltipTimeout;
                $(info.el).on('mouseleave', function() {
                    hideTooltipTimeout = setTimeout(function() {
                        $('.fc-tooltip').remove();
                    }, 2000); // 2 seconds delay before tooltip disappears
                });
            },
        });

        calendar.render();

        $('#academic-period').on('change', function() {
            calendar.refetchEvents();
        });

        new FullCalendar.Draggable(document.getElementById('external-events'), {
            itemSelector: '.fc-event',
            eventData: function(eventEl) {
                return {
                    title: eventEl.innerText,
                    id: $(eventEl).data('id')
                };
            }
        });

        function handleEventUpdate(info, type) {
            let isConflicting = checkForConflicts(info.event);

            if (isConflicting) {
                info.event.setProp('backgroundColor', 'red');
            } else {
                info.event.setProp('backgroundColor', 'blue');

                let startTime = info.event.start;
                let endTime = info.event.end;
                let datePart = startTime.toISOString().split('T')[0]; // "YYYY-MM-DD"

                let start_time = startTime.toTimeString().split(' ')[0]; // "HH:MM:SS"
                let end_time = endTime ? endTime.toTimeString().split(' ')[0] : null; // "HH:MM:SS"

                let eventData = {
                    id: info.event.id,
                    day: startTime.getUTCDay(),
                    start_time: datePart + ' ' + start_time,
                    end_time: datePart + ' ' + end_time,
                    title: info.event.id,
                    academic_period: $('#academic-period').val(),
                };

                if (type=='c')
                    let routeUrl = "{{ route('postAddGeneralSchedule') }}";
                else if (type=='u')
                    let routeUrl = "{{ route('postEditGeneralSchedule') }}";
                else
                    let routeUrl = "{{ route('postDeleteGeneralSchedule') }}";

                // Save to database
                $.ajax({
                    url: routeUrl, // Use your appropriate route
                    method: 'POST',
                    data: eventData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    success: function(response) {
                        if (response.conflict) {
                            info.event.setProp('backgroundColor', 'red');
                        } else {
                            info.event.setProp('backgroundColor', 'blue');
                        }
                    }
                });
            }
        }

        function checkForConflicts(event) {console.log(event);
            let allEvents = calendar.getEvents();
            for (let i = 0; i < allEvents.length; i++) {
                let existingEvent = allEvents[i];console.log(existingEvent);

                // Skip checking the event against itself
                if (existingEvent === event) continue;

                // Check if the event overlaps with any other event
                if (
                    (event.start >= existingEvent.start && event.start < existingEvent.end) || (event.start < existingEvent.start && event.end > existingEvent.end) || (event.end > existingEvent.start && event.end <= existingEvent.end)
                ) {
                    if (event.id!=existingEvent.id)
                        return true;
                }
            }
            return false;
        }
    });
</script>
@endsection
