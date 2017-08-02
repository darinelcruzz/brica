<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $enterprise }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.5.0/css/bulma.min.css">
    <style>
        .radio_item {
            display: none !important;
        }

        .label_item {
            opacity: 0.2;
        }

        .radio_item:checked + label {
            opacity: 1;
        }
    </style>
  </head>
  <body>
      <section class="section">
        <div class="container">
          @yield('main-content')
        </div>
      </section>
  </body>
</html>
