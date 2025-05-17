    @extends('layout')

@section('content')
<div class="container mt-4">
    <h2>เพิ่มผู้ใช้งาน</h2>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>ชื่อ</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>อีเมล</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">บันทึก</button>
    </form>
</div>
@endsection
