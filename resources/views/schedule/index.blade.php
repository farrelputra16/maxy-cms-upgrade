@extends('layout.main-v3')

@section('title', 'Schedule')

@section('style')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/cms-v3/libs/tui-time-picker/tui-time-picker.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/cms-v3/libs/tui-date-picker/tui-date-picker.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/cms-v3/libs/tui-calendar/tui-calendar.min.css') }}" />
<style>
    #tui-full-calendar-schedule-private, .tui-full-calendar-section-allday, .tui-full-calendar-section-state {
        display: none !important;
    }
</style>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div id="lnb">
                
                    <div id="right">
                        <div id="menu" class="mb-3">
                
                            <span id="menu-navi" class="d-sm-flex flex-wrap text-center text-sm-start justify-content-sm-between">
                                <h4 id="renderRange" class="render-range fw-bold pt-1 mx-3"></h4>
                            </span>
                        </div>
                    </div>
                
                    <button onclick="triggerSchedulePopup()" class="btn btn-primary lnb-new-schedule-btn">Add Schedule</button>
                    <div id="calendarList" class="lnb-calendars-d1 mt-4 mt-sm-0 me-sm-0 mb-4"></div>
                
                    <div id="calendar" style="height: 800px;"></div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('assets/cms-v3/libs/tui.code-snippet/tui.code-snippet.min.js') }}"></script>
