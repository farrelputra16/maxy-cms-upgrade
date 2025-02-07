<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="{{ public_path('css/bootstrap.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <title>CV {{ $user->name }}</title>
    <script>
        function countMonths(startDate, endDate) {
            const start = new Date(startDate);
            const end = new Date(endDate);
            const monthsApart = (end.getFullYear() - start.getFullYear()) * 12 + (end.getMonth() - start.getMonth());
            return monthsApart;
        }
    </script>
    <style>
        * {
            font-family: "Roboto", sans-serif;
        }

        table {
            border-collapse: separate;
            border-spacing: 0px 0px;
        }

        a {
            list-style: none;
            text-decoration: none;
        }

        th {
            border-bottom: 1px solid black;
        }

        .text-navy {
            color: navy;
        }

        .page-break {
            page-break-after: always;
        }

        .main-info {
            font-size: 14px;
        }

        section {
            margin-top: 67px;
        }

        tr {
            width: 100%;
            padding-top: 0px;
        }

        p {
            margin: 0rem;
            padding: 0rem;
        }

        .line {
            height: 5px;
            width: 100vh;
            background-color: black;
        }

        .fade-text {
            color: rgba(66, 66, 66, 0.785);
        }

        .dateLocation {
            font-size: 13px;
        }
    </style>
</head>

