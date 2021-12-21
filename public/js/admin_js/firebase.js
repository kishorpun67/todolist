
  // Your web app's Firebase configuration


  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  $(document).ready(function() {
    var firebaseConfig = {
        apiKey: "AIzaSyB83WiLDXA6PdXZu1JLqM1mbqf6X1DO2IA",
        authDomain: "laravel-301607.firebaseapp.com",
        projectId: "laravel-301607",
        storageBucket: "laravel-301607.appspot.com",
        messagingSenderId: "12895797980",
        appId: "1:12895797980:web:ed43bc829fc7b6c059ea19",
        measurementId: "G-3BG68QL96C"
      };
      // Initialize Firebase
      firebase.initializeApp(firebaseConfig);
      firebase.analytics();
    // $("#singnUp").on('click',function(){
    //     $("#singnUp").disabled =true;
    //     $("#singnUp").text('Registering ');

    //     email = $("#email").val();
    //     password = $("#password").val();
    //     // alert(email)
    //     firebase.auth().createUserWithEmailAndPassword(email, password).then(function(response){
    //     // alert(email)
    //         $("#singnUp").disabled =false;
    //         $("#singnUp").text('Sign Up');
    //         sendingVerifyEmail("#singnUp")

    //         console.log(response);
    //     })
    //     .catch(function(error){
    //         $("#singnUp").disabled =false;
    //         $("#singnUp").text('Sign Up');

    //         console.log(error);
    //     })

    // });

    // function sendingVerifyEmail(button){
    //         firebase.auth().currentUser.sendEmailVerification().then(function(response){
    //             console.log(response);
    //         })
    //         .catch(function(error){
    //             $("#singnUp").text('Sign Up');
    //             console.log(error);
    //         })
    //     }


        $("#singnUp").on('click',function(){
            $("#singnUp").disabled =true;
            $("#singnUp").text('Logging');

            email = $("#email").val();
            password = $("#password").val();
            // alert(email)
            firebase.auth().signInWithEmailAndPassword(email, password).then(function(response){
                $("#singnUp").text('Sign Up');
                var useObject = response.user;
                var token = useObject.za;
                var provider = "email";
                console.log(response);
                $.ajax({
                    type:'post',
                    url:'/admin',
                    data:{
                        email:email,
                        password:password,
                        token:token,
                        provider:provider,
                    },
                    success:function(response) {
                        console.log(response);

                    },error:function(){
                        alert("Error");
                    }
                });
                // SendDataToServer(email, token, provider)
            })
            .catch(function(error){
                $("#singnUp").text('Sign Up');
                console.log(error);
            });


        });

//         function SendDataToServer(token, provider, email){
//             alert(token);
//             var xhr = XMLHttpRequest();
//             xhr.addEventListener("readystatechange", function(){
//                 if(this.readyState ===4) {
//                     console.log(this.responseText);
//                     if(this.responseText=="Login Successfull" || this.responseText == "User Created");
//                     alert('Login Successfully!');
//                 }else{
//                     alert()
//                 }
//             })
//             xhr.open("POST" , "http://127.0.0.1:8000/admin?eamil="+email+"&provider="+provider+"&token="+token);
//             xhr.send();
//         }



});
