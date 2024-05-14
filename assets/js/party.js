
$('#form3').submit(function(e) {
    const mob = $('#mob').val()
    const pass = $('#pass').val()
    const cpass = $('#cpass').val()
    if (grecaptcha.getResponse() == "" || !mob || !pass || mob=='' || pass==''||cpass!=pass|| mob.length!=10 ) {
        e.preventDefault()
        validateForm(mob,pass,cpass)

    }
})

function validateForm(mob,pass,cpass){
    const mobErr = $('.mob-error')
    const passErr = $('.pass-error')
    const captachaErr = $('.captacha-error')

    if(!mob || mob==''){
        mobErr.text('Please enter your mobile number')
    }
    
    if(!pass || pass==''){
        passErr.text('Please enter your password')
    }

    console.log(pass,cpass)

    if(cpass != pass){
        passErr.text('password do not match !')
    }

    if(pass.length<6){
        passErr.text('Password must be of length 6!')
    }

    if(mob.length != 10){
        mobErr.text('Mobile number must be 10 digits')
    }

    // Yeslai pachi implement garna sakiyo password ko length chahiye
    // if(pass.length<6){
    //     passErr.text('Password must be length of 6')
    // }

    if(grecaptcha.getResponse() == ""){
        captachaErr.text('Please confirm that you are a human')
    }

}
