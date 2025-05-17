@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>แก้ไขผู้ใช้งาน</h2>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>ชื่อ</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>
        <div class="mb-3">
            <label>อีเมล</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>
        <button type="submit" class="btn btn-primary">อัปเดต</button>
    </form>
</div>
@endsection
