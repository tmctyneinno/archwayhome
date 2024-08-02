@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'ArchwayHomes')
<img src="{{ asset($contactUs->site_logo) }}" class="logo" alt="ArchwayHomes"> 
@else
{{ $slot }} 
@endif
</a>
</td>
</tr>
