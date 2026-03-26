<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $house->title }} - HomeFinder</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('main.css') }}">
  <style>
      body { background: #f8f9fa; }
      .house-image { width: 100%;  max-width: 400px; height: 420px; object-fit: cover; border-radius: 10px; }
      .info-box { background: white; border-radius: 10px; padding: 20px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
      .price-tag { font-size: 1.5rem; color: #198754; font-weight: bold; }
      .meta span { display:inline-block; margin-right:15px; color:#555; }
      .back-btn { margin-top: 25px; }
  </style>
</head>
<body>
  <header class="p-3 bg-dark text-white d-flex justify-content-between align-items-center">
      <h3 class="m-0">🏠 HomeFinder</h3>
  </header>

  <div class="container py-5">
      <div class="row">
          <div class="col-md-7">
              @if($house->image_url)
                  <img src="{{ asset($house->image_url) }}" alt="{{ $house->title }}" class="house-image mb-3">
              @else
                  <img src="{{ asset('default-house.jpg') }}" alt="Default" class="house-image mb-3">
              @endif
          </div>

          <div class="col-md-5">
              <div class="info-box">
                  <h2>{{ $house->title }}</h2>
                  <p class="price-tag">৳{{ number_format($house->rent, 0) }} / month</p>
                  <div class="meta mb-3">
                      <span>🛏 {{ $house->bedrooms }} Bedrooms</span>
                      <span>🛁 {{ $house->bathrooms }} Bathrooms</span>
                      <span>📍 {{ $house->area }}, {{ $house->city }}</span>
                      <span>📅 {{ $house->month }} month</span>
                        @if(!empty($house->mobile))
            <span>📞 {{ $house->mobile }}</span>
        @endif
                  </div>
                  <p>{{ $house->description ?? 'No description provided.' }}</p>

                  <div class="mt-4">
                      <span class="badge bg-{{ $house->is_furnished ? 'success' : 'secondary' }}">
                          {{ $house->is_furnished ? 'Furnished' : 'Unfurnished' }}
                      </span>
                      <span class="badge bg-{{ $house->is_available ? 'success' : 'danger' }}">
                          {{ $house->is_available ? 'Available' : 'Not Available' }}
                      </span>
                  </div>

   <div class="mt-5 p-4 bg-white shadow-sm rounded">
    <h4>Leave a Comment</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('comment.store', $house->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Your Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Your Comment</label>
            <textarea name="comment" class="form-control" required rows="3"></textarea>
        </div>

        <button class="btn btn-primary">Submit Comment</button>
    </form>
</div>



<div class="mt-4">
    <h4>Comments</h4>

    @forelse($house->comments as $comment)
        <div class="p-3 border rounded mb-2 bg-light">
            <strong>{{ $comment->name }}</strong>
            <p class="m-0">{{ $comment->comment }}</p>
            <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
        </div>
    @empty
        <p class="text-muted">No comments yet. Be the first!</p>
    @endforelse
</div>



                  <div class="back-btn">
                      <a href="{{ route('house.rent') }}" class="btn btn-outline-primary">← Back to List</a>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <!-- <footer class="text-center py-3 bg-dark text-white">
      <p class="m-0">© 2025 HomeFinder</p>
  </footer> -->
</body>
</html>
