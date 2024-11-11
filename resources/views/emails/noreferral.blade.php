@component('mail::message')

Dear **{{ $referralDetails->fullname }}**,

Congratulations! Your registration as a consultant with Archway Homes and Investment Limited was successful.

Here are your login details:
- **Website**: [ArchwayHomes](https://archwayhomes.com.ng)
- **Consultant ID / Username**: {{ $userId }}
{{-- - **Password**: {{ $password }} --}}
- **Your Upline's name is**: ARCHWAY HOMES AND INVESTMENT LIMITED 
- **Upline's Mobile number**: {{ $referralDetails->phone }}
- **Your consultant's invitation link**: ({{ $referralLink }})

Kindly log in to the portal to explore more details about our available products.
<br>
You can register new consultants into your team by sharing your online registration form through the invitation URL:
({{ $referralLink }})

You can join our WhatsApp group using [this link](https://chat.whatsapp.com/ERpxDDCqq9yJ7jI06lhfJg).

For client registration, please use the following link:
(https://archwayhomes.com.ng/consultant-form?cid={{ $userId }})

Connect with us on social media for updates and news:

- Instagram: [Archway Homes Investment](https://www.instagram.com/archwayhomes_and_investment?igsh=dGhnb2NiMGxqd3Zz)
- Facebook: [Archway Homes](https://www.facebook.com/archome)
- Twitter: [Archway Homes](https://twitter.com/archwayhomes)
- LinkedIn: [Archway Homes](https://www.linkedin.com/company/archwayhomes)

We look forward to building wonderful experiences together.

For complaints, comments, and suggestions, please email us at [info@archwayhomes.com](mailto:info@archwayhomes.com).

Best regards,  
{{ $companyName }} Team
@endcomponent
