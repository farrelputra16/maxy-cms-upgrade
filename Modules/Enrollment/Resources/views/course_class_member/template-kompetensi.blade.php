<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 100%;
            margin: auto;
            padding: 20px;
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
    </style>
    {{-- <style>
        body {
                background-image: url('{{ asset('sertifikat/12.png') }}');
                /* Set the path to your image in the public directory */
            background-size: cover;
            /* Adjust the size as needed */
        }
    </style> --}}
</head>

<body>

    <div class="container">
        <h1 class="text-center mb-5 text-capitalize">capaian pembelajaran program</h1>
        <table id="example">
            <thead>
                <tr>
                    <th style="width: 0%">No.</th>
                    <th style="width: 15%;">Kompetensi</th>
                    <th style="width: 40%;">Definisi Kompetensi</th>
                    <th style="width: 5%">Jam</th>
                    <th style="width: 5%">Nilai Capaian</th>
                    <th style="width: 30%;">Deskripsi Nilai Capaian</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $index = 1;
                    $totalAverage = 0; // Inisialisasi nilai total rata-rata
                @endphp
                @foreach ($classModules as $item)
                    @if (!empty($item->course_module_name))
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->course_module_name }}</td>
                            <td>{!! $item->content !!}</td>
                            <td>{!! $item->duration !!}</td>
                            {{-- <td>
                                @if (!empty($item->modulesChild))
                                    @foreach ($item->modulesChild as $child)
                                       {{ $child->grade ?? 0 }}<br>
                                    @endforeach
                                @else
                                    No child modules
                                @endif
                            </td> --}}
                            <td>
                                @if (!empty($item->modulesChild))
                                    @php
                                        $totalGrades = 0;
                                        $numChildModules = count($item->modulesChild);
                                    @endphp

                                    @foreach ($item->modulesChild as $child)
                                        @php
                                            $totalGrades += $child->grade ?? 0;
                                        @endphp
                                        {{-- {{ $child->grade ?? 0 }}<br> --}}
                                    @endforeach

                                    @if ($numChildModules > 0)
                                        {{ number_format($totalGrades / $numChildModules, 2) }}
                                    @endif
                                @else
                                    No child modules
                                @endif
                            </td>
                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum, fugiat.</td>
                        </tr>
                    @endif
                @endforeach
                <tr>
                    <td colspan="4" class="table-total">Nilai Total</td>
                    <td colspan="2">{{ $totalAverage }}</td>
                </tr>
            </tbody>

        </table>
    </div>

</body>

</html>