<script src="{{ asset('assets/cms-v3/libs/tui-dom/tui-dom.min.js') }}"></script>
<script src="{{ asset('assets/cms-v3/libs/tui-time-picker/tui-time-picker.min.js') }}"></script>
<script src="{{ asset('assets/cms-v3/libs/tui-date-picker/tui-date-picker.min.js') }}"></script>
<script src="{{ asset('assets/cms-v3/libs/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/cms-v3/libs/chance/chance.min.js') }}"></script>
<script src="{{ asset('assets/cms-v3/libs/tui-calendar/tui-calendar.min.js') }}"></script>
<!-- <script src="{{ asset('assets/cms-v3/js/pages/calendars.js') }}"></script>
<script src="{{ asset('assets/cms-v3/js/pages/schedules.js') }}"></script>
<script src="{{ asset('assets/cms-v3/js/pages/calendar.init.js') }}"></script> -->
<script src="{{ asset('assets/cms-v3/js/app.js') }}"></script>
<script>
    function formatDateForMySQL(dateString) {
        var date = new Date(dateString);
        
        // Get components of the date
        var year = date.getFullYear();
        var month = ('0' + (date.getMonth() + 1)).slice(-2); // months are 0-based
        var day = ('0' + date.getDate()).slice(-2);
        var hours = ('0' + date.getHours()).slice(-2);
        var minutes = ('0' + date.getMinutes()).slice(-2);
        var seconds = ('0' + date.getSeconds()).slice(-2);
        
        // Return the formatted date
        return `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
    }

    var calendar = new tui.Calendar('#calendar', {
        defaultView: 'week', // or 'month'
        taskView: false,
        scheduleView: true,
        useCreationPopup: true,  // Enables the creation popup
        useDetailPopup: true,    // Enables the detail popup
        calendars: [
            {
                id: '1',
                name: 'My Calendar',
                color: '#ffffff',
                bgColor: '#9e5fff',
                dragBgColor: '#9e5fff',
                borderColor: '#9e5fff'
            }
        ]
    });
    // Event handler for when a new schedule is created through the popup
    calendar.on('beforeCreateSchedule', function(event) {
        console.log(event);
        // Convert to Date objects if not already
        var start = event.start instanceof Date ? event.start : event.start.toDate();
        var end = event.end instanceof Date ? event.end : event.end.toDate();

        var scheduleData = {
            id: String(Math.random()), // Unique ID for the schedule
            calendarId: event.calendarId || '1',
            title: event.title,
            category: event.isAllDay ? 'allday' : 'time',
            location: event.location,
            dueDateClass: '',
            start: start.toISOString(), // Convert to ISO string
            end: end.toISOString(),     // Convert to ISO string
            isReadOnly: false // Make it editable
        };
        
        // Use createSchedules method to add the schedule to the calendar
        calendar.createSchedules([scheduleData]);

        // Submit the schedule to the server
        var formData = new FormData();
        formData.append('title', scheduleData.title);
        formData.append('start', formatDateForMySQL(scheduleData.start));
        formData.append('end', formatDateForMySQL(scheduleData.end));
        formData.append('category', scheduleData.category);
        formData.append('location', scheduleData.location);
        
        // Assuming you have a form element and button in your HTML
        var button = document.querySelector('.tui-full-calendar-confirm'); // Replace with your button ID
        var originalText = button.innerHTML;

        fetch("{{ route('postAddSchedule') }}", {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector(
                    'meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Close modal if it exists
                const modal = bootstrap.Modal.getInstance(button.closest('.modal'));
                if (modal) {
                    modal.hide();
                }
                // Show success notification with dynamic message
                Swal.fire({
                    title: 'Success!',
                    text: data.success,
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    location.reload();
                });
            } else {
                // Show error notification with dynamic message
                Swal.fire({
                    title: 'Error!',
                    text: data.error,
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        })
        .catch(error => {
            // Show error notification for catch block
            Swal.fire({
                title: 'Error!',
                text: error,
                icon: 'error',
                confirmButtonText: 'OK'
            });
        })
        .finally(() => {
            // Enable button and reset its text
            button.disabled = false;
            button.innerHTML = originalText;
        });
    });
    // Event handler for when a schedule is clicked to show its details
    calendar.on('beforeUpdateSchedule', function(event) {
        console.log(event);
        var schedule = event.schedule;
        var changes = event.changes;

        calendar.updateSchedule(schedule.id, schedule.calendarId, changes);

        // Optionally, trigger an AJAX request to update the schedule on a backend server here
        // Submit the schedule to the server
        var formData = new FormData();
        formData.append('id', schedule.id);
        if ('title' in changes) {
            formData.append('title', changes.title);
        }
        if ('location' in changes) {
            formData.append('location', changes.location);
        }
        if ('start' in changes) {
            formData.append('start', formatDateForMySQL(changes.start));
        }
        if ('end' in changes) {
            formData.append('end', formatDateForMySQL(changes.end));
        }
        if ('category' in changes) {
            formData.append('category', changes.category);
        }
        
        // Assuming you have a form element and button in your HTML
        var button = document.querySelector('.tui-full-calendar-confirm'); // Replace with your button ID
        var originalText = button.innerHTML;

        fetch("{{ route('postEditSchedule') }}", {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector(
                    'meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Close modal if it exists
                const modal = bootstrap.Modal.getInstance(button.closest('.modal'));
                if (modal) {
                    modal.hide();
                }
                // Show success notification with dynamic message
                Swal.fire({
                    title: 'Success!',
                    text: data.success,
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    location.reload();
                });
            } else {
                // Show error notification with dynamic message
                Swal.fire({
                    title: 'Error!',
                    text: data.error,
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        })
        .catch(error => {
            // Show error notification for catch block
            Swal.fire({
                title: 'Error!',
                text: error,
                icon: 'error',
                confirmButtonText: 'OK'
            });
        })
        .finally(() => {
            // Enable button and reset its text
            button.disabled = false;
            button.innerHTML = originalText;
        });

    });
    calendar.on('beforeDeleteSchedule', function(event) {
        var schedule = event.schedule;
        
        calendar.deleteSchedule(schedule.id, schedule.calendarId);

        console.log(schedule.id);

        // Optionally, trigger an AJAX request to update the schedule on a backend server here
        // Submit the schedule to the server
        var formData = new FormData();
        formData.append('id', schedule.id);
        
        fetch("{{ route('postDeleteSchedule') }}", {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector(
                    'meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Show success notification with dynamic message
                Swal.fire({
                    title: 'Success!',
                    text: data.success,
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    location.reload();
                });
            } else {
                // Show error notification with dynamic message
                Swal.fire({
                    title: 'Error!',
                    text: data.error,
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        })
        .catch(error => {
            // Show error notification for catch block
            Swal.fire({
                title: 'Error!',
                text: error,
                icon: 'error',
                confirmButtonText: 'OK'
            });
        });
    });
    function triggerSchedulePopup() {
        var date = new Date(); // Use the current date as an example

        calendar.openCreationPopup({
            start: date,
            end: new Date(date.getTime() + 60 * 60 * 1000), // 1 hour later
            isAllDay: false
        });
    }
    @foreach ($schedules as $schedule)
        var schedule_date_start = new Date("{{ $schedule->date_start }}");
        var schedule_date_end = new Date("{{ $schedule->date_end }}");
        var scheduleData = {
            id: "{{ $schedule->id }}", // Unique ID for the schedule
            calendarId: '1',
            title: "{{ $schedule->CourseClass->slug }}",
            location: "{{ $schedule->location }}",
            category: "{{ $schedule->category }}",
            dueDateClass: '',
            start: schedule_date_start.toISOString(), // Convert to ISO string
            end: schedule_date_end.toISOString(),     // Convert to ISO string
            isReadOnly: false // Make it editable
        };
        
        // Use createSchedules method to add the schedule to the calendar
        calendar.createSchedules([scheduleData]);
    @endforeach

    function handleDisplayChange(entries) {
        entries.forEach(entry => {
            if (entry.target.style.display === 'block') {
                setTimeout(replaceInputWithSelect, 0);
            }
        });
    }

    // Create a MutationObserver to watch for changes
    const observer = new MutationObserver(handleDisplayChange);

    // Target element to observe
    const targetNode = document.querySelector('.tui-full-calendar-floating-layer');

    if (targetNode) {
        // Configure the observer to watch for attribute changes
        observer.observe(targetNode, { attributes: true, attributeFilter: ['style'] });
    }
    function replaceInputWithSelect() {
        const inputField = document.querySelector('#tui-full-calendar-schedule-title');
        if (inputField) {
            const select = document.createElement('select');
            select.id = 'tui-full-calendar-schedule-title';
            select.className = 'tui-full-calendar-content';

            // Example options; you might dynamically generate these based on your data
            select.innerHTML = ``;
            @foreach ($course_class as $class)
            select.innerHTML += `
                <option value='{{ $class->id }}'>{{ $class->slug }}</option>
            `;
            @endforeach

            inputField.parentNode.replaceChild(select, inputField);
        }
    }
</script>
@endsection
