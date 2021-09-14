@component('mail::message')
# Thanks for sharing your palette idea, {{ $username }}.
<br>
<br>

Your {{ $palette_title }} palette idea has been shared to our community!<br>
Thousands of people in our community will see your palette idea.

@component('mail::button', ['url' => route('palette-community')])
View Your Shared Palette
@endcomponent

Many Thanks,<br>
Chen Frederick, Creator of FD Palette Community
@endcomponent
