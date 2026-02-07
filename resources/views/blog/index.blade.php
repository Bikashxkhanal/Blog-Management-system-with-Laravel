<x-app-layout>
  @if ($user->role !== 'admin')
    <x-dashboard.admin-dash ></x-dashboard.admin-dash>
  @else 
  <x-dashboard.user-dash ></x-dashboard.user-dash>
  @endif
 


</x-app-layout>