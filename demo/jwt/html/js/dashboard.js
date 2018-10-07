            
    function getCookie(name)
    {
      var re = new RegExp(name + "=([^;]+)");
      var value = re.exec(document.cookie);
      return (value != null) ? unescape(value[1]) : null;
    }
    
    if(!getCookie("tokenVal")) window.location = "index.html";

    $('#us3').locationpicker({
            location: {
                latitude: 12.9768789,
                longitude: 77.57232820000002
            },
            radius: null,
            inputBinding: {
                locationNameInput: $('#us3-address')
            },
            enableAutocomplete: true,
            enableReverseGeocode: true,
            onchanged: function (currentLocation, radius, isMarkerDropped) {

                var addressComponents = $(this).locationpicker('map').location.addressComponents;
                var output = {
                        search: $('#us3-address').val(),
                        city: addressComponents.city,
                        country: addressComponents.country,
                        state: addressComponents.stateOrProvince,
                        zip:addressComponents.postalCode,
                        address:addressComponents.addressLine1 +', '+ addressComponents.addressLine2,
                        latitude:currentLocation.latitude,
                        longitude:currentLocation.longitude
                };
                $('#output').val(  JSON.stringify(output) );
            }

        });


    $.ajax({
        type:'post',
        data:{'token': getCookie("tokenVal") } ,
        url:"../api/retoken.php",
        dataType : 'json',
        success:function(data) {

            if(data && data.token) {

                document.cookie="tokenVal="+ data.token;
                $("#username").html("Hi "+ data.info.name );
                //############
                var dataTable = $('#saved_locations-grid').DataTable( {
                                    "processing": true,
                                    "serverSide": true,
                                    "ajax":{
                                        url :"../api/locations-grid-data.php", // json datasource
                                        type: "post",  // method  , by default get
                                        error: function(){  // error handling
                                            $("#saved_locations-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                                        }
                                    }
                                });



                  $("#save").click( function() {

                            if( $('#us3-address').val().length > 0 ) {

                                if( $('#output').val().length == "" ) $('#us3-address').focus();

                                $.ajax({
                                        url:"../api/save_location.php",
                                        type:"POST",
                                        data: JSON.parse( $('#output').val() ) ,
                                        cache:false,
                                        async:false,
                                        success:function(data) {
                                            dataTable.ajax.reload();
                                            alert("Successfully Added to Record!!!!");                                
                                        }
                                });
                            } else {
                                alert("please Select the Location ???");
                            }
                    });

                //#############
            } else {
                window.location = "index.html";
            }
        }
    });

    $("#logout").click(function(e){
        e.preventDefault();
        document.cookie="tokenVal=";
        window.location = "index.html";
    });