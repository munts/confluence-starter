<?php
/* Template Name: Map Page */
 
get_header(); 

?>

<!-- ============ CONTENT START ============ -->

		<section id="map-content">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-center">
						<h5>Find Us In</h5>
						<h1>Minturn, CO</h1>
						<?php while ( have_posts() ) : the_post(); ?>
            <?php the_content() ?>
            <?php endwhile; // end of the loop. ?><hr>
					</div>
				</div>
      </div>
    </section>
<!-- ============ MAP START ============ -->

		<section id="map">
      <div class="container-fluid">
        <div class="row">
          <!-- Google Map Script -->
          <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
          <script type="text/javascript">

            function initialize()
            {
              //-----------------------------------------------------------------------
              // Create an array of styles.

              var styles = [
                {
                "stylers": [
                  { "saturation": -100 },
                  { "gamma": 1 }
                ]
                },{
                  "featureType": "water",
                  "stylers": [
                    { "lightness": -12 }
                  ]
                }
              ];

              //-----------------------------------------------------------------------
              // Create a new StyledMapType object, passing it the array of styles,
              // as well as the name to be displayed on the map type control.

              var styledMap = new google.maps.StyledMapType(styles, {
                name: "Styled Map"
              });

              //-----------------------------------------------------------------------
              // Set up map pin position

              var latlng = new google.maps.LatLng(39.5863749, -106.4308631);

              //-----------------------------------------------------------------------
              // Set up map options

              var myOptions =
              {
                scrollwheel: false,
                zoom: 13,
                center: latlng,
                mapTypeControlOptions: {
                  mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
                }
              };

              //-----------------------------------------------------------------------
              // Set up map ID's

              var map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);

              //-----------------------------------------------------------------------
              // Associate the styled map with the MapTypeId and set it to display.

              map.mapTypes.set('map_style', styledMap);
              map.setMapTypeId('map_style');

              //-----------------------------------------------------------------------
              // Setup up map pin image

              var image = {
                // Path to your map pin image
                url: 'http://knssandbox.com/bunkhouse/wp-content/themes/bunkhouse/images/map-marker.png',
                // This marker is 40 pixels wide by 42 pixels tall.
                size: new google.maps.Size(40, 42),
                // The origin for this image is 0,0.
                origin: new google.maps.Point(0,0),
                // The anchor for this image is the base of the pin at 20,42.
                anchor: new google.maps.Point(20, 42)
              };

              //-----------------------------------------------------------------------
              // Add marker

              var myMarker = new google.maps.Marker({
                position: latlng,
                map: map,
                icon: image,
                clickable: true,
                title:"The Bunkhouse"
              });

              myMarker.info = new google.maps.InfoWindow({
                content: "The Bunkhouse, 970.xxx.xxxx email@bunkhouse.com, etc"
              });

              google.maps.event.addListener(myMarker, 'click', function() {
                myMarker.info.open(map, myMarker);
              });
            }

            google.maps.event.addDomListener(window, 'load', initialize);
          </script>

          <div id="map-canvas"></div>
        </div>
      </div>
		</section>
        
		<!-- ============ MAP END ============ -->
        <?php get_footer(); ?>