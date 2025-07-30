@extends('admin.layouts.app')

@section('content')

    <form method="POST" action="{{ route('logout') }}" id="logout">
        @csrf
        <button class="btn btn-primary" type="submit">Logout</button>
    </form>
@endsection