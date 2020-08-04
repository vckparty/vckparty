<!DOCTYPE html>
<html>
<head>
  <title>sd</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Mukta+Malar:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
  <style type="text/css">
          body{
        font-family: 'Mukta Malar', sans-serif;
        font-size: 16px;
      }
      p {
        font-family: 'Mukta Malar', sans-serif;
        font-size: 16px;
          margin-top: 0;
          margin-bottom: 0rem;
      }
page[size="A4"] {

  background-image: url('images/PostingTemplate.jpg');
  width: 21cm;
  height: 29.7cm;
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm;
  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
  background-size: cover;
  background-repeat: no-repeat;
  background-position: 50% 50%;
}
@media print {
  body, page[size="A4"] {
    margin: 0;
    box-shadow: 0;
  }
}
  </style>
</head>
<body>
<page size="A4">
  <div class="container">
  <br><br><br><br><br><br><br><br><br><br><br><br>
    <h3 class="text-center text-bold">{{ $results->district }} மாவட்டம்</h3>
  <h3 class="text-center">மாவட்ட பொறுப்பு நியமனம்</h3>
  <p class="text-center">**************</p>
  <br>
      <p class="text-left" style="padding-left: 60px; padding-right: 60px;">{{ $results->district }} மாவட்டம், திரு. {{ $results->name }} (த/பெ. {{ $results->father_name }}) அவர்கள் {{ $results->district }} {{ $results->selected_post }} பொறுப்பிற்கு நியமிக்கப்படுகிறார்.</p>
        <br>
        <p class="text-left" style="padding-left: 60px; padding-right: 60px;">1.9.2020 முதல் மூன்றாண்டுகளுக்கு இப்பொறுப்பில் பணியாற்ற வேண்டும். கட்சியின் விதிகளுக்குட்பட்டு, கட்சியின் வளர்ச்சிக்கும், வலிமைக்கும் ஊறு ஏற்படாத வகையில் கட்சிப் பொறுப்பாளர்களுடன் இணக்கமாக இருந்து பணியாற்ற வேண்டும்.</p>
<br>
<p class="text-center">வாழ்த்துக்களுடன்...
</p>
<br><br><br><br><br><br><br>
<span style="padding-left: 100px;">{!! QrCode::size(150)->generate(URL::current()) !!}</span>
</div>

</page>
    
</body>
</html>