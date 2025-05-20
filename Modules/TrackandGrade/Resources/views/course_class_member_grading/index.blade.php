@extends ('layout.main-v3')

@section('title', 'Penilaian Tugas')

@section('content')
    <!-- Mulai Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Penilaian Tugas</h4>

                <!-- Mulai Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Kelas</a></li>
                        <li class="breadcrumb-item active">Penilaian Tugas</li>
                    </ol>
                </div>
                <!-- Akhir Breadcrumb -->
            </div>
        </div>
    </div>
    <!-- Akhir Judul Halaman -->

    <div class="row">
        <div class="col-12">
            <!-- Class Selection Card -->
            {{-- <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Pilih Kelas</h4>
                    <form id="class-selection-form">
                        @csrf
                        <div class="row">
                            <div class="col-10">
                                <select id="classSelect" class="form-control select2 w-100" name="class_id" data-placeholder="Pilih Kelas ...">
                                    @foreach ($class_list as $item)
                                        <option value="{{ $item->class_id }}"
                                            @if (isset($class_id) && $class_id == $item->class_id) selected @endif>
                                            {{ $item->course_name }} - Batch {{ $item->batch }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-2 d-flex align-items-center justify-content-end">
                                <button type="button" id="show-grades" class="btn btn-primary">Tampilkan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> --}}

            <!-- DataTables Card -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Penilaian Tugas</h4>
                    <p class="card-title-desc">
                        Halaman ini menampilkan data penilaian tugas mahasiswa dalam kelas yang dipilih. Setiap baris pada
                        tabel
                        di bawah ini menyediakan informasi penting seperti nama mahasiswa, status pengumpulan, nilai, dan
                        komentar. Anda dapat menggunakan fitur <b>pengaturan kolom, pengurutan, dan pencarian</b> untuk
                        menyesuaikan tampilan sesuai kebutuhan. Klik pada judul kolom untuk mengurutkan data, atau arahkan
                        kursor pada teks yang terpotong untuk melihat deskripsi lengkap.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li><strong>Pilih Kelas:</strong> Gunakan dropdown untuk memilih kelas yang ingin dilihat
                            penilaiannya, lalu tekan tombol <em>Tampilkan</em>.</li>
                        <li><strong>Pengaturan Kolom:</strong> Klik header kolom untuk mengurutkan data atau pilih kolom
                            tertentu untuk disembunyikan.</li>
                        <li><strong>Nilai Tugas:</strong> Klik tombol <em>Nilai Tugas</em> pada kolom Aksi untuk menilai
                            tugas mahasiswa yang sudah dikumpulkan.</li>
                    </ul>
                    </p>

                    <table 
                        id="datatable" 
                        class="table table-bordered dt-responsive nowrap w-100" 
                        data-server-processing="true"
                        data-url="{{ route('getGradeData') }}"
                        data-no-status="true"
                        data-colvis="[-6, -5, -4, -3, 1]"
                    >
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Class</th>
                                <th>Module</th>
                                <th>Day</th>
                                <th>Student Name</th>
                                <th>Assignment File</th>
                                <th>Due Date</th>
                                <th>Score</th>
                                <th>Updated At</th>
                                <th>Komentar Mahasiswa</th>
                                <th>Komentar Dosen</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Class</th>
                                <th>Module</th>
                                <th>Day</th>
                                <th>Student Name</th>
                                <th>Assignment File</th>
                                <th>Due Date</th>
                                <th>Score</th>
                                <th>Updated At</th>
                                <th>Komentar Mahasiswa</th>
                                <th>Komentar Dosen</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
// Define columns array to match the DataTables initialization
var columns = [
    { 
        data: 'no',
        searchable: true
    },
    { 
        data: 'id',
        searchable: true
    },
    {
        data: 'class',
        searchable: true
    },
    { 
        data: 'module',
        searchable: true,
        render: function(data, type, row) {
            return type === 'display' 
                ? `<span title="${row.module_full}">${data}</span>` 
                : data;
        }
    },
    { 
        data: 'day',
        searchable: true
    },
    { 
        data: 'student_name',
        searchable: true
    },
    { 
        data: 'file',
        searchable: true
    },
    { 
        data: 'submission_time',
        searchable: true
    },
    { 
        data: 'grade',
        searchable: true
    },
    { 
        data: 'updated_at',
        searchable: true
    },
    { 
        data: 'student_comment',
        searchable: true,
        render: function(data, type, row) {
            return type === 'display' 
                ? `<span title="${row.student_comment_full}">${data}</span>` 
                : data;
        }
    },
    { 
        data: 'tutor_comment',
        searchable: true,
        render: function(data, type, row) {
            return type === 'display' 
                ? `<span title="${row.tutor_comment_full}">${data}</span>` 
                : data;
        }
    },
    { 
        data: 'status',
        searchable: true,
        render: function(data, type, row) {
            if (type === 'display' && data) {
                return `<div class="badge ${data.class}">${data.text}</div>`;
            }
            return data ? data.text : '';
        }
    },
    { 
        data: 'action',
        searchable: false,
        orderable: false,
        render: function(data, type, row) {
            return data;
        }
    }
];
</script>
@endsection