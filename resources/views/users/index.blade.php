@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>รายชื่อผู้ใช้งาน</h2>

    {{-- 🔍 ฟอร์มค้นหา --}}
    <form method="GET" action="{{ route('users.index') }}" class="mb-3 d-flex gap-2">
        <input type="text" name="search" class="form-control" placeholder="ค้นหาชื่อหรืออีเมล..." value="{{ $search ?? '' }}">
        <button class="btn btn-info" type="submit">ค้นหา</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">รีเซ็ต</a>
    </form>

    {{-- ➕ ปุ่มเพิ่มข้อมูล --}}
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">+ เพิ่มข้อมูล</a>

    {{-- 📋 ตารางผู้ใช้ --}}
    <table class="table table-bordered">
        <tr>
            <th>ชื่อ</th>
            <th>อีเมล</th>
            <th>จัดการ</th>
        </tr>
        @forelse($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">แก้ไข</a>

                {{-- ปุ่มลบแบบมี SweetAlert2 --}}
                <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $user->id }})">ลบ</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="3" class="text-center">ไม่พบข้อมูล</td>
        </tr>
        @endforelse
    </table>

    {{-- 🔁 Pagination --}}
    <div class="d-flex justify-content-center">
        {!! $users->links() !!}
    </div>
</div>
@endsection

{{-- 🔔 SweetAlert2 popup --}}
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'สำเร็จ',
            text: '{{ session('success') }}',
            timer: 2000,
            showConfirmButton: false
        });
    @endif

    function confirmDelete(id) {
        Swal.fire({
            title: 'คุณแน่ใจหรือไม่?',
            text: "คุณต้องการลบข้อมูลนี้ใช่หรือไม่",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'ลบเลย',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>
@endsection
