@extends('layout.main-v3')

@section('title', 'Course Details')

@section('content')
    <!-- Bagian judul halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-0">Course Details</h4>
            </div>
        </div>
    </div>

    <!-- Bagian konten detail mata kuliah -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title" id="course_name">{{ $course['course_title'] ?? 'Loading...' }}</h5>
                    <p class="card-text">Here are the details of the selected course:</p>

                    <!-- List group untuk menampilkan informasi mata kuliah -->
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Course Code:</strong> <span id="course_code">{{ $course['course_code'] ?? 'Loading...' }}</span></li>
                        <li class="list-group-item"><strong>Issuance Type:</strong> <span id="issuance_type">{{ $course['issuance_type'] ?? 'Loading...' }}</span></li>
                        <li class="list-group-item"><strong>Pending Actions:</strong> <span id="pending_actions">{{ $course['pending_actions'] ?? 0 }}</span></li>
                        <li class="list-group-item"><strong>Total Issued:</strong> <span id="total_issued">{{ $course['total_issued'] ?? 0 }}</span></li>
                        <li class="list-group-item"><strong>Last Updated:</strong> <span id="last_updated">{{ isset($course['last_updated']) ? \Carbon\Carbon::parse($course['last_updated'])->format('j M Y, h:i:s A') : 'Loading...' }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const courseId = '{{ $course['id'] ?? '' }}'; // Ambil ID dari Laravel
            const token = '{{ $token }}'; // Ambil token dari Laravel

            // URL endpoint dengan token
            const url = `/api/courses/${courseId}?token=${token}`; // Sertakan token di URL

            // Fetch detail mata kuliah dari API dengan Authorization header
            fetch(url, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${token}` // Sertakan token di header Authorization
                }
            })
            .then(response => response.json())
            .then(course => {
                console.log('Course Details:', course); // Log respons untuk debugging

                // Memperbarui tampilan dengan data yang di-fetch
                document.getElementById('course_name').innerText = course.course_title || 'N/A';
                document.getElementById('course_code').innerText = course.course_code || 'N/A';
                document.getElementById('issuance_type').innerText = course.issuance_type || 'N/A';
                document.getElementById('pending_actions').innerText = course.pending_actions || 0;
                document.getElementById('total_issued').innerText = course.total_issued || 0;
                document.getElementById('last_updated').innerText = new Date(course.last_updated).toLocaleString();
            })
            .catch(error => {
                console.error('Error fetching course details:', error);
                document.getElementById('course_name').innerText = 'Failed to load course details';
            });
        });
    </script>
@endsection

