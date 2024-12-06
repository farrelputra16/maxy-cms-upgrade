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
                    $totalResultSum = 0; // Untuk menyimpan total nilai result
                    $totalModules = 0;
                @endphp

                @foreach ($classModules as $classModule)
                    @foreach ($classModule->modulesChild as $item)
                        @if (!empty($item->cm_name))
                            @php
                                // Hitung nilai result (percentage * grade), pastikan nilai null di-handle
                                $percentage = $item->percentage ?? 0;
                                $grade = $item->grade ?? 0;
                                $result = $percentage * $grade / 100;

                                // Tambahkan nilai result ke total
                                $totalResultSum += $result;
                                $totalModules++;
                            @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->cm_name }}</td>
                                <td>{!! $item->description !!}</td>
                                <td>{{ $percentage > 0 ? $percentage . '%' : 'Tidak ada bobot nilai' }}</td>
                                <td>{{ $grade > 0 ? $grade : 'Tidak ada nilai' }}</td>
                            </tr>
                        @endif
                    @endforeach
                @endforeach

                <tr>
                    <td colspan="4" class="table-total">Nilai Total</td>
                    @if (env('APP_ENV') != 'local')
                        <td colspan="1">{{ $courseClassMember->final_score }}</td>
                    @else
                        <td colspan="1">
                            @if($totalModules > 0)
                                {{ $totalResultSum }}
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
