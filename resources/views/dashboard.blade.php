<x-layouts.app :title="__('Dashboard')">
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
        .delete-modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.65);
            backdrop-filter: blur(3px);
            justify-content: center;
            align-items: center;
        }

        /* Modal Box */
        .delete-modal-box {
            background: #ffffff;
            width: 380px;
            padding: 25px 30px;
            border-radius: 14px;
            text-align: center;
            animation: slideDown 0.25s ease-out;
            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.25);
        }

        /* Red warning icon */
        .delete-icon {
            font-size: 55px;
            margin-bottom: 10px;
            color: #ff3b3b;
        }

        /* Title */
        .delete-title {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        /* Subtitle text */
        .delete-text {
            font-size: 15px;
            color: #444;
            margin-bottom: 25px;
        }

        /* Buttons */
        .delete-btn-group {
            display: flex;
            justify-content: center;
            gap: 12px;
        }

        .btn-cancel {
            background: #dcdcdc;
            border: none;
            padding: 10px 18px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.2s;
        }

        .btn-cancel:hover {
            background: #bfbfbf;
        }

        .btn-confirm {
            background: #ff3b3b;
            border: none;
            padding: 10px 18px;
            color: #fff;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.2s;
        }

        .btn-confirm:hover {
            background: #e12d2d;
        }

        /* Animation */
        @keyframes slideDown {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
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

    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 p-4">
            <div class="flex justify-between align-center">
                <h2 class="bold">All Generated Offer Letters</h2>

                <form action="{{ route('dashboard') }}" method="GET">
                    <input type="text" name="search" placeholder="Search Name, Email, Phone"
                        value="{{ $search }}" class="border rounded p-1">
                    <button type="submit" class="btn-edit p-1 rounded">Search</button>
                </form>
            </div>

            <div class="dark-table-container">
                <table class="dark-table">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($offers as $key => $offer)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $offer->candidate_name }}</td>
                            <td>{{ $offer->email }}</td>
                            <td>{{ $offer->phone }}</td>
                            <td>
                                <a href="{{ route('offer-letter.view', $offer->id) }}" target="_blank" class="action-btn btn-view">View</a>
                                <a href="/offer-letter/edit/{{$offer->id}}" class="action-btn btn-edit">Edit</a>
                                <span class="action-btn btn-delete" onclick="openDelete({{ $offer->id }})">Delete</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $offers->links('pagination::bootstrap-5') }}
            </div>

            <!-- DELETE MODAL -->
            <div id="modalDelete" class="modal delete-modal">
                <div class="delete-modal-box">

                    <div class="delete-icon">
                        ⚠️
                    </div>

                    <h3 class="delete-title">Are you sure?</h3>
                    <p class="delete-text">This action cannot be undone. Do you really want to delete this record?</p>

                    <form id="deleteForm" method="POST" class="delete-btn-group">
                        @csrf
                        @method('DELETE')

                        <button type="button" data-close class="btn-cancel">Cancel</button>
                        <button type="submit" class="btn-confirm">Yes, Delete</button>
                    </form>

                </div>
            </div>


        </div>
    </div>

    <!-- Floating Add Button -->
    <a href="{{ route('offer-letter.add') }}" class="add-btn">+ Add</a>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function openView(id) {
            $.get("/offer-letter/get/" + id, function(data) {
                let html = `
            <p><strong>Name:</strong> ${data.candidate_name}</p>
            <p><strong>Email:</strong> ${data.email}</p>
            <p><strong>Phone:</strong> ${data.phone}</p>
            <p><strong>Position:</strong> ${data.position}</p>
        `;
                $("#viewContent").html(html);
                $("#modalView").show();
            });
        }

        function openEdit(id) {
            $("#editContent").html('<p>Loading...</p>');
            $("#modalEdit").show();

            $.get("/offer-letter/edit/" + id, function(html) {
                $("#editContent").html(html);
            });
        }

        function openDelete(id) {
            document.getElementById("deleteForm").action = "/offer-letter/delete/" + id;
            document.getElementById("modalDelete").style.display = "flex";
        }

        document.querySelectorAll("[data-close]").forEach(btn => {
            btn.onclick = () => btn.closest(".modal").style.display = "none";
        });

        window.onclick = function(e) {
            if (e.target.classList.contains("modal")) {
                e.target.style.display = "none";
            }
        };


        document.querySelectorAll("[data-close]").forEach(btn => {
            btn.onclick = () => btn.closest(".modal").style.display = "none";
        });
        window.onclick = function(e) {
            if (e.target.classList.contains("modal")) e.target.style.display = "none";
        };
    </script>


</x-layouts.app>