@extends('layout.main-v3')

@section('content')
<div class="container mt-5">
    <h2>Create Course</h2>

    <!-- Display Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('courses.store', ['token' => $token]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Course Information Section -->
        <div class="mb-4">
            <h5>Course Information</h5>
            <p>This section is for detailing essential information about your course.</p>

            <div class="mb-3">
                <label for="course_code" class="form-label required">Course Code</label>
                <input type="text" class="form-control @error('course_code') is-invalid @enderror" id="course_code" name="course_code" placeholder="The course code is used to uniquely identify your course" required>
                @error('course_code')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="course_title" class="form-label required">Course Title</label>
                <input type="text" class="form-control @error('course_title') is-invalid @enderror" id="course_title" name="course_title" placeholder="The title of your course offering" required>
                @error('course_title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="course_url" class="form-label">Course URL</label>
                <input type="url" class="form-control @error('course_url') is-invalid @enderror" id="course_url" name="course_url" placeholder="Enter link to your course's page (if any)">
                @error('course_url')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="course_description" class="form-label required">Course Description</label>
                <textarea class="form-control @error('course_description') is-invalid @enderror" id="course_description" name="course_description" rows="4" placeholder="Enter any other information about your course here" maxlength="5000" required></textarea>
                <div class="character-count mt-1">Please do not exceed the 5000 character limit. Words: <span id="word_count">0</span>, Characters: <span id="char_count">0</span></div>
                @error('course_description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- OpenBadge Information Section -->
        <div class="mb-4">
            <h5>OpenBadge Information</h5>
            <p>In this section, you can customize the criteria narrative, upload an image for the OpenBadge, and add relevant tags for your course.</p>

            <div class="mb-3">
                <label class="form-label required">Badge Design *</label>
                <input type="file" class="form-control @error('badge_design') is-invalid @enderror" id="badge_design" name="badge_design" accept="image/*" required>
                @error('badge_design')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div style="max-width: 200px; margin-top: 10px;">
                    <img id="badge_preview" src="#" alt="Badge Preview" style="display:none; max-width:100%;"/>
                </div>
            </div>

            <div class="mb-3">
                <label for="tags" class="form-label">Tags</label>
                <input type="text" class="form-control" id="tags" name="tags" placeholder="Add tags separated by commas">
            </div>

            <div class="mb-3">
                <label for="criteria_narrative" class="form-label">Criteria Narrative</label>
                <textarea class="form-control" id="criteria_narrative" name="criteria_narrative" rows="4" placeholder="Describe the specific tasks, activities, or accomplishments the badge earner must achieve to earn this badge" maxlength="5000"></textarea>
                <div class="character-count mt-1">Please do not exceed the 5000 character limit. Words: <span id="word_count_narrative">0</span>, Characters: <span id="char_count_narrative">0</span></div>
            </div>
        </div>

        <!-- Sharing Information Section -->
        <div class="mb-4">
            <h5>Sharing Information</h5>
            <p>By enabling this option, you create unique shareable links for each document.</p>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="enable_sharing" name="enable_sharing">
                <label class="form-check-label" for="enable_sharing">Enable sharing of documents</label>
            </div>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

<!-- JavaScript for Character Count and Image Preview -->
<script>
    function updateCharacterCount(textarea, wordCountId, charCountId) {
        const text = textarea.value;
        const words = text.trim().split(/\s+/).filter(Boolean).length;
        const chars = text.length;
        document.getElementById(wordCountId).textContent = words;
        document.getElementById(charCountId).textContent = chars;
    }

    document.getElementById('course_description').addEventListener('input', function() {
        updateCharacterCount(this, 'word_count', 'char_count');
    });

    document.getElementById('criteria_narrative').addEventListener('input', function() {
        updateCharacterCount(this, 'word_count_narrative', 'char_count_narrative');
    });

    // Preview Badge Image
    document.getElementById('badge_design').addEventListener('change', function() {
        const file = this.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            const preview = document.getElementById('badge_preview');
            preview.src = e.target.result;
            preview.style.display = 'block';
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    });
</script>

<!-- Custom Styles for Character Count and Toggle Switch -->
<style>
    .required::after {
        content: '*';
        color: red;
    }
    .character-count {
        font-size: 0.9em;
        color: #6c757d;
    }
    .toggle-switch {
        cursor: pointer;
    }
</style>
@endsection
