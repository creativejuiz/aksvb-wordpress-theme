
            $("form#contactForm").submit(function( event ) {
                event.preventDefault();
            
                var name = $("#contact_name").val();
                var email = $("#contact_email").val();
                var message = $("#contact_message").val();

                // Envoi de la requête HTTP en mode asynchrone
                $.ajax({
                    url: '/workspace/contact.php',
                    type: "POST",
                    data: {name: name, email: email, message: message}, 
                    success: function(html) { // Je récupère la réponse du fichier PHP
                        if (html=="success") { $(".alert-success").show(); }
                        else { $(".alert-error").show(); }
                        
                        /*alert(html);*/
                    }
                });
            });


