<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Support - Daftar Ticket</title>
    <style>
        table { border-collapse: collapse; width: 100% }
        th, td { border: 1px solid #ccc; padding: 8px; }
        form { display: inline-block; margin: 0 }
        .flash { background:#e6ffed; border:1px solid #a6f3b5; padding:8px; margin:12px 0 }
    </style>
</head>
<body>
    <h1>Support - Daftar Ticket</h1>

    @if(session('success'))
        <div class="flash">{{ session('success') }}</div>
    @endif

    <p><a href="{{ url('/tickets') }}">← Kembali ke daftar (user)</a></p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Ticket No</th>
                <th>User</th>
                <th>Category</th>
                <th>Title</th>
                <th>Status</th>
                <th>Ubah Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $t)
            <tr>
                <td>{{ $t->id }}</td>
                <td>{{ $t->ticket_no }}</td>
                <td>{{ optional($t->user)->name ?? '—' }}</td>
                <td>{{ optional($t->category)->name ?? '—' }}</td>
                <td>{{ $t->title }}</td>
                <td><strong>{{ $t->status }}</strong></td>
                <td>
                    <form method="POST" action="{{ route('support.tickets.update', $t) }}">
                        @csrf
                        @method('PATCH')
                        <select name="status_to">
                            <option value="Open" {{ $t->status=='Open' ? 'selected' : '' }}>Open</option>
                            <option value="On Progress" {{ $t->status=='On Progress' ? 'selected' : '' }}>On Progress</option>
                            <option value="Resolved" {{ $t->status=='Resolved' ? 'selected' : '' }}>Resolved</option>
                            <option value="Closed" {{ $t->status=='Closed' ? 'selected' : '' }}>Closed</option>
                        </select>
                        <input type="text" name="note" placeholder="Catatan (opsional)" style="width:200px">
                        <button type="submit">Update</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>