<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 250px;
            background: #343a40;
            color: white;
            padding: 20px;
        }
        .sidebar a {
            color: #ddd;
            text-decoration: none;
            display: block;
            padding: 8px 0;
        }
        .sidebar a:hover {
            color: #fff;
        }
        .content {
            flex: 1;
            background: #f8f9fa;
            padding: 20px;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h4>My App</h4>
        <hr>
          <a href="{{ route ('profile.home') }}">🚪 Profile</a>
        <a href="{{ route ('house.create') }}">🏠 House Rent</a>
        <a href="{{ route ('posts.index') }}">🏠 As Such</a>
        
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    🚪 Logout
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
    </div>

    <div class="content">
        @yield('content')
    </div>

</body>
</html>
