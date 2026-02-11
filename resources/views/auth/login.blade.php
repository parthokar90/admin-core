<form method="POST" action="{{ route('admin.login.submit') }}">
    @csrf

    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
    @error('email')
        <div style="color:red">{{ $message }}</div>
    @enderror

    <input type="password" name="password" placeholder="Password">
    @error('password')
        <div style="color:red">{{ $message }}</div>
    @enderror

    <button type="submit">Login</button>
</form>

@if(session('error'))
    <div style="color:red">{{ session('error') }}</div>
@endif
