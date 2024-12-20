
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


    {{-- <img src="{{ Auth::user()->profile_image }}" alt="Profile Picture" class="rounded-circle" width="50" height="50">
    <p>{{ Auth::user()->name }}</p>
    <p>{{ Auth::user()->email }}</p> --}}
        <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <select name="site" id="">
                <option value="" disabled selected>Choose site</option>
                <option value="Admin">Admin</option>
                <option value="David">David</option>
                <option value="Ali">Ali</option>
            </select>
            @error('site')
            <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>
        <br>
        <div>
            <select name="reference" id="">
                <option value="" disabled selected>Choose reference</option>
                <option value="Reference1">Reference1</option>
                <option value="Reference2">Reference2</option>
                <option value="Reference3">Reference3</option>
            </select>
            @error('reference')
            <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>
        <br>
        <div>
            <input type="text" name="user" placeholder="Enter user">
            @error('user')
            <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>
        <br>
        <div>
            <input type="text" name="payment" placeholder="Enter payment">
            @error('payment')
            <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>
        <br>
        <div>
            <select name="paymenttype">
                <option value="" disabled selected>Choose payment type</option>
                <option value="Cash">Cash</option>
                <option value="Credit Card">Credit Card</option>
                <option value="Bank Transfer">Bank Transfer</option>
            </select>
            @error('paymenttype')
            <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>
        <br>
        <div>
            <input type="date" name="date">
            @error('date')
            <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>
        <br>
        <div>
            <textarea name="description" placeholder="Enter description"></textarea>
            @error('description')
            <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>
        <br>
        <div>
            <input type="number" name="amount" placeholder="Enter amount">
            @error('amount')
            <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>
        <br>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
    
</body>
</html>