
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
  
</head>
<body>
    <div>
        <a href="{{ route('export')}}" > Export excel </a>
    </div>

    <div>
        <h3>
            all transaction 
        </h3>
    </div>
    <table  border="1" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th>Site</th>
                <th>Reference</th>
                <th>User</th>
                <th>Payment</th>
                <th>Payment Type</th>
                <th>Date</th>
                <th>Description</th>
                <th>Amount</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $item)
            <tr>
                <td>{{ $item->site }}</td>
                <td>{{ $item->reference }}</td>
                <td>{{ $item->user }}</td>
                <td>{{ $item->payment }}</td>
                <td>{{ $item->paymenttype }}</td>
                <td>{{ $item->date }}</td>
                <td>{{ $item->description }}</td>
                <td >
                    <p style="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{number_format($item->amount,2)}}" > 
                        {{ Str::limit($item->amount,5, '...') }}</p>
                </td>
                <td>
                    <a href="{{ route('users.edit', $item->id) }}">Edit</a>
                    <form action="{{ route('users.destroy', $item->id) }}" method="post" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background-color: red; color: white; border: none; padding: 5px 10px; cursor: pointer;">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        var tooltipTriggerList = document.querySelectorAll( '[data-bs-toggle="tooltip"]');
        tooltipTriggerList.forEach(function (tooltipTriggerEl) {
            new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>
    
</body>
</html>

