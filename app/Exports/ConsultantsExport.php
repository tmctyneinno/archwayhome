<?php

namespace App\Exports;
use Carbon;
use App\Models\Consultant;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ConsultantsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Consultant::select('*')->withCount(['referralsMade as total_referrals_made', 'referralsReceived as total_referrals_received'])
            ->get()
            ->map(function ($consultant) {
                return [
                    'fullname' => $consultant->fullname,
                    'phone' => $consultant->phone,
                    'email' => $consultant->email,
                    'date_of_birth' => \Carbon\Carbon::parse($consultant->date_of_birth)->format('d F Y') ,
                    'total_referrals_made' => $consultant->total_referrals_made ?? 0,
                    'total_referrals_received' => $consultant->total_referrals_received ?? 0,
                    'created_at' => $consultant->created_at->format('d F Y'),
                ];
            });
    }

    public function headings(): array
    {
        return [
            'Full Name',
            'Phone',
            'Email',
            'Date of Birth',
            'Total Referrals Made',
            'Total Referrals Received',
            'Created At',
        ];
    }
}
