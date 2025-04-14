@extends('layout.main-v3')

@section('title', 'Blog')

@section('content')
    <!-- begin page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Ringkasan Data</h4>

                <!-- begin breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Konten</a></li>
                        <li class="breadcrumb-item active">Blog</li>
                    </ol>
                </div>
                <!-- end breadcrumb -->
            </div>
        </div>
    </div>
    <!-- end page title -->

    <!-- begin content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Data Blog</h4>
                    <p class="card-title-desc">
                        Halaman ini memuat tabel berisi data blog yang dipublikasikan. Setiap baris menampilkan informasi
                        penting seperti judul, slug, konten, tag, highlight, catatan admin, dan status artikel. Data ini
                        diatur
                        dalam format interaktif sehingga Anda dapat dengan mudah mengakses dan mengelola artikel.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li>Gunakan kolom <b>Judul</b> dan <b>Slug</b> untuk melihat judul artikel serta tautan permanen
                            (slug) yang mengarah langsung ke blog tersebut. Arahkan kursor pada teks untuk melihat detail
                            lebih lanjut melalui tooltip.</li>
                        <li>Kolom <b>Konten</b> menampilkan cuplikan singkat dari isi artikel untuk membantu Anda
                            mengidentifikasi topik yang dibahas.</li>
                        <li>Kolom <b>Tags</b> menampilkan label yang terkait dengan artikel untuk memudahkan pencarian
                            berdasarkan kategori atau tema tertentu.</li>
                        <li>Kolom <b>Highlight</b> menunjukkan apakah artikel tersebut ditandai sebagai "highlight" (artikel
                            unggulan), yang ditandai dengan ikon cek hijau atau silang merah.</li>
                        <li>Kolom <b>Status</b> memperlihatkan apakah artikel sedang <i>Aktif</i> (diterbitkan) atau <i>Non
                                Aktif</i> (tidak diterbitkan).</li>
                        <li>Gunakan tombol <b>Ubah</b> pada kolom <b>Aksi</b> untuk mengubah konten atau detail artikel yang
                            diinginkan.</li>
                        <li>Untuk menambah artikel blog baru, klik tombol tambah di sudut kanan bawah halaman.</li>
                        <li>Manfaatkan fitur <b>Visibilitas Kolom</b>, <b>Pengurutan</b>, dan <b>Pencarian</b> pada tabel
                            untuk memfilter dan menemukan artikel tertentu dengan cepat.</li>
                    </ul>
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100"
                        data-server-processing="true" data-url="{{ route('getBlogData') }}" data-colvis="[-3, -4, -11]">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Judul</th>
                                <th>Slug</th>
                                <th>Konten</th>
                                <th>Tags</th>
                                <th>Highlight</th>
                                <th>Catatan Admin</th>
                                <th>Dibuat Pada</th>
                                <th>Diperbarui Pada</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($data as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                        title="{{ $item->title }}">
                                        {!! \Str::limit($item->title, 30) !!}
                                    </td>
                                    <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                        title="{{ $item->slug }}">
                                        <a href="{{ env('APP_URL_FRONTEND') }}/blog/{{ $item->slug }}"
                                           >{!! \Str::limit($item->slug, 30) !!}</a>
                                    </td>
                                    <td class="data-long" data-toggle="tooltip" data-placement="top"
                                        title="{!! strip_tags($item->content) !!}">
                                        {!! \Str::limit(strip_tags($item->content), 30) !!}
                                    </td>
                                    <td>
                                        @foreach ($item->tags as $tag)
                                            <div class="badge bg-secondary px-2">
                                                {{ $tag->name }}
                                            </div>
                                        @endforeach
                                    </td>
                                    <td value="{{ $item->status_highlight }}">
                                        @if ($item->status_highlight == 1)
                                            <a class="btn btn-success"><i class="fas fa-check"></i> &nbsp; Ya</a>
                                        @else
                                            <a class="btn btn-danger"><i class="fas fa-times"></i> &nbsp; Tidak</a>
                                        @endif
                                    </td>
                                    <td class="data-long" data-toggle="tooltip" data-placement="top"
                                        title="{!! strip_tags($item->description) !!}">
                                        {!! !empty($item->description) ? \Str::limit($item->description, 30) : '-' !!}
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>
                                        <button
                                            class="btn btn-status {{ $item->status == 1 ? 'btn-success' : 'btn-danger' }}"
                                            data-id="{{ $item->id }}" data-status="{{ $item->status }}"
                                            data-model="MBlog">
                                            {{ $item->status == 1 ? 'Aktif' : 'Nonaktif' }}
                                        </button>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('getEditBlog', ['id' => $item->id]) }}"
                                                class="btn btn-primary">Ubah</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach --}}
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Judul</th>
                                <th>Slug</th>
                                <th class="data-long">Konten</th>
                                <th>Tags</th>
                                <th>Highlight</th>
                                <th class="data-long">Catatan Admin</th>
                                <th>Dibuat Pada</th>
                                <th>Diperbarui Pada</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end content -->

    <!-- FAB add starts -->
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddBlog') }}">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- FAB add ends -->
@endsection

@section('script')
    <script>
        const columns = [{
                data: "DT_RowIndex",
                name: "DT_RowIndex",
                orderable: false,
                searchable: false
            },
            {
                data: "id",
                name: "id"
            },
            {
                data: "title",
                name: "title",
                orderable: true,
                searchable: true
            },
            {
                data: "slug",
                name: "slug",
                orderable: true,
                searchable: true
            },
            {
                data: "content",
                name: "content",
                orderable: true,
                searchable: true
            },
            {
                data: "tags",
                name: "tags",
                orderable: false,
                searchable: false
            },
            {
                data: "highlight_status",
                name: "highlight_status",
                orderable: true,
                searchable: true
            },
            {
                data: "description",
                name: "description",
                orderable: true,
                searchable: true
            },
            {
                data: "created_at",
                name: "created_at",
                orderable: true,
                searchable: false
            },
            {
                data: "updated_at",
                name: "updated_at",
                orderable: true,
                searchable: false
            },
            {
                data: "status",
                name: "status",
                orderable: true,
                searchable: true
            },
            {
                data: "action",
                name: "action",
                orderable: false,
                searchable: false
            }
        ];
    </script>
@endsection
