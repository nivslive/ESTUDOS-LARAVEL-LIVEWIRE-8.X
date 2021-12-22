
@component('mail::message')
# Hello {{$teacher->first_name}},
<br>
{{$student->full_name}} added you as teacher.

@component('mail::button', [
    'url' => url('/confirm/' . $teacher->hash_id . '/' . $student->hash_id)
])
Accept
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent