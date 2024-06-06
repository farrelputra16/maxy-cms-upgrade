@extends('layout.master')

@section('title', 'Dashboard')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Include FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/common/main.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.min.css" rel="stylesheet" />

    <!-- Include Google Fonts for Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/charts/chart-4/assets/css/chart-4.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/billboard.js/dist/billboard.min.css" />
    <link rel="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" type="text/css" />

    <style>
        .conTitle {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 2rem;
        }

        .h2 {
            font-weight: bold;
            color: #232E66;
            padding-left: .1rem;
            font-size: 22px;
            margin-bottom: -0.5rem;
            margin-left: 1rem;
        }

        .logout {
            margin-right: 2rem;
            margin-bottom: .5rem;
            background-color: #FBB041;
            color: #FFF;
            width: 80px;
            height: 35px;
            border-radius: 10px;
            border: none;
            box-shadow: none;
            font-weight: bold;
        }

        .breadcrumb {
            border-top: 2px solid black;
            display: inline-block;
            width: 1010px;
            margin-left: 1rem;
            margin-bottom: 1rem;
        }

        .breadcrumb .sectionDashboard,
        .breadcrumb .divider,
        .breadcrumb .sectionMaster,
        .breadcrumb .sectionCourse {
            /* padding-top: 1rem; */
            /* margin-top: 1rem; */
            display: inline;
            font-size: 11px;
            font-weight: bold;
        }

        .breadcrumb .divider {
            margin: 0 5px;
        }

        .h3 {
            margin-left: 1rem;
            margin-top: -1.5rem;
            font-size: 20px;
            color: #4056A1;
            font-weight: bolder;
        }

        .container {
            display: flex;
            justify-content: space-between;
        }

        .box {
            width: 200px;
            height: 160px;
            padding: 20px;
            border: 3px solid #CCD2E3;
            border-radius: 10px;
            text-align: center;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            /* align-items: center; */
        }

        .box h3 {
            padding-top: 5rem;
            font-size: 14px;
            text-align: left;
            font-weight: 900;
        }

        .box p {
            font-size: 10px;
            text-align: left;
        }

        .box img {
            max-width: 50%;
            width: 30%;
            height: auto;
            margin-top: -2rem;
            margin-left: -3rem;
            position: absolute;
            transform: translate(-50%, -50%);
            left: 50%;
            top: 50%;
        }

        .box a {
            display: block;
            color: #B0B0B0;
            text-decoration: none;
            border-radius: 5px;
            text-align: right;
            font-size: 12px;
            margin-top: -.5rem;
            margin-right: -.5rem;
        }

        body {
            margin: 0;
            padding: 0;
            font-size: 14px;
        }

        /* Calendar Styles */
        .wrapper {
            width: 280px;
            height: 300px;
            border-radius: 20px;
            border: 3px solid #CCD2E3;
            margin-right: 1rem;
        }

        .wrapper header {
            display: flex;
            align-items: center;
            padding: 15px 0px 0px 23px;
            justify-content: space-between;
        }

        header .icons {
            display: flex;
        }

        header .icons span {
            height: 30px;
            width: 30px;
            margin-top: -1.5rem;
            padding-right: 1rem;
            cursor: pointer;
            color: #232E66;
            text-align: center;
            line-height: 38px;
            font-size: 1.9rem;
            font-weight: bold;
            user-select: none;
            border-radius: 50%;
        }

        header .current-date {
            font-size: 1.45rem;
            font-weight: 500;
            color: #1533B5;
            font-weight: 700;
        }

        .calendar {
            padding-top: 1rem;
            padding-left: -5rem;
        }

        .calendar ul {
            display: flex;
            flex-wrap: wrap;
            list-style: none;
            text-align: center;
        }

        .calendar li {
            color: #333;
            width: calc(100% / 7);
            font-size: 1.07rem;
            padding-left: -2rem;
        }

        .calendar .weeks {
            display: flex;
            flex-wrap: wrap;
            list-style: none;
            text-align: center;
            margin-left: -1rem;
            margin-right: 1rem;
            overflow: visible;
        }

        .calendar .weeks li {
            font-size: 12px;
            font-weight: 400;
            cursor: default;
            color: #1533B5;
            margin-top: -.8rem;
            padding-left: -2rem;
        }

        .calendar .days {
            margin-bottom: 20px;
            margin-left: -1rem;
            margin-right: 1rem;
            padding-top: -10rem;
        }

        .calendar .days li {
            z-index: 1;
            cursor: pointer;
            position: relative;
            margin-top: .8rem;
            padding-left: -2rem;
            font-size: 14px;
            font-weight: 600;
            color: #000000;
        }

        .days li.inactive {
            color: #aaa;
        }

        .days li.active {
            color: #fff;
        }

        .days li::before {
            position: absolute;
            content: "";
            left: 50%;
            top: 50%;
            height: 40px;
            width: 40px;
            z-index: -1;
            border-radius: 50%;
            transform: translate(-50%, -50%);
            color: #000000;
        }

        .days li.active::before {
            background: #FBB041;
            color: #000000;
        }

        .days li:not(.active):hover::before {
            background: #FBB041;
        }

        /* Active Class */
        .boxActive {
            width: 320px;
            height: 300px;
            padding: 20px;
            border: 3px solid #CCD2E3;
            border-radius: 10px;
            text-align: center;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .btnDetail {
            display: inline-block;
            background-color: #FBB041;
            width: 4rem;
            height: 1.5rem;
            color: #FFF !important;
            font-size: 12px;
            font-weight: bold;
            padding-top: 2px;
            padding-bottom: 2px;
            border-radius: 12px;
            text-decoration: none;
            margin-top: 1rem;
        }

        .tableActive {
            width: 100%;
            border-collapse: collapse;
        }

        .tableActive th,
        .tableActive td {
            padding: 5px;
            border-bottom: 1px solid #ddd;
        }

        .tableActive th {
            font-weight: bold;
            color: #232E66;
        }

        .ticlass .tibatch .tiaction {
            margin-top: -2rem;
            position: absolute;
        }

        /* Student */
        .stu {
            margin-top: -2.25rem;
            margin-left: 30.5rem;
        }

        .boxStu {
            width: 315px;
            height: 290px;
            padding: 20px;
            border: 3px solid #CCD2E3;
            border-radius: 10px;
            text-align: center;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            margin: 0 auto;
        }

        #donut-chart {
            width: 250px;
            height: 250px;
            text-align: center;
            margin: -1.25rem auto;
            /* margin-top: -3rem; */
            /* margin-left: 0;
                        margin-right: auto; */
        }

        .bb-legend-item text {
            font-size: 12px;
        }

        #chart {
            width: 250px;
            height: 250px;
        }

        .chart-container {
            /* display: flex;
                        flex-direction: column;
                        align-items: center; */
            position: relative;
        }

        .chart-container canvas {
            width: 30rem;
            height: 30rem;
            margin-top: -.1px;
        }

        .chart-labels {
            /* display: flex;
                        justify-content: space-around;
                        width: 100%; */
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .chart-labels span {
            display: inline-block;
            font-weight: bold;
            font-size: 10px;
            text-align: center;
            /* width: 50px; */
            padding: 4px 8px;
            border-radius: 15px;
            color: #FFF;
            background-color: #232E66;
        }

        #myDoughnutChart {
            width: 400px;
            height: 400px;
        }

        /* Schedule Today */
        .boxSch {
            width: 280px;
            height: auto;
            margin-right: .05rem;
            padding: 20px;
            border-radius: 20px;
            border: 3px solid #CCD2E3;
            text-align: left;
            position: relative;
        }

        .boxSch h3 {
            font-size: 18px;
            font-weight: 900;
            margin-top: -1px;
            padding-bottom: 10px;
        }

        .boxSch h5 {
            font-size: 17px;
            font-weight: 700;
            margin-left: 1rem;
            padding-left: 1rem;
            margin-top: .5rem;
        }

        .boxSch p {
            font-size: 12px;
            margin-left: 1rem;
            padding-left: 1rem;
            margin-bottom: -7px;
        }

        .boxSch .line {
            border-top: 2px solid #CCD2E3;
            display: inline-block;
            width: 275px;
            margin-left: -20px;
        }

        .strip {
            border-bottom: 2px solid #CCD2E3;
            display: inline-block;
            align-items: center;
            width: 250px;
            margin-left: 12px;
            margin-top: -10px;
        }
    </style>
</head>

<body>
    <div class="container conTitle">
        <h2 class="h2">Dashboard</h2>
        <button class="logout">Logout</button>
    </div>

    <div class="breadcrumb pt-2 pb-4"></div>

    <div class="row">
        <h3 class="h3">Leads</h3>
        <div class="container">
            <div class="box">
                <img src="{{ asset('uploads/Student.png') }}" alt="">
                <a href="">View All</a>
                <h3>Student</h3>
                <p>there are 3 new leads</p>
            </div>
            <div class="box">
                <img src="{{ asset('uploads/Company.png') }}" alt="">
                <a href="">View All</a>
                <h3>Company</h3>
                <p>no new lead</p>
            </div>
            <div class="box">
                <img src="{{ asset('uploads/University.png') }}" alt="">
                <a href="">View All</a>
                <h3>University</h3>
                <p>there are 7 new leads</p>
            </div>

            <!-- Calendar Wrapper -->
            <div class="wrapper">
                <header>
                    <p class="current-date">May 2024</p>
                    <div class="icons">
                        <span id="prev" class="btnPrev material-symbols-rounded">chevron_left</span>
                        <span id="next" class="btnNext material-symbols-rounded">chevron_right</span>
                    </div>
                </header>
                <div class="calendar">
                    <ul class="weeks">
                        <li>Sun</li>
                        <li>Mon</li>
                        <li>Tue</li>
                        <li>Wed</li>
                        <li>Thu</li>
                        <li>Fri</li>
                        <li>Sat</li>
                    </ul>
                    <ul class="days">
                        <li class="inactive">28</li>
                        <li class="inactive">29</li>
                        <li class="inactive">30</li>
                        <li class="inactive">31</li>
                        <li>1</li>
                        <li>2</li>
                        <li>3</li>
                        <li>4</li>
                        <li>5</li>
                        <li>6</li>
                        <li>7</li>
                        <li>8</li>
                        <li>9</li>
                        <li>10</li>
                        <li>11</li>
                        <li>12</li>
                        <li>13</li>
                        <li>14</li>
                        <li>15</li>
                        <li>16</li>
                        <li>17</li>
                        <li>18</li>
                        <li>19</li>
                        <li>20</li>
                        <li>21</li>
                        <li class="active">22</li>
                        <li>23</li>
                        <li>24</li>
                        <li>25</li>
                        <li>26</li>
                        <li>27</li>
                        <li>28</li>
                        <li>29</li>
                        <li>30</li>
                        <li class="inactive">1</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <!-- Active Class -->
    <h3 class="h3 act">Active Class</h3>
    <h3 class="h3 stu">Student</h3>
    <div class="container">
        <div class="boxActive box">
            <table id="table" class="tableActive table-striped" style="width: 100%;">
                <thead>
                    <tr>
                        <th class="ticlass" style="width: 50%; text-align: left;">Class</th>
                        <th class="tibatch" style="width: 20%;">Batch</th>
                        <th class="tiaction" style="width: 30%; text-align: right;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($active_class_list as $class)
                    <tr>
                        <td style="text-align: left; margin-bottom: 10px;">
                            {{ $class->course_name }}
                        </td>
                        <td style="text-align: center;">
                            {{ $class->batch }}
                        </td>
                        <td>
                            <a href="" class="btnDetail" style="position: relative; text-align: center; width: 4.2rem;
                            border-radius: 12px; padding-right: -1rem; padding-bottom: .5rem;
                            margin-left: 3rem; margin-top: .25rem;">Detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="boxStu box">
            <div class="chart-container">
                <div id="chartjs-doughnut"></div>
                <div id="donut-chart"></div>
                <canvas id="chart"></canvas>
            </div>
        </div>

        <!-- Schedule -->
        <div class="boxSch">
            <h3 class="h3">Schedule Today</h3>
            <div class="line pt-2 pb-4">
                <h5>Morning Huddle</h5>
                <p>08.30 AM</p>
                <div class="strip"></div>
                <h5>Schedule Today</h5>
                <p>01.00 PM</p>
                <div class="strip"></div>
                <h5>Schedule Today</h5>
                <p>01.00 PM</p>
                <div class="strip"></div>
                <h5>Schedule Today</h5>
                <p>01.00 PM</p>
            </div>
        </div>
        <!-- <div class="px-3 pb-3" x-data="dashboard">
                <div class="ui message">
                    <div class="header">
                        Selamat Datang, {{ Auth::user()->name }}
                    </div>
                    <p>Aplikasi ini sedang tahap pengembangan, beberapa kesalahan mungkin terjadi. Silakan hubungi <a href="https://wa.me/+6281281910513/?text=Banh webnya error banh">backend team development</a>.</p>
                </div>
                <div class="ui three stackable cards">
                    <div class="ui card" style="width: 10%;">
                        <div class="content">
                            <div class="center aligned header">{{ $accessMaster }}</div>
                        </div>
                        <div class="extra content">
                            <div class="center aligned">
                                Access Master
                            </div>
                        </div>
                    </div>
                    <div class="ui card" style="width: 10%;">
                        <div class="content">
                            <div class="center aligned header">{{ $user }}</div>
                        </div>
                        <div class="extra content">
                            <div class="center aligned">
                                User Active
                            </div>
                        </div>
                    </div>
                </div>

                @if (Auth::check() && Auth::user()->access_group_id == 1)
    <button :class="isLoading ? 'ui labeled icon negative button mt-3' : 'ui positive button mt-3'" @click="toggle">
                    <template x-if="isLoading">
                        <i class="loading spinner icon"></i>
                    </template>
                    <span x-text="isLoading ?
        'Hentikan' : 'Sinkronisasi Data GoKampus'"></span>
                </button>
    @endif
            </div> -->

        <script src="https://unpkg.com/@adminkit/core@latest/dist/js/app.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> <!-- Include Axios for making HTTP requests -->
        <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script src="https://unpkg.com/bs-brain@2.0.4/components/charts/chart-4/assets/controller/chart-4.js"></script>
        <script src="https://d3js.org/d3.v4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/billboard.js/dist/billboard.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.1/Chart.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            const dashboard = () => {
                return {
                    isLoading: false,
                    toggle() {
                        this.isLoading = !this.isLoading;

                        if (this.isLoading) {
                            this.syncData();
                        }
                    },
                    syncData() {
                        this.isLoading = true;
                        axios.get("{{ route('synchronizeData') }}")
                            .then((response) => {
                                this.isLoading = false
                                alert('Sinkronisasi data berhasil!')
                            })
                            .catch(() => {
                                this.isLoading = false
                                alert('Sinkronisasi data gagal!')
                            })
                    }
                }
            }

            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');

                var calendar = new FullCalendar.Calendar(calendarEl, {
                    timeZone: 'UTC',
                    themeSystem: 'standard', // atau tema lain yang Anda inginkan
                    initialView: 'dayGridMonth', // tampilan awal kalender
                    events: 'https://fullcalendar.io/api/v1/events' // sumber event
                });

                calendar.render();
            });
        </script>

        <script>
            const daysTag = document.querySelector(".days"),
                currentDate = document.querySelector(".current-date"),
                prevNextIcon = document.querySelectorAll(".icons span");

            // getting new date, current year and month
            let date = new Date(),
                currYear = date.getFullYear(),
                currMonth = date.getMonth();

            // storing full name of all months in array
            const months = ["January", "February", "March", "April", "May", "June", "July",
                "August", "September", "October", "November", "December"
            ];

            const renderCalendar = () => {
                let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(), // getting first day of month
                    lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(), // getting last date of month
                    lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(), // getting last day of month
                    lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate(); // getting last date of previous month
                let liTag = "";

                for (let i = firstDayofMonth; i > 0; i--) { // creating li of previous month last days
                    liTag += `<li class="inactive">${lastDateofLastMonth - i + 1}</li>`;
                }

                for (let i = 1; i <= lastDateofMonth; i++) { // creating li of all days of current month
                    // adding active class to li if the current day, month, and year matched
                    let isToday = i === date.getDate() && currMonth === new Date().getMonth() &&
                        currYear === new Date().getFullYear() ? "active" : "";
                    liTag += `<li class="${isToday}">${i}</li>`;
                }

                for (let i = lastDayofMonth; i < 6; i++) { // creating li of next month first days
                    liTag += `<li class="inactive">${i - lastDayofMonth + 1}</li>`
                }
                currentDate.innerText =
                    `${months[currMonth]} ${currYear}`; // passing current mon and yr as currentDate text
                daysTag.innerHTML = liTag;
            }
            renderCalendar();

            prevNextIcon.forEach(icon => { // getting prev and next icons
                icon.addEventListener("click", () => { // adding click event on both icons
                    // if clicked icon is previous icon then decrement current month by 1 else increment it by 1
                    currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;

                    if (currMonth < 0 || currMonth > 11) { // if current month is less than 0 or greater than 11
                        // creating a new date of current year & month and pass it as date value
                        date = new Date(currYear, currMonth, new Date().getDate());
                        currYear = date.getFullYear(); // updating current year with new date year
                        currMonth = date.getMonth(); // updating current month with new date month
                    } else {
                        date = new Date(); // pass the current date as date value
                    }
                    renderCalendar(); // calling renderCalendar function
                });
            });
        </script>

        <script>
            let totalStu = <?php echo $totalStu; ?>;
            let stuActive = <?php echo $stuActive; ?>;

            let chart = bb.generate({
                data: {
                    columns: [
                        ["Inactive Students (" + (totalStu - stuActive) + ")", totalStu - stuActive],
                        ["Student Active (" + stuActive + ")", stuActive],
                    ],
                    type: "donut",
                    onclick: function(d, i) {
                        console.log("onclick", d, i);
                    },
                    onover: function(d, i) {
                        console.log("onover", d, i);
                    },
                    onout: function(d, i) {
                        console.log("onout", d, i);
                    },
                },
                color: {
                    pattern: ["#232E66", "#1533B5"],
                },
                bindto: "#donut-chart",
                donut: {
                    label: {
                        show: true
                    }
                },
                legend: {
                    show: true,
                    position: 'bottom'
                }
            });
        </script>

</body>

</html>
@endsection