@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
	<title>Todos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    @livewireStyles
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <x-alert />
                @yield('content1')
            </div>
        </div>
    </div>
</div>
    @livewireScripts
</body>
</html>
@endsection