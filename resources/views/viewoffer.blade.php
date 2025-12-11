<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sumatra Offer Letter</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f0f0f0;
            /* padding: 20px; */
        }

        .page {
            width: 210mm;
            min-height: 297mm;
            background: #e6f2f8;
            margin: 0 auto 20px;
            padding: 15mm;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            page-break-after: always;
            border: 3px solid #4a90c5;
            position: relative;
        }

        .header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .logo {
            width: 50px;
            height: 50px;
            background: #ff6b35;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: white;
            font-size: 10px;
            text-align: center;
            margin-right: 15px;
            flex-shrink: 0;
        }

        .company-name {
            font-size: 24px;
            font-weight: bold;
            color: #2b8ec4;
            letter-spacing: 2px;
        }

        .date-header {
            text-align: right;
            font-size: 14px;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .title {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin: 20px 0;
            padding: 10px;
            background: #c8dce8;
            border: 1px solid #4a90c5;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #4a90c5;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background: #c8dce8;
            font-weight: bold;
        }

        th:first-child {
            width: 60px;
            text-align: center;
        }

        th:nth-child(2) {
            width: 35%;
        }

        td {
            background: white;
        }

        .responsibility-text {
            font-size: 12px;
            line-height: 1.5;
        }

        .footer-section {
            margin-top: 80px;
            display: flex;
            justify-content: space-between;
        }

        .signature-block {
            text-align: center;
            width: 45%;
        }

        .signature-line {
            margin-top: 60px;
            font-size: 14px;
            line-height: 1.8;
        }

        .acceptance-box {
            text-align: right;
            margin-top: 20px;
            font-weight: bold;
        }

        .leave-policy {
            padding: 20px;
            background: white;
            border-radius: 5px;
            margin-top: 20px;
        }

        .leave-policy h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 22px;
        }

        .leave-policy p {
            line-height: 1.6;
            margin-bottom: 15px;
            text-align: justify;
        }

        .leave-policy h3 {
            margin-top: 20px;
            margin-bottom: 10px;
            font-size: 16px;
        }

        .leave-policy ul {
            margin-left: 20px;
            margin-bottom: 15px;
        }

        .leave-policy li {
            margin-bottom: 8px;
            line-height: 1.6;
        }

        .small-table th {
            width: 50%;
        }

        .small-table th:first-child {
            width: 60px;
            text-align: center;
        }

        .small-table th:nth-child(2) {
            width: 40%;
        }

        a {
            color: #2b8ec4;
            text-decoration: none;
        }


        .print-button {
            position: fixed;
            bottom: 25px;
            right: 25px;
            background: #2563eb;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-weight: bold;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            z-index: 9999;
        }

        @media print {
            body {
                background: white;
                padding: 0;
            }

            .page {
                margin: 0;
                box-shadow: none;
                border: none;
                page-break-after: always;
            }

            .print-button {
                display: none !important;
            }
        }
    </style>
</head>

