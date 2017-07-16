<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Display the content of the received XML file and create entry.">
    <meta name="author" content="Dario">
    {{--<link rel="icon" href="../../favicon.ico">--}}
    <title>XML to Database | EON</title>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div hidden id="output" class="alert alert-dismissible alert-success"></div>
    </div>

    <div style="margin-top:50px" class="navbar-fixed-top col-md-8 col-md-offset-2">

        <h1>
            Output of {{ $xmlFileName }} <br />
        </h1>

        @foreach($xmlOutput as $k => $v)
            @if ($k === 'Title')
                <div id="title" data-title-id="{{ $v }}"></div>
            @endif
            @if ($k === 'Description')
                <div id="description" data-description-id="{{ $v }}"></div>
            @endif
            @if ($k === 'Launch Url')
                <div id="launch-url" data-launch-url-id="{{ $v }}"></div>
            @endif
            @if ($k === 'Icon Url')
                <div id="icon-url" data-icon-url-id="{{ $v }}"></div>
            @endif
            <strong>{{ $k }}</strong>: {{$v}} <br />
        @endforeach

        <br />
        <button id="send-xml-output" class="btn btn-default">Create entry</button>
    </div>
</div>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
        crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
      integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
      crossorigin="anonymous">

<script>
    var title = $('#title').data("title-id");
    var description = $('#description').data("description-id");
    var launchUrl = $('#launch-url').data("launch-url-id");
    var iconUrl = $('#icon-url').data("icon-url-id");
    var URL = '{{ env('APP_URL') }}';
</script>
<script src="{{ asset('js/xml-output-create.js') }}"></script>

</body>