<x-mail::message>
# Please activate your account

<x-mail::panel>
    For activate your account 
</x-mail::panel>

<x-mail::button :url="$url">
Click here
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}

</x-mail::message>