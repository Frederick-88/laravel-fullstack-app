<?php
$current_route = Route::currentRouteName();
$alert_type = request()->get('res_type');
$alert_response = request()->get('response');
$alert_type_class = 'text-yellow-700 bg-yellow-100 border-yellow-500';

if($alert_type === 'success') {
    $alert_type_class = 'text-green-700 bg-green-100 border-green-500';
} else if ($alert_type === 'error') {
    $alert_type_class = 'text-red-700 bg-red-100 border-red-500';
}
?>

@if(!!$alert_response)
<div class="global-alert__container">
    <div class="global-alert border-l-4 p-4 {{ $alert_type_class }}" role="alert">
        <p class="title">{{ $alert_type }}</p>
        <p>{{ $alert_response }}</p>

        <a href="{{ route($current_route) }}" class="close-icon fas fa-times"></a>
    </div>
</div>
@endif
