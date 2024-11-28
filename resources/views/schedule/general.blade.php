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

        .fc-toolbar-title {
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="mb-3">
        <label for="academic-period" class="form-label">Pilih Periode Akademik</label>
        <select id="academic-period" class="form-select">
            <option value="">Pilih Periode Akademik</option>
            @foreach ($academic_periods as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
            <!-- Populasi dengan daftar periode yang tersedia -->
        </select>
    </div>

    <div class="mb-3" id="prodi-container" hidden>
        <label for="prodi" class="form-label">Pilih Program Studi</label>
        <select id="prodi" class="form-select">
            <option value="">Pilih Program Studi</option>
            @foreach ($prodi as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
            <!-- Populasi dengan daftar program studi yang tersedia -->
        </select>
    </div>

    <div class="mb-3">
        <button type="button" class="btn btn-primary" id='publish'>Publikasikan Jadwal</button>
        <span class="ms-2 text-muted" style="font-size: 0.9em;">
            *Klik untuk mempublikasikan jadwal akademik yang telah dijadwalkan
        </span>
    </div>

    <div id='external-events'>
        <!-- Daftar kelas yang tersedia -->
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
                editable: true,
                droppable: true,
                allDaySlot: false,
                slotMinTime: '08:00:00',
                slotMaxTime: '22:00:00',
                slotDuration: '00:15:00',
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
                    if (academicPeriod) {
                        $.ajax({
                            url: "{{ route('getAddGeneralSchedule') }}",
                            dataType: 'json',
                            data: {
                                period: academicPeriod
                            },
                            success: function(data) { //console.log(data);
                                successCallback(data);
                            }
                        });
                    }
                },
                eventReceive: function(info) {
                    console.log('eventReceive');
                    handleEventUpdate(info, 'c');
                },
                eventDrop: function(info) {
                    console.log('eventDrop');
                    handleEventUpdate(info, 'u');
                },
                eventResize: function(info) {
                    console.log('eventResize');
                    handleEventUpdate(info, 'u');
                },
                eventClick: function(info) {
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

                    // Remove any existing tooltips
                    $('.fc-tooltip').remove();

                    // Create the tooltip content
                    let tooltip =
                        `<div class="fc-tooltip">${info.event.title}<br>Start: ${startTime}<br>End: ${endTime}<button class="delete-event-btn">Delete</button></div>`;
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
                        Swal.fire({
                            title: 'Konfirmasi Hapus',
                            text: "Apakah Anda yakin ingin menghapus event ini?",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ya, hapus!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                handleEventUpdate(info,
                                    'd'); // Panggil fungsi untuk menghapus event
                                Swal.fire(
                                    'Terhapus!',
                                    'Event telah berhasil dihapus.',
                                    'success'
                                );
                            }
                        });
                    });

                    $(document).on('click', function(e) {
                        // Check if click is outside the tooltip and event element
                        if (!$(e.target).closest('.fc-tooltip, .fc-event').length) {
                            $('.fc-tooltip').remove();
                        }
                    });
                },
            });

            calendar.render();

            $('#academic-period').on('change', function() {
                let selectedPeriod = $(this).val();
                if (selectedPeriod) {
                    $('#prodi-container').removeAttr('hidden'); // Tampilkan dropdown Prodi
                    calendar.refetchEvents(); // Refetch event berdasarkan period
                } else {
                    $('#prodi-container').attr('hidden', true); // Sembunyikan dropdown Prodi
                    $('#prodi').val(''); // Reset nilai Prodi
                    calendar.removeAllEvents();
                }

                $.ajax({
                    url: "{{ route('getOngoingCourseClassByCourseCategory') }}",
                    dataType: 'json',
                    data: {
                        prodi: $('#prodi').val(),
                        academic_period: $('#academic-period').val()
                    },
                    success: function(data) {
                        $('#external-events').html('');

                        // Menampilkan kelas yang memiliki tutor
                        data.classWithTutor.forEach(item => {
                            $('#external-events').append(
                                `<div class='fc-event' data-id="${item.id}">${item.slug}</div>`
                            );
                        });

                        // Menampilkan pesan dan kelas yang tidak memiliki tutor
                        if (data.classWithoutTutor.length > 0) {
                            $('#external-events').append(
                                "<br><p style='text-align: center;'><strong>Kelas-kelas di bawah ini tidak dapat ditambahkan karena belum memiliki pengajar</strong></p>"
                            );
                            data.classWithoutTutor.forEach(item => {
                                $('#external-events').append(
                                    `<div class='fc-event no-tutor' data-id="${item.id}" style="background-color: #ffcccc; draggable: false">${item.slug}</div>`
                                );
                            });
                        }
                    }
                });
            });

            $('#prodi').on('change', function() {
                $.ajax({
                    url: "{{ route('getOngoingCourseClassByCourseCategory') }}",
                    dataType: 'json',
                    data: {
                        prodi: $('#prodi').val(),
                        academic_period: $('#academic-period').val()
                    },
                    success: function(data) {
                        $('#external-events').html('');

                        // Menampilkan kelas yang memiliki tutor
                        data.classWithTutor.forEach(item => {
                            $('#external-events').append(
                                `<div class='fc-event' data-id="${item.id}">${item.slug}</div>`
                            );
                        });

                        // Menampilkan pesan dan kelas yang tidak memiliki tutor
                        if (data.classWithoutTutor.length > 0) {
                            $('#external-events').append(
                                "<br><p style='text-align: center;'><strong>Kelas-kelas di bawah ini tidak dapat ditambahkan karena belum memiliki pengajar</strong></p>"
                            );
                            data.classWithoutTutor.forEach(item => {
                                $('#external-events').append(
                                    `<div class='fc-event no-tutor' data-id="${item.id}" style="background-color: #ffcccc; draggable: false">${item.slug}</div>`
                                );
                            });
                        }
                    }
                });
            });

            $('#publish').on('click', function() {
                $.ajax({
                    url: "{{ route('postSaveGeneralSchedule') }}",
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        academic_periods: $('#academic-period').val()
                    },
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .getAttribute('content')
                    },
                    success: function(data) {
                        console.log(data);
                        // Tampilkan notifikasi sukses menggunakan SweetAlert
                        Swal.fire({
                            title: 'Sukses!',
                            text: 'Jadwal telah berhasil dipublikasikan.',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });
                    },
                    error: function(xhr, status, error) {
                        // Tampilkan notifikasi error jika terjadi kesalahan
                        Swal.fire({
                            title: 'Error!',
                            text: 'Terjadi kesalahan saat mempublikasikan jadwal.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            });


            new FullCalendar.Draggable(document.getElementById('external-events'), {
                itemSelector: '.fc-event:not(.no-tutor)',
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
                    let datePart = startTime.toISOString().split('T')[0];

                    let start_time = startTime.toTimeString().split(' ')[0];
                    let end_time = endTime ? endTime.toTimeString().split(' ')[0] : null;

                    let eventData = {
                        id: info.event.id,
                        day: startTime.getUTCDay(),
                        start_time: datePart + ' ' + start_time,
                        end_time: datePart + ' ' + end_time,
                        title: info.event.id,
                        academic_period: $('#academic-period').val(),
                    };

                    let routeUrl;
                    if (type === 'c') {
                        routeUrl = "{{ route('postAddGeneralSchedule') }}";
                    } else if (type === 'u') {
                        routeUrl = "{{ route('postEditGeneralSchedule') }}";
                    } else {
                        routeUrl = "{{ route('postDeleteGeneralSchedule') }}";
                    }

                    $.ajax({
                        url: routeUrl,
                        method: 'POST',
                        data: eventData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content')
                        },
                        success: function(response) {
                            if (response.conflict) {
                                info.event.setProp('backgroundColor', 'red');
                            } else {
                                info.event.remove(); // Hapus event dari tampilan kalender
                                calendar.refetchEvents(); // Ambil data terbaru dari server
                            }
                        }
                    });
                }
            }


            function checkForConflicts(event) {
                console.log(event);
                let allEvents = calendar.getEvents();
                for (let i = 0; i < allEvents.length; i++) {
                    let existingEvent = allEvents[i];
                    console.log(existingEvent);

                    // Skip checking the event against itself
                    if (existingEvent === event) continue;

                    // Check if the event overlaps with any other event
                    if (
                        (event.start >= existingEvent.start && event.start < existingEvent.end) || (event.start <
                            existingEvent.start && event.end > existingEvent.end) || (event.end > existingEvent
                            .start && event.end <= existingEvent.end)
                    ) {
                        if (event.id != existingEvent.id)
                            return true;
                    }
                }
                return false;
            }
        });
    </script>
@endsection
