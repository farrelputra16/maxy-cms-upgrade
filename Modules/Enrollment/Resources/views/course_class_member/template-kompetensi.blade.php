<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ "Sertifikat $user->name" }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 100%;
        }

        h1 {
            text-align: center;
            text-transform: capitalize;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            caption-side: bottom;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #bacbe6;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #cfe2ff;
        }

        tbody tr:nth-child(even) {
            background-color: #c5d7f2;
        }

        tbody tr:hover {
            background-color: #bfd1ec;
        }

        .align-middle {
            vertical-align: middle !important;
        }

        .table-total {
            text-align: left;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center mb-5 text-capitalize">Capaian Pembelajaran Program</h1>
        <table id="competencies">
            <thead>
                <tr>
                    <th style="width: 0%">No.</th>
                    <th style="width: 45%;">Kompetensi</th>
                    <th style="width: 40%;">Definisi Kompetensi</th>
                    <th style="width: 5%">Bobot</th>
                    <th style="width: 5%">Nilai Capaian</th>
                    {{-- <th style="width: 30%;">Deskripsi Nilai Capaian</th> --}}
                </tr>
            </thead>
            <tbody>
                @php
                    $index = 1;
                    $totalGradesSum = 0; // Total sum of all grades
                    $totalModulesCount = 0; // Total number of modules that have grades
                @endphp

                @foreach ($classModules as $item)
                    @if (!empty($item->course_module_name))
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->course_module_name }}</td>
                            <td>{!! $item->description !!}</td>
                            <td>{{ count($item->modulesChild) > 0 ? $item->modulesChild[0]->percentage . '%' : 'No score weight available' }}
                            </td>
                            <td>
                                @if (!empty($item->modulesChild))
                                    @php
                                        $totalGrades = 0;
                                        $numChildModules = 0;
                                        $numParentModules = [];
                                    @endphp

                                    @foreach ($item->modulesChild as $child)
                                        @if (isset($child->grade))
                                            {{-- Only count modules with a grade --}}
                                            @php
                                                $totalGrades += $child->grade ?? 0;
                                                $numChildModules++;
                                                if (!in_array($child->module_parent_id, $numParentModules)) {
                                                    $numParentModules[] = $child->module_parent_id;
                                                }
                                            @endphp
                                        @endif
                                    @endforeach

                                    @if ($numChildModules > 0)
                                        @php
                                            $averageGrade = $totalGrades / $numChildModules;
                                            $totalGradesSum += $averageGrade; // Add to global sum
                                            $totalModulesCount += count($numParentModules); // Add to global count
                                        @endphp
                                        {{ number_format($averageGrade, 2) }}
                                    @else
                                        No grades available
                                    @endif
                                @else
                                    No child modules
                                @endif
                            </td>
                        </tr>
                    @endif
                @endforeach

                <tr>
                    <td colspan="4" class="table-total">Nilai Total</td>
                    @if (env('APP_ENV') != 'local')
                        <td colspan="1">{{ $courseClassMember->final_score }}</td>
                    @else
                        <td colspan="1">
                            @if ($totalModulesCount > 0)
                                {{ number_format($totalGradesSum / $totalModulesCount, 2) }}
                            @else
                                0
                            @endif
                        </td>
                    @endif
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
