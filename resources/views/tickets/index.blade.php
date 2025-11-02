<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Helpdesk Ticket</title>
  <link rel="stylesheet" href="{{ asset('css/style.css?v=5') }}">
</head>
<body>
  <h2>Daftar Ticket</h2>

  @if (session('success'))
    <p style="color:green;">{{ session('success') }}</p>
  @endif

  <p><a href="{{ route('tickets.create') }}">+ Buat Ticket Baru</a></p>

  <table border="1" cellpadding="6" cellspacing="0">
    <thead>
      <tr>
        <th>ID</th>
        <th>Ticket No</th>
        <th>Category</th>
        <th>Title</th>
        <th>Status</th>
        <th>Created</th>
      </tr>
    </thead>
    <tbody>
    @forelse ($tickets as $t)
      <tr>
        <td>{{ $t->id }}</td>
        <td>{{ $t->ticket_no }}</td>
        <td>{{ optional($t->category)->name }}</td>
        <td>{{ $t->title }}</td>
        <td>{{ $t->status }}</td>
        <td>{{ $t->created_at }}</td>
      </tr>
    @empty
      <tr><td colspan="6">Belum ada ticket.</td></tr>
    @endforelse
    </tbody>
  </table>
</body>
</html>