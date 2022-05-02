@component('mail::message')
# Introduction

Thanks for choosing dripoz. To continue with subscription click on following link

@component('mail::button', ['url' => "https://app.dripoz.com/paynow/{{$content[0]}}/{{$content[1]}}"]);
Proceed
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
