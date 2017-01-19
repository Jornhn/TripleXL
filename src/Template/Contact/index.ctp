<div class="offset"></div>
<div class="container">
    <div class="col-md-12 default-container">
    <div class="row">
        <div class="col-md-6 ">
            
            <h1>Contact</h1><br>
            
            <dl class="dl-horizontal">
                
                
                <dt>Naam:</dt>
                <dd>TripleXL BV</dd>
                <br>
                <dt>Telefoonnummer:</dt>
                <dd>0900 - 00000000</dd>
                <br>
                <dt>Email:</dt>
                <dd><a href="mailto:info@triplexl.nl">info@triplexl.nl</a></dd>
                <br>
                <dt>KvK nummer:</dt>
                <dd>39.00.01.33</dd>
                <dt>BTW-nummer:</dt>
                <dd>NL8909.334.421.B01</dd>
                <br>
                <dt>Adres:</dt>
                <dd>Mozartlaan 15</dd>
                <dd>8031 AA Zwolle</dd>
            </dl>
            
                <div id="map"></div>
        </div>
        
        
        
        <div class="col-md-6">
            
            <h1>Over TripleXL</h1>   
        
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui.</p>

            <p>Heeft u nog vragen? al onze gegevens zijn te vinden onder het kopje "contact"<br><br>

            Fijne dag. <br><br>

            Arjan Vos <br>
            TripleXL</p>           
        </div>
    </div>
    </div>
</div>

<script>
      function initMap() {
        var uluru = {lat: 52.521471, lng: 6.083935};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAa1y0FaBUPPNJFaog5kQ_QtRd6cAOl4CA&callback=initMap"></script>