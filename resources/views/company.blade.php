<x-layouts.app :title="__('Company Details')">
    <link rel="icon" type="image/png" href="{{ asset('fav.png') }}">

    <style>
        .dark-table-container {
            width: 100%;
            background: #1f1f1f;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }

        .dark-table {
            width: 100%;
            border-collapse: collapse;
            color: #fff;
        }

        .dark-table th {
            background: #2a2a2a;
            padding: 12px;
            text-align: left;
            font-weight: 600;
            border-bottom: 1px solid #3a3a3a;
        }

        .dark-table td {
            padding: 12px;
            border-bottom: 1px solid #333;
        }

        .dark-table tr:hover {
            background: #2b2b2b;
        }

        .action-btn {
            padding: 6px 10px;
            border-radius: 5px;
            color: #fff;
            margin-right: 6px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-view {
            background: #2563eb;
        }

        .btn-edit {
            background: #facc15;
            color: #000;
        }

        .btn-download {
            background: #16a34a;
        }

        .btn-delete {
            background: #dc2626;
        }

        /* Modal Base */
        .modal {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.65);
            backdrop-filter: blur(4px);
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .modal-content {
            width: 450px;
            background: rgba(30, 30, 30, 0.95);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            padding: 24px;
            animation: pop 0.25s ease;
            color: white;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.4);
        }

        @keyframes pop {
            from {
                transform: scale(0.9);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        .modal-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .close-btn {
            cursor: pointer;
            font-size: 20px;
            font-weight: bold;
            color: #ccc;
            transition: 0.25s;
        }

        .close-btn:hover {
            color: white;
            transform: scale(1.1);
        }

        .modal-input {
            width: 100%;
            margin-top: 6px;
            margin-bottom: 14px;
            padding: 10px;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
            outline: none;
            transition: 0.25s;
        }

        .modal-input:focus {
            border-color: #6366f1;
            background: rgba(255, 255, 255, 0.12);
        }

        .modal-label {
            font-size: 14px;
            color: #d1d5db;
            font-weight: 500;
        }

        .btn-primary {
            background: #4f46e5;
            padding: 10px 14px;
            border-radius: 10px;
            font-weight: bold;
            color: white;
            width: 100%;
            transition: 0.25s;
        }

        .btn-primary:hover {
            background: #4338ca;
            transform: translateY(-2px);
        }

        /* Floating Add Button */
        .add-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: #28a745;
            color: #fff;
            padding: 14px 18px;
            border-radius: 50px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.3);
            z-index: 2000;
            transition: 0.2s;
        }

        .add-btn:hover {
            background: #218838;
        }
    </style>

    <div class="relative overflow-hidden rounded-xl border border-neutral-700 p-4">

        <div class="flex justify-between mb-4">
            <h2 class="text-xl font-bold text-white">All Companies</h2>
        </div>

        <table class="dark-table w-full">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Logo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>CIN</th>
                    <th>Website</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($companies as $key => $c)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>
                        @if($c->c_logo)
                        <img src="{{ asset('storage/'.$c->c_logo) }}" width="40">
                        @else
                        —
                        @endif
                    </td>
                    <td>{{ $c->c_name }}</td>
                    <td>{{ $c->c_email }}</td>
                    <td>{{ $c->cin_number }}</td>
                    <td>{{ $c->c_website }}</td>
                    <td>{{ $c->c_address }}</td>
                    <td>
                        <span class="action-btn btn-edit"
                            data-id="{{ $c->id }}"
                            data-name="{{ $c->c_name }}"
                            data-email="{{ $c->c_email }}"
                            data-cin="{{ $c->cin_number }}"
                            data-website="{{ $c->c_website }}"
                            data-address="{{ $c->c_address }}"
                            data-modal="modalEdit">Edit</span>
                        <span class="action-btn btn-delete" data-id="{{ $c->id }}" data-modal="modalDelete">Delete</span>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
    </div>

    <!-- ADD MODAL -->
    <div id="modalAdd" class="modal">
        <div class="modal-content">

            <div class="modal-title">
                Add Company
                <span class="close-btn" data-close>&times;</span>
            </div>

            <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <label class="modal-label">Company Name</label>
                <input name="c_name" class="modal-input" required>

                <label class="modal-label">Email</label>
                <input name="c_email" class="modal-input" required>

                <label class="modal-label">CIN Number</label>
                <input name="cin_number" class="modal-input" required>

                <label class="modal-label">Website</label>
                <input name="c_website" class="modal-input">

                <label class="modal-label">Address</label>
                <input name="c_address" class="modal-input">

                <label class="modal-label">Company Logo</label>
                <input type="file" name="c_logo" class="modal-input">

                <button class="btn-primary mt-2">Save</button>
            </form>

        </div>
    </div>


    <!-- EDIT MODAL -->
    <!-- EDIT MODAL -->
    <div id="modalEdit" class="modal">
        <div class="modal-content">

            <div class="modal-title">
                Edit Company
                <span class="close-btn" data-close>&times;</span>
            </div>

            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf

                <label class="modal-label">Company Name</label>
                <input id="e_name" name="c_name" class="modal-input" required>

                <label class="modal-label">Email</label>
                <input id="e_email" name="c_email" class="modal-input" required>

                <label class="modal-label">CIN Number</label>
                <input id="e_cin" name="cin_number" class="modal-input" required>

                <label class="modal-label">Website</label>
                <input id="e_website" name="c_website" class="modal-input">

                <label class="modal-label">Address</label>
                <input id="e_address" name="c_address" class="modal-input">

                <label class="modal-label">Company Logo</label>
                <input type="file" name="c_logo" class="modal-input">

                <button class="btn-primary mt-2">Update</button>
            </form>

        </div>
    </div>


    <!-- DELETE MODAL -->
    <!-- DELETE MODAL -->
    <div id="modalDelete" class="modal">
        <div class="modal-content">

            <div class="modal-title">
                Delete Company?
                <span class="close-btn" data-close>&times;</span>
            </div>

            <p style="color:#d1d5db; margin-bottom: 18px;">
                Are you sure you want to delete this company? This action cannot be undone.
            </p>

            <form id="deleteForm" method="POST">
                @csrf
                <button class="btn-delete"
                    style="
                    background:#dc2626; 
                    width:100%;
                    padding:10px;
                    border-radius:10px;
                    color:white;
                    font-weight:bold;
                    transition:0.25s;
                ">
                    Delete
                </button>
            </form>

        </div>
    </div>


    <!-- Floating Add Button -->
    <div class="add-btn" data-modal="modalAdd">+ Add</div>

    <script>
        // OPEN MODALS
        document.querySelectorAll(".action-btn, .add-btn").forEach(btn => {
            btn.addEventListener("click", function() {
                const modalId = this.dataset.modal;
                if (modalId) document.getElementById(modalId).style.display = "flex";

                if (this.classList.contains("btn-edit")) {
                    document.getElementById("e_name").value = this.dataset.name;
                    document.getElementById("e_email").value = this.dataset.email;
                    document.getElementById("e_cin").value = this.dataset.cin;
                    document.getElementById("e_website").value = this.dataset.website;
                    document.getElementById("e_address").value = this.dataset.address;
                    document.getElementById("editForm").action = "/company/update/" + this.dataset.id;
                }

                if (this.classList.contains("btn-delete")) {
                    document.getElementById("deleteForm").action = "/company/delete/" + this.dataset.id;
                }
            });
        });

        // CLOSE MODAL
        document.querySelectorAll("[data-close]").forEach(btn => {
            btn.addEventListener("click", function() {
                this.closest(".modal").style.display = "none";
            });
        });
    </script>


</x-layouts.app>