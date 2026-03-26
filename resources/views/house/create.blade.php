<div class="container py-5">
    <div class="form-grid-card">
        <div class="card-header">
            Add New House for Rent
        </div>
        <div class="card-body">
            {{-- Validation Errors --}}
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('house.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-grid">

                    <div class="form-group">
                        <label for="title">House Title</label>
                        <input type="text" name="title" id="title" placeholder="Enter house title" value="{{ old('title') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="rent">Rent (৳)</label>
                        <input type="number" name="rent" id="rent" placeholder="Monthly rent" value="{{ old('rent') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="bedrooms">Bedrooms</label>
                        <input type="number" name="bedrooms" id="bedrooms" value="{{ old('bedrooms',1) }}" min="1" required>
                    </div>

                    <div class="form-group">
                        <label for="bathrooms">Bathrooms</label>
                        <input type="number" name="bathrooms" id="bathrooms" value="{{ old('bathrooms',1) }}" min="1" required>
                    </div>

                    <div class="form-group">
                        <label for="area">Area / Locality</label>
                        <input type="text" name="area" id="area" value="{{ old('area') }}">
                    </div>

                    <div class="form-group">
                        <label for="city">District</label>
                        <input type="text" name="city" id="city" value="{{ old('city') }}">
                    </div>

                    <div class="form-group">
                        <label for="mobile">Mobile</label>
                        <input type="tel" name="mobile" id="mobile" value="{{ old('mobile') }}">
                    </div>

                    <div class="form-group">
                        <label for="month">Month</label>
                        <input type="text" name="month" id="month" value="{{ old('month') }}">
                    </div>

                    <div class="form-group full-width">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" rows="4">{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="image_url">Featured Image</label>
                        <input type="file" name="image_url" id="image_url" multiple>
                    </div>

                    <div class="form-group">
                        <label>Furnished?</label>
                        <div class="radio-group">
                            <label><input type="radio" name="is_furnished" value="1" {{ old('is_furnished') == 1 ? 'checked' : '' }}> Yes</label>
                            <label><input type="radio" name="is_furnished" value="0" {{ old('is_furnished',0) == 0 ? 'checked' : '' }}> No</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Available?</label>
                        <div class="radio-group">
                            <label><input type="radio" name="is_available" value="1" {{ old('is_available',1) == 1 ? 'checked' : '' }}> Yes</label>
                            <label><input type="radio" name="is_available" value="0" {{ old('is_available') == 0 ? 'checked' : '' }}> No</label>
                        </div>
                    </div>

                    <div class="form-group full-width buttons">
                        <button type="submit" class="btn btn-primary">Add House</button>
                        <a href="{{ route('house.rent') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
<style>
  /* ====== Container & Card ====== */
.form-grid-card {
    max-width: 600px; /* smaller for mobile */
    margin: 2rem auto;
    background: #fff;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

.card-header {
    background: linear-gradient(90deg, #4facfe, #00f2fe);
    color: #fff;
    font-size: 1.5rem;
    font-weight: 600;
    text-align: center;
    padding: 1rem 0;
}

.card-body {
    padding: 2rem;
}

/* ====== Form Grid ====== */
.form-grid {
    display: grid;
    grid-template-columns: 1fr; /* Single column by default */
    gap: 1.2rem; /* Equal spacing between fields */
}

/* ====== Full width fields ====== */
.form-group {
    display: flex;
    flex-direction: column;
}

label {
    font-weight: 600;
    margin-bottom: 0.3rem;
}

input, textarea, select {
    border-radius: 10px;
    border: 1px solid #ccc;
    padding: 0.7rem 1rem;
    font-size: 1rem;
    width: 100%; /* Full width */
    box-sizing: border-box;
    transition: all 0.3s ease;
}

input:focus, textarea:focus, select:focus {
    outline: none;
    border-color: #4facfe;
    box-shadow: 0 0 8px rgba(79,172,254,0.3);
}

/* ====== Radio Buttons ====== */
.radio-group {
    display: flex;
    gap: 1rem;
    margin-top: 0.3rem;
}

.radio-group label {
    font-weight: 500;
    cursor: pointer;
}

.radio-group input {
    width: 1.2em;
    height: 1.2em;
}

/* ====== Buttons ====== */
.buttons {
    display: flex;
    flex-direction: column; /* Stack buttons */
    gap: 1rem;
}

.buttons .btn {
    width: 100%;
    border-radius: 10px;
    padding: 0.75rem 1rem;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-primary {
    background: linear-gradient(90deg, #4facfe, #00f2fe);
    color: #fff;
    border: none;
}

.btn-primary:hover {
    background: linear-gradient(90deg, #00f2fe, #4facfe);
    transform: translateY(-2px);
}

.btn-outline-secondary {
    border: 2px solid #4facfe;
    color: #4facfe;
    background: #fff;
}

.btn-outline-secondary:hover {
    background: #4facfe;
    color: #fff;
}

/* ====== Responsive for larger screens ====== */
@media (min-width: 769px) {
    .form-grid {
        grid-template-columns: repeat(2, 1fr); /* 2 columns on tablet/desktop */
    }
    .form-group.full-width {
        grid-column: 1 / -1; /* Fields like description span full width */
    }
    .buttons {
        flex-direction: row;
    }
}


</style>