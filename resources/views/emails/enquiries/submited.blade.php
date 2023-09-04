@component('mail::message')
# Hello,

New Inquiry has submited!


# Traveler Infomartion
<strong>Name :</strong> {{$enquiry->full_name}} <br>
<strong>Email :</strong> {{$enquiry->email}} <br>
<strong>Country Code :</strong> {{$enquiry->country_code}} <br>
<strong>Phone :</strong> {{$enquiry->phone_number}} <br>


# Tour Details
@if($enquiry->tour_package)
<strong>Tour Package :</strong> {{$enquiry->tour_package['title']}} <br>
@endif
<strong>No. Of Adults :</strong> {{$enquiry->number_of_adult}} <br>
<strong>No. Of Children :</strong> {{$enquiry->number_of_children}} <br>
<strong>Budget Per Person :</strong> {{$enquiry->budget_per_person}} <br>
<strong>Travel Date :</strong> {{$enquiry->travel_date}} <br>
<strong>Travel Duration :</strong> {{$enquiry->travel_duration}} <br>
<strong>Accommodation :</strong> {{$enquiry->accommodation_category}} <br> <br>
<strong>Message :</strong> {{$enquiry->message}} <br>




Thanks,<br>
{{ config('app.name') }}
@endcomponent