<body>
    <!-- PAGE 1 -->
    <div class="page">
        <div class="header">
            @if($company && $company->c_logo)
            <img src="{{ asset('storage/'.$company->c_logo) }}"
                alt="Company Logo"
                style="width:120px; height:auto;">
            @else
            <img src="https://via.placeholder.com/120x60?text=No+Logo"
                alt="No Logo">
            @endif

        </div>

        <div class="date-header">Date: {{ $offer->date ? \Carbon\Carbon::parse($offer->date)->format('d-m-Y') : '' }}</div>

        <div class="title">Offer Letter</div>

        <table>
            <tr>
                <th>1</th>
                <th>Appointed at</th>
                <td>{{$offer->appointed_at}}</td>
            </tr>
            <tr>
                <th>2</th>
                <th>Company address</th>
                <td>{{$offer->company_address}}</td>
            </tr>
            <tr>
                <th>3</th>
                <th>CIN number</th>
                <td>{{$offer->cin_number}}</td>
            </tr>
            <tr>
                <th>4</th>
                <th>Primary Contact</th>
                <td>{{$offer->primary_contact}}</td>
            </tr>
            <tr>
                <th>5</th>
                <th>Email</th>
                <td><a href="mailto:{{$offer->company_email}}">{{$offer->company_email}}</a></td>
            </tr>
            <tr>
                <th>6</th>
                <th>MD contact</th>
                <td>{{$offer->md_contact}}</td>
            </tr>
            <tr>
                <th>7</th>
                <th>Website</th>
                <td><a href="https://{{$offer->website}}">{{$offer->website}}</a></td>
            </tr>
            <tr>
                <th>8</th>
                <th>Candidate Name:-</th>
                <td style="text-transform: capitalize;">{{$offer->candidate_name}}</td>
            </tr>
            <tr>
                <th>9</th>
                <th>Candidate Address -</th>
                <td>{{$offer->address}}</td>
            </tr>
            <tr>
                <th>10</th>
                <th>Phone no:</th>
                <td>{{$offer->phone}}</td>
            </tr>
            <tr>
                <th>11</th>
                <th>Email id</th>
                <td><a href="mailto:{{$offer->email}}">{{$offer->email}}</a></td>
            </tr>
            <tr>
                <th>12</th>
                <th>Adhaar Card Number</th>
                <td>{{$offer->adhar}}</td>
            </tr>
            <tr>
                <th>13</th>
                <th>Position -</th>
                <td>{{$offer->position}}</td>
            </tr>
            <tr>
                <th>14</th>
                <th>Responsibility</th>
                @php
                $responsibilityData = $offer->responsibility;

                // If already array → keep it
                if (is_array($responsibilityData)) {
                $responsibilities = $responsibilityData;
                } else {
                // If string → convert to array
                $responsibilities = json_decode($responsibilityData, true) ?? [];
                }
                @endphp

                <td style="text-transform: capitalize; text-align: left;">
                    {{ implode(', ', $responsibilities) }}
                </td>


            </tr>
            <tr>
                <th>15</th>
                <th>Joining Date:-</th>
                <td>{{ $offer->joining_date ? \Carbon\Carbon::parse($offer->joining_date)->format('d-m-Y') : '' }}</td>
            </tr>
            <tr>
                <th>16</th>
                <th>Job Location:-</th>
                <td>{{$offer->job_location}}</td>
            </tr>
            <tr>
                <th>17</th>
                <th>Working Hours for Site</th>
                <td style="text-transform: capitalize;">{{$offer->working_hour}}</td>
            </tr>
            <tr>
                <th>18</th>
                <th>Salary -</th>
                <td>{{$offer->salary}}</td>
            </tr>
            <tr>
                <th>19</th>
                <th>Payment Duration</th>
                <td>{{$offer->payment_duration}}</td>
            </tr>
        </table>
    </div>

    <!-- PAGE 2 -->
    <div class="page">
        <div class="header">
            @if($company && $company->c_logo)
            <img src="{{ asset('storage/'.$company->c_logo) }}"
                alt="Company Logo"
                style="width:120px; height:auto;">
            @else
            <img src="https://via.placeholder.com/120x60?text=No+Logo"
                alt="No Logo">
            @endif
        </div>

        <div class="title">Allowances</div>

        <table class="small-table">
            <tr>
                <th>*</th>
                <th>Other Facilities</th>
                <td>{{$offer->job_location}}</td>
            </tr>
            @if($offer->travelling==0)
            <tr>
                <th>20</th>
                <th>Travelling</th>
                <td>Employee</td>
            </tr>
            @else
            <tr>
                <th>20</th>
                <th>Travelling</th>
                <td>Employeer</td>
            </tr>
            @endif

            @if($offer->lunch==0)
            <tr>
                <th>21</th>
                <th>Lunch</th>
                <td>Employee</td>
            </tr>
            @else
            <tr>
                <th>21</th>
                <th>Lunch</th>
                <td>Employeer</td>
            </tr>
            @endif

            @if($offer->tiffin==0)
            <tr>
                <th>22</th>
                <th>Tiffin</th>
                <td>Employee</td>
            </tr>
            @else
            <tr>
                <th>22</th>
                <th>Tiffin</th>
                <td>Employeer</td>
            </tr>
            @endif

            @if($offer->dinner==0)
            <tr>
                <th>23</th>
                <th>Dinner</th>
                <td>Employee</td>
            </tr>
            @else
            <tr>
                <th>23</th>
                <th>Dinner</th>
                <td>Employeer</td>
            </tr>
            @endif

            @if($offer->lodging==0)
            <tr>
                <th>24</th>
                <th>Lodging</th>
                <td>Employee</td>
            </tr>
            @else
            <tr>
                <th>24</th>
                <th>Lodging</th>
                <td>Employeer</td>
            </tr>
            @endif

            <tr>
                <th>25</th>
                <th>Attendance- Present in institute</th>
                <td>Register Book</td>
            </tr>
            <tr>
                <th>26</th>
                <th>Notice periods closed</th>
                <td>30 Days</td>
            </tr>
        </table>

        <div class="footer-section">
            <div class="signature-block">
                <div class="signature-line">
                    Your Sincerely,<br>
                    Managing Director
                </div>
                <div style="margin-top: 40px; font-weight: bold;">
                    Sekh Arif Hossain<br>
                    {{$offer->appointed_at}}
                </div>
            </div>

            <div class="signature-block">
                <div class="signature-line">
                    Your Sincerely,<br>
                    Admin
                </div>
                <div style="margin-top: 40px; font-weight: bold;">
                    Lipika Paul Samanta<br>
                    {{$offer->appointed_at}}
                </div>
                <div class="acceptance-box" style="margin-top: 30px;">
                    Acceptance
                </div>
            </div>
        </div>
    </div>

    <!-- PAGE 3 -->
    <div class="page">
        <div class="header">
            @if($company && $company->c_logo)
            <img src="{{ asset('storage/'.$company->c_logo) }}"
                alt="Company Logo"
                style="width:120px; height:auto;">
            @else
            <img src="https://via.placeholder.com/120x60?text=No+Logo"
                alt="No Logo">
            @endif
        </div>

        <div class="leave-policy">
            <h2>Leave Policy</h2>

            <p>This Leave Policy forms an integral part of the Appointment Letter and outlines the types of leave employees are entitled to during their tenure with the Company.</p>

            <h3>a. Casual Leave (CL)</h3>
            <ul>
                <li>Employees are entitled to <strong>8 days</strong> of Casual Leave per calendar year.</li>
                <li><strong>Casual Leave</strong> must be availed with prior approval unless in case of emergencies.</li>
                <li>Unused Casual Leave will not be carried forward to the next year.</li>
            </ul>

            <h3>b. Sick Leave (SL)</h3>
            <ul>
                <li>Employees are entitled to <strong>8 days</strong> of Sick Leave per calendar year.</li>
                <li>A medical certificate may be required for absences longer than two consecutive days.</li>
            </ul>

            <h3>c. National/Public Holidays:</h3>
            <p>List or refer to national holidays observed.</p>

            <h3>Leave Formalities:</h3>
            <p>In case of extra leave other than the paid leaves you have to submit a form 7 days ago which is available in our office.</p>

            <p style="margin-top: 15px;"><strong>*If you take extra leave other than the paid leaves certain amount will be deducted from the salary.</strong></p>
        </div>
    </div>

    <!-- print btn -->
    <button id="printBtn" class="print-button">Print</button>


    <script>
        document.getElementById('printBtn').addEventListener('click', function() {
            const btn = document.getElementById('printBtn');

            // Hide before printing
            btn.style.display = 'none';

            window.print();

            // Show again after printing is done
            setTimeout(() => {
                btn.style.display = 'block';
            }, 1000);
        });
    </script>




</body>

</html>