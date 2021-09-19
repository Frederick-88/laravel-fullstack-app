@component('mail::message')
# Welcome to our community, {{ $username }}.
<br>
<br>

We are really grateful to have you join in our community along with thousands of people across the world. Please feel
free
to share your palette idea in our community so together we can have a better ideas & insights about color taste in our
creative life!

@component('mail::button', ['url' => route('palette-community')])
Visit Palettes Shared by People in Our Community!
@endcomponent

Many Thanks,<br>
Chen Frederick, Creator of FD Palette Community
@endcomponent