<body>
    <img src="{{ public_path('assets/cms-v3/images/logo-maxy-dark.png') }}" style="height: 40px;">

    <h1 class="fs-1 fw-bold text-navy text-center">{{ $user->name ?? '' }}</h1>
    <p class="text-center main-info">
        {{ $user->address ?? '' }}{{ $user->address ? ', ' : '' }}
        {{ $user->city ?? '' }} {{ $user->MProvince->name ?? '' }}&nbsp; | &nbsp;
        <a href="https://api.whatsapp.com/send?phone={{ $user->phone ?? '' }}">{{ $user->phone ?? '' }}</a>
        &nbsp; | &nbsp;<span class="text-primary">{{ $user->email }}</span>&nbsp;
        | &nbsp;<a href="/{{ $user->linked_in }}" target="_blank"
            rel="noopener noreferrer">{{ substr($user->linked_in, 12) }}
        </a>
    </p>
    <center>
        <p class="mb-0 text-center" style="text-align: center">
            {!! $user->personal_summary !!}
        </p>
    </center>
    <section>
        <table style="width: 100%">
            @if (isset($user->UserExperience) && $user->UserExperience->count() > 0)
                <tr class="mb-5 head">
                    <th class="text-navy pb-2" colspan="2">Experience</th>
                </tr>
            @endif
            <tr>
                <td style="height: 6px;"></td>
            </tr>
            @foreach ($user->UserExperience as $experience)
                <tr cellspacing='10'>
                    <td>
                        <h6 class="fw-bold mb-0">{{ $experience->name }}&nbsp; • &nbsp;<span
                                class="fade-text">{{ $experience->company }}</span></h6>
                    </td>
                    <td class="text-end">{{ $experience->job_type }} </td>
                </tr>
                <tr class="fade-text dateLocation">
                    <td class="">
                        <p>
                            {{ now()->parse($experience->start_date)->translatedFormat('F Y') }}
                            -
                            @if ($experience->end_date)
                                {{ now()->parse($experience->end_date)->translatedFormat('F Y') }}
                            @else
                                {{ __('lms_curriculum-vitae.now') }}
                            @endif
                            &nbsp;
                            @php
                                $dateDiff = now()
                                    ->parse($experience->start_date)
                                    ->diff(now()->parse($experience->end_date));
                                $years = $dateDiff->y;
                                $months = $dateDiff->m;
                            @endphp
                            @if ($years == 0)
                                ({{ $months }} months)
                            @elseif ($months % 12 == 0)
                                ({{ $years }} year)
                            @elseif ($dateDiff->days > 0 || ($years == 0 && $months == 0))
                                ({{ $dateDiff->format('%y year %m months') }})
                            @endif
                            &nbsp; | &nbsp;
                            {{ $experience->location }}
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        {!! $experience->description !!}
                    </td>
                </tr>
                <tr>
                    <td style="height: 10px;"></td>
                </tr>
            @endforeach
            <br>
            @if (isset($user->UserEducation) && $user->UserEducation->count() > 0)
                <tr class="mb-4">
                    <th class="text-navy pb-2" colspan="2">Education</th>
                </tr>
            @endif
            <tr>
                <td style="height: 6px;"></td>
            </tr>
            @foreach ($user->UserEducation as $education)
                <tr>
                    <td>
                        <h6 class="fw-bold mb-0">{{ $education->fields_of_study }}&nbsp; • &nbsp;<span
                                class="fade-text">{{ $education->name }}</span></h6>
                    </td>
                    <td class="text-end">{{ $education->job_type }} </td>
                </tr>
                <tr class="fade-text dateLocation">
                    <td class="">
                        <p class="">{{ now()->parse($education->start_date)->translatedFormat('F Y') }}
                            -
                            {{ $education->end_date? now()->parse($education->end_date)->translatedFormat('F Y'): __('lms_curriculum-vitae.now') }}
                            &nbsp;
                            @php
                                $dateDiff = now()
                                    ->parse($education->start_date)
                                    ->diff(now()->parse($education->end_date));
                                $years = $dateDiff->y;
                                $months = $dateDiff->m;
                            @endphp
                            @if ($years == 0)
                                ({{ $months }} months)
                            @elseif ($months % 12 == 0)
                                ({{ $years }} year)
                            @elseif ($dateDiff->days > 0 || ($years == 0 && $months == 0))
                                ({{ $dateDiff->format('%y year %m months') }})
                            @endif
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="height: 10px;"></td>
                </tr>
            @endforeach
            @if (isset($user->organizations) && $user->organizations->count() > 0)
                <tr class="mb-4">
                    <th class="text-navy border-bottom pb-2" colspan="2">
                        Experience</th>
                </tr>
            @endif
            @foreach ($user->organizations as $organization)
                <tr>
                    <td>
                        <h6 class="fw-bold mb-0">{{ $organization->name }}</h6>
                        {{ $organization->position }}
                    </td>
                    <td class="text-end">
                        <p class="fw-bold mb-4">{{ now()->parse($organization->start_date)->translatedFormat('F Y') }}
                            -
                            {{ $organization->end_date? now()->parse($organization->end_date)->translatedFormat('F Y'): __('lms_curriculum-vitae.now') }}
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        {!! $organization->description !!}
                    </td>
                </tr>
            @endforeach
            <br>
            @if (isset($user->skills) && $user->skills->count() > 0)
                <tr class="mb-4">
                    <th class="text-navy border-bottom pb-2" colspan="2">
                        Expertise
                    </th>
                </tr>
                <tr>
                    <td colspan="2" style="white-space: nowrap;">
                        @foreach ($user->skills()->pluck('name')->toArray() as $skill)
                            {{ $skill }}
                            @if (!$loop->last)
                                <span style="margin-right: 10px; margin-left: 10px;">•</span>
                            @endif
                        @endforeach
                    </td>
                </tr>
            @endif
            <br>
            @if (isset($user->UserLanguage) && $user->UserLanguage->count() > 0)
                <tr class="mb-4">
                    <th class="text-navy pb-2" colspan="2">Languages</th>
                </tr>
            @endif
            <tr>
                <td style="height: 6px;"></td>
            </tr>
            @if (isset($user->UserLanguage) && $user->UserLanguage->count() > 0)
                @foreach ($user->UserLanguage as $language)
                    <tr>
                        <td colspan="2">
                            <h6 class="fw-bold mb-0">{{ $language->MLanguage->name }}&nbsp; • &nbsp;<span
                                    class="fade-text">{{ \Str::title(\Str::replace('_', ' ', $language->proficiency)) }}</span>
                            </h6>
                        </td>
                    </tr>
                    <tr>
                        <td style="height: 20px;"></td>
                    </tr>
                @endforeach
            @endif
        </table>
    </section>
</body>

</html>
