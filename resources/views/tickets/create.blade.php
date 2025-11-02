<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Helpdesk Ticket</title>
  <link rel="stylesheet" href="{{ asset('css/style.css?v=5') }}">
</head>
<body>
  <h2>Buat Ticket Baru</h2>

  @if ($errors->any())
    <div style="color:red;">
      <ul>
        @foreach ($errors->all() as $e)
          <li>{{ $e }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ route('tickets.store') }}">
    @csrf

    <div>
      <label>User ID</label><br>
      <input type="number" name="user_id" value="2" required>
      <small>sementara pakai 2 (user contoh)</small>
    </div><br>

    <div>
      <label>Kategori</label><br>
      <select name="category_id" required>
        <option value="1">Software</option>
        <option value="2">Hardware</option>
        <option value="3">Network</option>
      </select>
    </div><br>

    <div>
      <label>Judul</label><br>
      <input type="text" name="title" required maxlength="255">
    </div><br>

    <div>
      <label>Deskripsi</label><br>
      <textarea name="description" rows="4"></textarea>
    </div><br>

    <button type="submit">Kirim Ticket</button>
    <a href="{{ route('tickets.index') }}">Lihat Daftar Ticket</a>
  </form>
</body>
</html>