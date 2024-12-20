

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <select name="site" id="">
                <option value="{{ $user->site }}" >{{ $user->site }}</option>
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
                <option value="{{ $user->reference}}" >{{ $user->reference}}</option>
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
            <input type="text" value="{{ $user->user}}" name="user" placeholder="Enter user">
            @error('user')
            <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>
        <br>
        <div>
            <input type="text" value= "{{$user->payment}}" name="payment" placeholder="Enter payment">
            @error('payment')
            <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>
        <br>
        <div>
            <select name="paymenttype">
                <option value="{{ $user->paymenttype }}" >{{ $user->paymenttype }}</option>
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
            <input type="date" value="{{ $user->date }}" name="date">
            @error('date')
            <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>
        <br>
        <div>
            <textarea name="description"  placeholder="Enter description">{{ $user->description}}</textarea>
            @error('description')
            <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>
        <br>
        <div>
            <input type="number" value="{{ $user->amount }}" name="amount" placeholder="Enter amount">
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