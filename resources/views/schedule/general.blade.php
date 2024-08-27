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
                        success: function(data) {console.log(data);
                            successCallback(data);
                        }
                    });
                }
            },
            eventReceive: function(info) {
                let startTime = info.event.start;
                let endTime = info.event.end;
                if (startTime) {
                    let start_time = startTime.toTimeString().split(' ')[0]; // "HH:MM:SS"
                    let end_time = endTime ? endTime.toTimeString().split(' ')[0] : null; // "HH:MM:SS"

                    let eventData = {
                        class_id: info.event.extendedProps.id,
                        day: startTime.getUTCDay(), // Get day of the week (0 for Sunday, 1 for Monday, etc.)
                        start_time: start_time,
                        end_time: end_time,
                        title: info.event.id,
                        academic_period: $('#academic-period').val(),
                    };

                    // Save to database
                    $.ajax({
                        url: "{{ route('postAddGeneralSchedule') }}",
                        method: 'POST',
                        data: eventData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector(
                                'meta[name="csrf-token"]').getAttribute('content')
                        },
                        success: function(response) {
                            if (response.conflict) {
                                info.event.setProp('backgroundColor', 'red');
                            } else {
                                info.event.setProp('backgroundColor', 'blue');
                            }
                        }
                    });
                } else {
                    console.error('Event start time is null or undefined');
                }
            },
            eventMouseEnter: function(info) {
                // Format the start time
                let startTime = info.event.start.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
                // Format the end time if available
                let endTime = info.event.end ? info.event.end.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }) : '';

                // Create the tooltip content
                let tooltip = `<div class="fc-tooltip">${info.event.title}<br>Start: ${startTime}<br>End: ${endTime}</div>`;
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

                $(info.el).on('mouseleave', function() {
                    $('.fc-tooltip').remove();
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
    });
</script>
<script>
    @foreach ($schedules as $schedule)
        var schedule_date_start = new Date("{{ $schedule->date_start }}");
        var schedule_date_end = new Date("{{ $schedule->date_end }}");
        
    @endforeach
</script>
@endsection
