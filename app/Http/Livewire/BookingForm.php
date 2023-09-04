<?php

namespace App\Http\Livewire;

use App\Mail\EnquirySubmited;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Statamic\Eloquent\Entries\Entry;

class BookingForm extends Component
{

    public $tour_id;
    public $tour_title;

    public $full_name;
    public $email;
    public $country_code;
    public $phone_number;
    public $message;
    public $number_of_adult;
    public $budget_per_person;
    public $number_of_children;
    public $travel_date;
    public $travel_duration;
    public $accommodation_category;


    public function mount($id)
    {
        $tour = Entry::query()
        ->where('collection', 'packages')
        ->where('id', $id)
        ->first();

        $this->tour_id = $tour->id;
        $this->tour_title = $tour->title;
    }


    public function submit()
    {
        $enquiry = Entry::make()
            ->collection('inquiries')
            ->slug('inquiry-order')
            ->data([
                'title' => 'Inquiry From'.' '.$this->full_name,
                'tour' => $this->tour_id,
                'full_name' => $this->full_name,
                'email' => $this->email,
                'country_code' => $this->country_code,
                'phone' => $this->phone_number,
                'message' => $this->message,
                'number_of_adult' => $this->number_of_adult,
                'number_of_children' => $this->number_of_children,
                'budget_per_person' => $this->budget_per_person,
                'travel_date' => $this->travel_date,
                'travel_duration' => $this->travel_duration,
                'accommodation_category' => $this->accommodation_category,
            ]);

        
        // dd($enquiry);    
        $enquiry->save();
        // Mail::to('info@ozonlighttours.com')->send(new EnquirySubmited($enquiry));
        return redirect('/thank-you');
    }





    public function render()
    {
        return view('livewire.booking-form');
    }
}
