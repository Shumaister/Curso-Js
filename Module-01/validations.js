function validate_fields() {
    
    // validacion nombre
    if(is_empty_field('name'))
        return false;

    // validacion apellido
    if(is_empty_field('lastname'))
        return false;

    // validacion fecha cumpleanios
    if(!is_date_valid())
        return false;

    // validacion usuario
    if(!is_user_valid())
        return false;

    return true;
}

function is_empty_field(field){    
    var element = document.getElementById(field);

    if(element.value !== '')
        return false;

    alert("El campo "+ element.getAttribute("name") + " es obligatorio.");
    return true;
}

function is_date_valid(){
    if(is_empty_field('birthday'))
        return false;
        
    //to do dacidir como ahcer la fecha basicamente
    return true;
}

function is_user_valid(){
    if( is_empty_field('user'))
        return false;
    
    var element = document.getElementById("user");

    //if(!anyNumber(element.value) )
    //    console.log("NO TIENE NUMEROS");

    return false;
}

function anyNumber(text){ // FIX
    for(i=0; i<text.length; i++){
        if (numeros.indexOf(text.charAt(i),0)!=-1){
           return true;
        }
     }
     return false;
}

function anyLetter(text){ // FIX
    text = text.toLowerCase();
    for(i=0; i<text.length; i++){
       if (letras.indexOf(text.charAt(i),0)!=-1){
          return true;
       }
    }
    return false;
 }