<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <title>
        Error-419
    </title>

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/error-404s/error-404-1/assets/css/error-404-1.css">
</head>

<body>
<section class="py-3 py-md-5 min-vh-100 d-flex justify-content-center align-items-center">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="text-center">
          <h2 class="d-flex justify-content-center align-items-center gap-2 mb-4">
           <img src="">
          </h2>
          <h3 class="h2 mb-2">Oops! You're lost.</h3>
          <p class="mb-5">Your session has expired. Please click the button below.</p>
          <a class="btn bsb-btn-5xl btn-success rounded-pill px-5 fs-6 m-0" href="{{ route('error-handler-route') }}" role="button">Back to Home</a>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>