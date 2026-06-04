<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Students List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        /* SweetAlert theme to match system colors */
        .swal-theme-popup {
            background: #121f19 !important;
            color: #e8f5ee !important;
            border: 1px solid #1e3a2c !important;
            box-shadow: 0 20px 60px rgba(0,0,0,0.6) !important;
        }
        .swal-theme-title { color: #e8f5ee !important; font-weight:800; }
        .swal-theme-content { color: #7a9e8c !important; }
        .swal-theme-confirm { background: linear-gradient(90deg,#2dd4a0,#1aac82) !important; color:#06110f !important; border-radius:8px !important; padding:8px 14px !important; }
        .swal-theme-cancel { background: transparent !important; color:#e8f5ee !important; border:1px solid #1e3a2c !important; border-radius:8px !important; padding:8px 12px !important; }
        .swal-theme-toast { background:#121f19 !important; color:#e8f5ee !important; border:1px solid #1e3a2c !important; }

        .modal-label { display:block; font-size:12px; color:#7a9e8c; margin-bottom:6px; font-weight:700; text-transform:uppercase; letter-spacing:0.6px; }
        body { font-family: system-ui, -apple-system, 'Segoe UI', Roboto, 'DM Sans', sans-serif; background:#0a0f0d; color:#e8f5ee; padding:32px; }
        .card { background:#121f19; border:1px solid #1e3a2c; padding:18px; border-radius:12px; }
        table { width:100%; border-collapse:collapse; }
        th, td { padding:10px 12px; text-align:left; border-bottom:1px solid rgba(255,255,255,0.03); }
        th { color:#7a9e8c; font-size:13px; text-transform:uppercase; letter-spacing:0.6px; }
        a.btn { display:inline-block; background:linear-gradient(135deg,#2dd4a0,#1aac82); color:#06110f; padding:10px 14px; border-radius:10px; font-weight:700; text-decoration:none; }
        /* Action buttons */
        .action-btn-edit { display:inline-flex; align-items:center; justify-content:center; gap:6px; background:linear-gradient(90deg,#e8c468,#f6d78b); color:#07120f; padding:8px 10px; border-radius:8px; border:none; text-decoration:none; font-weight:700; }
        .action-btn-edit:hover { transform:translateY(-2px); box-shadow:0 8px 20px rgba(232,196,104,0.12); }
        .action-btn-delete { display:inline-flex; align-items:center; justify-content:center; gap:6px; background:linear-gradient(90deg,#f87171,#fb9b9b); color:#07120f; padding:8px 10px; border-radius:8px; border:none; cursor:pointer; font-weight:700; }
        .action-btn-delete:hover { transform:translateY(-2px); box-shadow:0 8px 20px rgba(248,113,113,0.12); }
    </style>
</head>
<body>
    <div style="max-width:1000px; margin:0 auto;">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:18px;">
            <h1 style="font-size:20px; font-weight:900;">Students</h1>
            <div style="display:flex; gap:8px;">
                <a href="{{ route('student.create') }}" class="btn"><i class="fas fa-plus" style="margin-right:8px;"></i>Add Student</a>
            </div>
        </div>
    
    <!-- Edit Modal -->
    <div id="editModal" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.6); z-index:9999; align-items:center; justify-content:center;">
        <div style="background:#0f1a15; border:1px solid #1e3a2c; padding:20px; width:520px; max-width:95%; border-radius:12px; box-shadow:0 20px 60px rgba(0,0,0,0.6);">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:12px;">
                <h3 style="margin:0; font-size:18px; font-weight:800;">Edit Student</h3>
                <button id="closeEditModal" style="background:transparent; border:none; color:#7a9e8c; font-size:18px; cursor:pointer;">&times;</button>
            </div>
            <form id="editForm" method="POST" action="#">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="editId">
                <div style="display:flex; gap:10px; margin-bottom:10px;">
                    <div style="flex:1;">
                        <label class="modal-label" for="editFirst">First Name</label>
                        <input name="first_name" id="editFirst" placeholder="First name" style="width:100%; padding:10px; border-radius:8px; border:1px solid #1e3a2c; background:#121f19; color:#e8f5ee;">
                    </div>
                    <div style="flex:1;">
                        <label class="modal-label" for="editLast">Last Name</label>
                        <input name="last_name" id="editLast" placeholder="Last name" style="width:100%; padding:10px; border-radius:8px; border:1px solid #1e3a2c; background:#121f19; color:#e8f5ee;">
                    </div>
                </div>
                <div style="display:flex; gap:10px; margin-bottom:10px;">
                    <div style="flex:1;">
                        <label class="modal-label" for="editCourse">Course</label>
                        <select name="course" id="editCourse" style="width:100%; padding:10px; border-radius:8px; border:1px solid #1e3a2c; background:#121f19; color:#e8f5ee;">
                            <option value="BSIT">BSIT</option>
                            <option value="CTE">CTE</option>
                            <option value="CBAE">CBAE</option>
                            <option value="BSCRIM">BSCRIM</option>
                            <option value="CHTM">CHTM</option>
                            <option value="SHS">SHS</option>
                        </select>
                    </div>
                    <div style="flex:1;">
                        <label class="modal-label" for="editYear">Year Level</label>
                        <select name="year_level" id="editYear" style="width:100%; padding:10px; border-radius:8px; border:1px solid #1e3a2c; background:#121f19; color:#e8f5ee;">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </div>
                </div>
                <div style="margin-bottom:12px;">
                    <label class="modal-label" for="editEmail">Email</label>
                    <input name="email" id="editEmail" placeholder="Email" style="width:100%; padding:10px; border-radius:8px; border:1px solid #1e3a2c; background:#121f19; color:#e8f5ee;">
                </div>
                <div style="display:flex; gap:8px; justify-content:flex-end;">
                    <button type="button" id="cancelEdit" style="padding:10px 14px; background:transparent; border:1px solid #1e3a2c; color:#e8f5ee; border-radius:8px; cursor:pointer;">Cancel</button>
                    <button type="submit" style="padding:10px 14px; background:linear-gradient(90deg,#2dd4a0,#1aac82); color:#06110f; border-radius:8px; border:none; font-weight:800;">Save</button>
                </div>
            </form>
        </div>
    </div>

        <div class="card">
            @if($students->isEmpty())
                <div style="color:#7a9e8c; padding:24px; text-align:center;">No students found.</div>
            @else
                <div style="overflow:auto;">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Course</th>
                                <th>Year Level</th>
                                <th>Email</th>
                                <th style="width:120px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $s)
                                <tr data-id="{{ $s->id }}" data-first="{{ $s->first_name }}" data-last="{{ $s->last_name }}" data-course="{{ $s->course }}" data-year="{{ $s->year_level }}" data-email="{{ $s->email }}">
                                    <td>{{ $s->id ?? $loop->iteration }}</td>
                                    <td>{{ $s->first_name }}</td>
                                    <td>{{ $s->last_name }}</td>
                                    <td>{{ $s->course }}</td>
                                    <td>{{ $s->year_level }}</td>
                                    <td>{{ $s->email }}</td>
                                    <td>
                                        <div style="display:flex; gap:8px;">
                                            <button type="button" class="action-btn-edit edit-btn" data-id="{{ $s->id }}" title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>
                                            <form method="POST" action="{{ route('students.destroy', $s->id) }}" class="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="action-btn-delete" aria-label="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</body>
<script>
    // Intercept delete forms, handle edit modal, and show SweetAlert2 confirmation
    document.addEventListener('DOMContentLoaded', function () {
        // Delete confirmation
        document.querySelectorAll('.delete-form').forEach(function(form){
            form.addEventListener('submit', function(e){
                e.preventDefault();
                Swal.fire({
                    title: 'Delete student? ',
                    text: 'This action cannot be undone.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete',
                    cancelButtonText: 'Cancel',
                    customClass: {
                        popup: 'swal-theme-popup',
                        title: 'swal-theme-title',
                        content: 'swal-theme-content',
                        confirmButton: 'swal-theme-confirm',
                        cancelButton: 'swal-theme-cancel'
                    }
                }).then((result) => {
                    if (result.isConfirmed) { form.submit(); }
                });
            });
        });

        // Edit modal logic
        const editModal = document.getElementById('editModal');
        const editForm = document.getElementById('editForm');
        const editId = document.getElementById('editId');
        const editFirst = document.getElementById('editFirst');
        const editLast = document.getElementById('editLast');
        const editCourse = document.getElementById('editCourse');
        const editYear = document.getElementById('editYear');
        const editEmail = document.getElementById('editEmail');
        const closeEditModal = document.getElementById('closeEditModal');
        const cancelEdit = document.getElementById('cancelEdit');

        function openEdit(id) {
            const tr = document.querySelector('tr[data-id="' + id + '"]');
            if (!tr) return;
            const data = tr.dataset;
            editId.value = data.id || id;
            editFirst.value = data.first || '';
            editLast.value = data.last || '';
            editCourse.value = data.course || '';
            editYear.value = data.year || '';
            editEmail.value = data.email || '';
            editForm.action = '/students/' + id;
            editModal.style.display = 'flex';
        }

        function closeModal() {
            editModal.style.display = 'none';
        }

        document.querySelectorAll('.edit-btn').forEach(function(btn){
            btn.addEventListener('click', function(){
                const id = btn.dataset.id;
                openEdit(id);
            });
        });

        closeEditModal.addEventListener('click', closeModal);
        cancelEdit.addEventListener('click', closeModal);
        // click outside modal content closes
        editModal.addEventListener('click', function(e){ if (e.target === editModal) closeModal(); });

        // Show success toast if session message exists
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Done',
                text: {!! json_encode(session('success')) !!},
                timer: 1500,
                showConfirmButton: false,
                toast: true,
                position: 'top-end',
                customClass: { popup: 'swal-theme-toast' }
            });
        @endif
    });
</script>
</html>
