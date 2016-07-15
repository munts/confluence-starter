<!-- ============ Food & Drink START ============ -->

<section id="restaurant" class="row home-section">
    <div class="col-sm-7 col-md-6 col-lg-5 text">
        <div class="padding">
            <?php
            echo '<h5>'. $extra_intro. '</h5>';
            echo '<h1>'. $extra_title. '</h1>';
            echo '<p>'. $extra_copy. '</p>';
            ?>
        </div></div>
    <div class="col-sm-5 col-md-6 col-lg-7"><?php //echo do_shortcode('[mappress mapid="1" width="100%" height="520" adaptive="true"]'); ?>
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
</section>

<!-- ============ Food & Drink END ============ -->

<!-- ============ Activities START ============ -->

<section id="spa" class="row color2 home-section">
    <div class="col-sm-5 col-md-6 col-lg-7 photo"></div>
    <div class="col-sm-7 col-md-6 col-lg-5 text">
        <div class="padding">
            <h5>Check out all the</h5>
            <h1>Activities</h1>
            <p>In euismod vestibulum libero vel auctor. Cras fermentum neque ut ante porta, in bibendum lorem elementum. Morbi volutpat lacus dui, vel faucibus velit dignissim at. Integer malesuada diam urna, sed bibendum magna sollicitudin ac. Donec aliquet dui id congue interdum. Nunc aliquam dui lectus, a imperdiet ex convallis sit amet. In fringilla, sem nec sagittis dapibus, est nibh tincidunt tortor, vel vestibulum est velit vel mi.<br><a href="spa.html">Read more...</a></p>
        </div></div>
</section>

<!-- ============ Activities END ============ -->