<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Mukta+Malar:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style type="text/css">
      body{
        font-family: 'Mukta Malar', sans-serif;
        font-size: 12px;
      }
      p {
          margin-top: 0;
          margin-bottom: 0rem;
      }
    </style>
  </head>
  <body>
    <br><br>

    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="card bg-light text-black" style="height: 638px; width: 1016px;">
        <img src="images/front.jpg" class="card-img" alt="...">
        <div class="card-img-overlay">
          <br><br><br><br><br><br><br><br><br><br>
          <div class="row" style="padding-left: 20px;">
            <div class="col-md-9">
              <h2 class="card-title">பெயர்: <span style="font-weight: bold;">{{ $results->name }}</span></h2>
              <h2 class="card-title">பொறுப்பு: <span style="font-weight: bold;">{{ $results->selected_post }}</span></h2>
              <h2 class="card-title">மாவட்டம்: <span style="font-weight: bold;">{{ $results->district }}</span></h2>
              <h2 class="card-title">பிறந்த தேதி: <span style="font-weight: bold;">{{ date("d/m/Y", strtotime($results->dob)) }}</span></h2>
              <h2 class="card-title">அடையாள அட்டை எண்: <span style="font-weight: bold;">VCK{{ $results->id }}</span></h2>
            </div>
            <div class="col-md-2">
              <img style="padding-left: 45px; padding-top: 40px; max-width: 350px; max-height: 200px;" src="https://drive.google.com/uc?export=view&id={{ $results->photo_1 }}">
            </div>
          </div>
          <div class="row" style="padding-left: 420px;">
            <div class="col-md-6">
              {!! QrCode::generate(URL::current()) !!}
            </div>
          </div>
        </div>
      </div>
        </div>
      </div>
      <br><br>
      <div class="row">
        <div class="col-md-4">
          <div class="card bg-light text-black" style="height: 638px; width: 1016px;">
        <img src="images/back.jpg" class="card-img" alt="...">
        <div class="card-img-overlay">
          <br><br><br><br><br><br><br><br><br><br><br>

          <div class="row" style="padding-left: 20px;">
            <div class="col-md-9">
              <h2 class="card-title">தந்தை பெயர்: <span style="font-weight: bold;">{{ $results->father_name }}</span></h2>
              <h2 class="card-title">முகவரி: <span style="font-weight: bold;">{{ $results->permanent_address }}</span></h2>
              <!-- <h2 class="card-title">மாவட்டம்: <span style="font-weight: bold;">{{ $results->district }}</span></h2> -->
              <h2 class="card-title">கைபேசி எண்: <span style="font-weight: bold;">{{ $results->mobile_number }}</span></h2>
            </div>
            <div class="col-md-2">
              {!! QrCode::size(200)->generate(URL::current()) !!}
            </div>
          </div>
          <div class="row" style="padding-left: 420px;">
            <div class="col-md-6">
              
            </div>
          </div>
        </div>
      </div>
        </div>
      </div>
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>