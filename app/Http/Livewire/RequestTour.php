<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Statamic\Eloquent\Entries\Entry;

class RequestTour extends Component
{

    public $tour_id;
    public $name;
    public $phone;
    public $email;

    public function mount($id)
    {
        $tour = Entry::query()
            ->where('collection', 'packages')
            ->where('id', $id)
            ->first();    
    }


    public function save()
    {
         $enquiry = Entry::make()
            ->collection('inquiries')
            ->slug('inquiry-1')
            ->data([
                'title' => 'New Inquiry',
                'tour' => $this->tour_id,
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
            ]);

            $enquiry->save(); 
    }

    public function render()
    {
        return view('livewire.request-tour');
    }
}
