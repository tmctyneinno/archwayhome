<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NoReferralEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $companyName;
    public $referralLink;
    public $referralDetails;
    public $userId;
    public $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($companyName, $referralDetails, $referralLink, $userId, $password)
    {
        $this->companyName = $companyName;
        $this->referralDetails = $referralDetails;
        $this->referralLink = $referralLink;
        $this->userId = $userId; 
        $this->password = $password; 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Archway Homes and Investment Limited. Successful Registration '.$this->userId)
                    ->markdown('emails.noreferral')
                    ->with([
                        'getReferral',
                        'referralDetails' => $this->referralDetails,
                        'referralLink' => $this->referralLink,
                        'userId' => $this->userId, 
                        'password' => $this->password,
                    ]);
    }
}
