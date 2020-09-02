 //symptoms AI part



    $(document).ready(function() {
        $('#btnsubmit').click(function (){
        var surname = $('input[name = "surname"]').val();
        var othername = $('input[name = "othername"]').val();
        var state = $('input[name = "state"]').val();
        var city = $('input[name = "city"]').val();
        var address = $('input[name = "address"]').val();
        var phone = $('input[name = "phone"]').val();
        var nin = $('input[name = "nin"]').val();
        var email = $('input[name = "email"]').val();
        var dob = document.getElementById("dob").value;
        var gender = $('input[name = "gender"]:checked').val();
         var cough = $('input[name = "coption"]:checked').val();
         var nasal = $('input[name = "ncoption"]:checked').val();
         var fever = $('input[name = "foption"]:checked').val();
         var shortbreath = $('input[name = "sbreath"]:checked').val();
         var difficultbreath = $('input[name = "dbreath"]:checked').val();
         var feeltired = $('input[name = "frest"]:checked').val();
         var drugoption= $('input[name = "doption"]:checked').val();
         var visitoption = $('input[name = "voption"]:checked').val();
         var placevisit = $('input[name = "pvisit"]').val();
         var sickduration = $('input[name = "sduration"]').val();
         
         
         
 

    console.log("Coughing : ", cough);
    console.log("Nasal Congestion : ", nasal);
    console.log("Fever : ", fever);
    console.log("Shortage of Breath : ", shortbreath);
    console.log("Difficulty in Brearhing : ", difficultbreath);
            var coughval;
             var nasalval;
             var feverval;
             var shortbreathval;
             var difficultbreathval;
             
            
            if (cough == 'yes') {
                 coughval = 1;
                console.log(coughval);
               
                
            }
            else{
                coughval = 0;
                console.log(coughval);
            }

            if (nasal == 'yes') {
                  nasalval = 1;
                 console.log(nasalval);
            } 
            else{
                  nasalval = 0;
                 console.log(nasalval);
            }

            if (fever == 'yes') {
                  feverval = 1;
                 console.log(feverval);
                  val1 = feverval;
            }
            else{
                  feverval = 0;
                 console.log(feverval);
            }

            if (shortbreath == 'yes') {
                  shortbreathval = 1;
                 console.log(shortbreathval);
            } 
            else{
                  shortbreathval = 0;
                 console.log(shortbreathval);
            }

            if (difficultbreath == 'yes') {
                  difficultbreathval = 1;
                 console.log(difficultbreathval);
            }
            else{
                  difficultbreathval = 0;
                 console.log(difficultbreathval);
            }
            
            var phpcoughval = coughval;
             var phpnasalval = nasalval;
              var phpfeverval = feverval;
             var phpshortbreathval = shortbreathval;
              var phpdifficultbreathval = difficultbreathval;
                
                $.ajax({
                    type: "POST",
                    url: 'symptoms.php',
                    data : {
                        phpcoughval : phpcoughval,
                        phpnasalval : phpnasalval,
                        phpfeverval : phpfeverval,
                        phpshortbreathval : phpshortbreathval,
                        phpdifficultbreathval : phpdifficultbreathval
                    },
                    success: function(data)
                    {
                        
                        console.log(data);
                    }
                });
                
                $.ajax({
                    type: "POST",
                    url: 'biodata.php',
                    dat: {
                        surname : surname,
                        othername : othername,
                        state : state,
                        city : city,
                        address : address,
                        phone : phone,
                        email : email,
                        dob : dob,
                        gender : gender,
                        cough : cough,
                        nasal : nasal,
                        fever : fever,
                        shortbreath : shortbreath,
                        difficultbreath : difficultbreath,
                        feeltired : feeltired,
                        drugoption : drugoption,
                        visitoption : visitoption,
                        placevisit : placevisit,
                        sickduration : sickduration
                    },
                    success: function(dat)
                    {
                       
                        console.log(dat);
                    }
                });
            });
        });