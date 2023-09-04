<?php

namespace App\Http\Livewire;

use App\Mail\EnquirySubmited;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Statamic\Eloquent\Entries\Entry;

class ContactForm extends Component
{

    public $full_name;
    public $email;
    public $country_code;
    public $phone_number;
    public $message;



    public function submit()
    {
        $enquiry = Entry::make()
            ->collection('inquiries')
            ->slug('inquiry-new')
            ->data([
                'title' => 'Inquiry Submition',
                'full_name' => $this->full_name,
                'email' => $this->email,
                'country_code' => $this->country_code,
                'phone' => $this->phone_number,
                'message' => $this->message,
            ]);

        
        // dd($enquiry);    
        $enquiry->save();
        // Mail::to('info@ozonlighttours.com')->send(new EnquirySubmited($enquiry));
        return redirect('/thank-you');
    }



    public function render()
    {
        return view('livewire.contact-form');
    }
}
