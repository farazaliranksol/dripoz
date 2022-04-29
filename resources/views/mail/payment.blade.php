@component('mail::message')
# Introduction

Thanks for choosing dripoz. To continue with subscription click on following link

@component('mail::button', ['url' => "https://app.dripoz.com/paynow/$content['user_id_f']"]);
Proceed
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
