<p>Dear {{ $inspectionDetails['fullname'] }},</p>

<p>Thank you for booking an inspection for the project "{{ $inspectionDetails['project'] }}".</p>

<p><strong>Details of your booking:</strong></p>
<ul>
    <li><strong>Full Name:</strong> {{ $inspectionDetails['fullname'] }}</li>
    <li><strong>Email:</strong> {{ $inspectionDetails['email'] }}</li>
    <li><strong>Phone:</strong> {{ $inspectionDetails['phone'] }}</li>
    <li><strong>Project:</strong> {{ $inspectionDetails['project'] }}</li>
    <li><strong>Inspection Date:</strong> {{ $inspectionDetails['inspectionDate'] }}</li>
</ul>

<p>We look forward to assisting you on the scheduled date.</p>
