@extends('layout.main-v3')

@section('title', 'Schedule')

@section('style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/cms-v3/libs/tui-time-picker/tui-time-picker.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/cms-v3/libs/tui-date-picker/tui-date-picker.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/cms-v3/libs/tui-calendar/tui-calendar.min.css') }}" />
    <style>
        #tui-full-calendar-schedule-private,
        .tui-full-calendar-section-allday,
        .tui-full-calendar-section-state {
            display: none !important;
        }
    </style> --}}
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

        .fc-toolbar-title {
            display: none;
        }
    </style>
@endsection

@section('content')
    {{-- <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div id="lnb">

                        <div id="right">
                            <div id="menu" class="mb-3">

                                <span id="menu-navi"
                                    class="d-sm-flex flex-wrap text-center text-sm-start justify-content-sm-between">
                                    <h4 id="renderRange" class="render-range fw-bold pt-1 mx-3"></h4>
                                </span>
                            </div>
                        </div>

                        <button onclick="triggerSchedulePopup()" class="btn btn-primary lnb-new-schedule-btn">Add
                            Schedule</button>
                        <div id="calendarList" class="lnb-calendars-d1 mt-4 mt-sm-0 me-sm-0 mb-4"></div>

                        <div id="calendar" style="height: 800px;"></div>

                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="mb-3">
        <label for="exampleSelect" class="form-label">Select Academic Period</label>
        <select id="academic-period" class="form-select">
            <option value="">Select Academic Period</option>
            @foreach ($academic_periods as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
            <!-- Populate with available periods -->
        </select>
    </div>

    <div id="no-academic-period-alert" class="alert alert-warning" style="display: none;">
        Silakan pilih periode akademik terlebih dahulu.
    </div>

    <div id="no-schedule-alert" class="alert alert-warning" style="display: none;">
        Tidak ada jadwal untuk periode akademik yang dipilih. <a href="{{ route('getGeneralSchedule') }}"
            class="text-primary"><u>Tambahkan
                Jadwal!</u></a>
    </div>

    <div id='calendar'></div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            let calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
                headerToolbar: {
                    left: '',
                    center: 'title',
                    right: ''
                },
                initialView: 'timeGridWeek',
                editable: false,
                droppable: false,
                allDaySlot: false,
                slotMinTime: '08:00:00',
                slotMaxTime: '22:00:00',
                dayHeaderFormat: {
                    weekday: 'long'
                }, // Display only day names
                hiddenDays: [],
                defaultTimedEventDuration: '02:00:00', // 1-hour default duration
                forceEventDuration: true,
                eventContent: function(info) {
                    let startTime = info.event.start.toLocaleTimeString([], {
                        hour: '2-digit',
                        minute: '2-digit'
                    });
                    // Format the end time if available
                    let endTime = info.event.end ? info.event.end.toLocaleTimeString([], {
                        hour: '2-digit',
                        minute: '2-digit'
                    }) : '';
                    return {
                        html: `<div class="fc-event-title">${info.event.title}</div><div class="fc-event-title">${startTime} - ${endTime}</div>`
                    };
                },
                events: function(fetchInfo, successCallback, failureCallback) {
                    let academicPeriod = $('#academic-period').val();

                    if (!academicPeriod) {
                        $('#no-academic-period-alert').show();
                        $('#no-schedule-alert').hide();
                        successCallback([]);
                        return;
                    } else {
                        $('#no-academic-period-alert').hide();
                    }

                    if (academicPeriod) {
                        $.ajax({
                            url: "{{ route('getAddSchedule') }}",
                            dataType: 'json',
                            data: {
                                period: academicPeriod
                            },
                            success: function(data) {
                                if (data.length === 0) {
                                    $('#no-schedule-alert').show();
                                } else {
                                    $('#no-schedule-alert').hide();
                                }
                                successCallback(data);
                            },
                        });
                    }
                },
                eventMouseEnter: function(info) {
                    // Format the start time
                    let startTime = info.event.start.toLocaleTimeString([], {
                        hour: '2-digit',
                        minute: '2-digit'
                    });
                    // Format the end time if available
                    let endTime = info.event.end ? info.event.end.toLocaleTimeString([], {
                        hour: '2-digit',
                        minute: '2-digit'
                    }) : '';

                    // Create the tooltip content
                    let tooltip =
                        `<div class="fc-tooltip">${info.event.title}<br>Start: ${startTime}<br>End: ${endTime}</div>`;
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
                $('#no-schedule-alert').hide();
                $('#no-academic-period-alert').hide();
                calendar.refetchEvents();
            });
        });
    </script>
@endsection
