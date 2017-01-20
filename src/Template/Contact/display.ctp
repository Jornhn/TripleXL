<div class="offset"></div>
<div class="container">
    <div class="col-md-12 default-container">

        <div class="row">
            <div class="col-md-6 ">

                <h1>Contact <?= $edit_button ?></h1><br>
                <?= $contact->contact_text ?>
                <div id="map"></div>

            </div>

            <div class="col-md-6">

                <h1>Over TripleXL</h1>
                <?= $contact->about_text ?>

            </div>
        </div>
    </div>
</div>

<script>
    function initMap() {
        var uluru = {lat: 52.521471, lng: 6.083935};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAa1y0FaBUPPNJFaog5kQ_QtRd6cAOl4CA&callback=initMap"></script>