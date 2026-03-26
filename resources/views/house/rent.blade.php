<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HomeFinder | House Rent</title>
  <link rel="stylesheet" href="{{ asset('main.css') }}">
  </head>
<body>

  <header>
    <div class="logo">🏡 HomeFinder</div>
    <nav>
      <a href="{{ url ('/') }}">Home</a>
      <a href="{{ route ('posts.index') }}">As Such</a>
      <a href="{{ route('login') }}">Sign In</a>
      <a href="{{ route('register') }}">Register</a>
    </nav>
  </header>

  <section class="search">
  <form action="{{ route('house.rent') }}" method="GET" style="display:flex; gap:1rem; width:100%;">
    <input type="text" name="q" placeholder="Search city, area or landmark..." value="{{ request('q') }}">
    <select name="type">
      <option value="">Any type</option>
      <option value="Apartment" {{ request('type') == 'Apartment' ? 'selected' : '' }}>Apartment</option>
      <option value="House" {{ request('type') == 'House' ? 'selected' : '' }}>House</option>
      <option value="Room" {{ request('type') == 'Room' ? 'selected' : '' }}>Room</option>
    </select>
    <button type="submit">Search</button>
  </form>
</section>

  <div class="container">
    <h3>All Houses for Rent</h3>

    @if (session('success'))
      <div class="alert alert-success" style="text-align:center; color:green; font-weight:600;">
        {{ session('success') }}
      </div>
    @endif

    <div style="text-align:right; margin-bottom:1rem;">
      <a href="{{ route('house.create') }}" class="btn">+ Add New House</a>
    </div>

    <div class="table-responsive">
      <table>
        <thead>
          <tr>
            <th>#</th>
            <th>Image</th>
            <th>Title</th>
            <th>Rent (৳)</th>
            <th>Bedrooms</th>
            <th>Bathrooms</th>
            <th>Area</th>
            <th>City</th>
            <th>Month</th>
            <th>Furnished</th>
            <th>Available</th>
            <th>Actions</th>
          </tr>
        </thead>
       <tbody>
  @forelse($houses as $key => $house)
    <tr>
      <td data-label="#"> {{ $key + 1 }} </td>
      <!-- <td data-label="Image">
        @if($house->image_url)
          <img src="{{ asset($house->image_url) }}" alt="Image" width="80" height="60" style="object-fit:cover;">
        @else
          <span class="text-muted">No Image</span>
        @endif
      </td> -->
  <td data-label="Images">
    @if($house->images->count())
        @foreach($house->images as $image)
            <img src="{{ asset($image->image_path) }}" 
                 width="80" height="60"
                 style="object-fit:cover; margin-right:5px;">
        @endforeach
    @else
        <span class="text-muted">No Image</span>
    @endif
</td>
      <td data-label="Title">{{ $house->title }}</td>
      <td data-label="Rent">৳{{ number_format($house->rent, 0) }}</td>
      <td data-label="Bedrooms">{{ $house->bedrooms }}</td>
      <td data-label="Bathrooms">{{ $house->bathrooms }}</td>
      <td data-label="Area">{{ $house->area }}</td>
      <td data-label="City">{{ $house->city }}</td>
      <td data-label="Month">{{ $house->month }}</td>
      <td data-label="Furnished">
        <span class="badge bg-{{ $house->is_furnished ? 'success' : 'secondary' }}">
          {{ $house->is_furnished ? 'Yes' : 'No' }}
        </span>
      </td>
      <td data-label="Available">
        <span class="badge bg-{{ $house->is_available ? 'success' : 'danger' }}">
          {{ $house->is_available ? 'Available' : 'Not Available' }}
        </span>
      </td>
      <td data-label="Actions">
        <a href="{{ route('house.view', $house->id) }}" class="btn btn-sm btn-info">View</a>
      </td>
    </tr>
  @empty
    <tr>
      <td colspan="11" class="text-center text-muted">No houses found.</td>
    </tr>
  @endforelse
</tbody>

      </table>
    </div>
  </div>

  <footer>
    <p>© 2025 HomeFinder — Find your perfect place to live 🏠</p>
  </footer>

</body>
</html>