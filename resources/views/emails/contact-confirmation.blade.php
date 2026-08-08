<x-mail::message>
# Thank You for Reaching Out, {{ $contact->name }}!

We have received your message regarding **"{{ $contact->subject }}"**. Our team is reviewing your inquiry and will get back to you as soon as possible.

### Summary of your message:

<x-mail::panel>
**Submitted On:** {{ $contact->created_at->format('F j, Y, g:i a') }}  
**Message:**  
{{ $contact->message }}
</x-mail::panel>

If you have any urgent updates to add to this request, simply reply directly to this email.

Best regards,  
**{{ config('app.name') }} Team**
</x-mail::message>