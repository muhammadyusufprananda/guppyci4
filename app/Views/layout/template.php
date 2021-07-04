<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Meta -->
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Link berkas css dan fon -->
  <!-- preconnect google font -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <!-- fon sen -->
  <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400;700;800&display=swap" rel="stylesheet" />
  <!-- bootstrap 5 -->
  <link rel="stylesheet" href="/css/bootstrap.min.css" />
  <!-- bootstrap icons -->
  <link rel="stylesheet" href="/css/bootstrap-icons-1.4.1/bootstrap-icons.css" />
  <!-- self styling -->
  <link rel="stylesheet" href="/css/style.css" />
  <!-- Judul Website -->
  <title><?= $title ?> | Amanullah Guppy Farm</title>
</head>

<body>
  <!-- Bagian top-bar -->
  <?= $this->include('layout/top_bar') ?>
  <!-- Bagian nav-bar -->
  <?= $this->include('layout/nav_bar') ?>
  <!-- Bagian konten -->
  <?= $this->renderSection('content') ?>
  <!-- Bagian bottom widget -->
  <?= $this->include('layout/bottom_widget') ?>
  <!-- Bagian footer -->
  <?= $this->include('layout/copyright') ?>
  <!-- Berkas skrip js -->
  <!-- bootstrap 5 -->
  <script src="/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      $('#namaIkan').keyup(function() {
        var input = this.value;
        input = input.toLowerCase();
        input = input.replace(/ /g,'-');
        input = input.replace(/[^\w-]+/g,'');
        $('#slugIkan').val(input);
      });
    })
  </script>
</body>

</html>