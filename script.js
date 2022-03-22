/* FUNZIONI CHECK SUI FORM */
check_mail = false;
function pwd_check_update() {
    if (pwd_check()) {
        document.getElementById("myform").submit();
    }
}

function pwd_check() {
    var password = document.getElementById("pass").value;
    var confirm = document.getElementById("confirm").value;
    if (password.length < 6) {
        document.getElementById("control").innerHTML = "La password non può essere minore di 6 caratteri";
        document.getElementById("myform").addEventListener("submit", function (event) {
            event.preventDefault();
        });
    }
    else if (password != confirm) {
        document.getElementById("control").innerHTML = "Le password non corrispondono";
        document.getElementById("myform").addEventListener("submit", function (event) {
            event.preventDefault();
        });
    }
    else if (password.length >= 6 && password == confirm) {
        return true;
    }
}

function controllo() {
    var firstname = document.getElementById("firstname").value;
    var lastname = document.getElementById("lastname").value;
    var password = document.getElementById("pass").value;
    var confirm = document.getElementById("confirm").value;
    var email = document.getElementById("email").value;
    if (password == "" || confirm == "" || firstname == "" || lastname == "" || email == "") {
        document.getElementById("control").innerHTML = "Tutti i campi sono obbligatori";
        document.getElementById("myform").addEventListener("submit", function (event) {
            event.preventDefault();
        });
    }
    else if (check_mail == false) {      //se la mail è già presente
        pwd_check()
        document.getElementById("myform").addEventListener("submit", function (event) {
            event.preventDefault();     //impedisco l'invio del form
        });
    }
    else if (pwd_check()) {
        document.getElementById("control").innerHTML = "";
        document.getElementById("myform").submit();
    }
}

function loginCheck() {
    if (document.getElementById("emailControl").innerHTML != "") {
        document.getElementById("emailControl").focus();
        return false;
    }
    else {
        document.getElementById("myform").action = "login.php";
        document.getElementById("myform").submit();
    }
}

function verifica() {        //API Fetch su registrazione e login
    var filename = window.location.href.replace(/^.*[\\\/]/, '');       //vado a vedere il nome del file nel url così posso gestire in modo diverso la presenza della mail in fase di loginForm o registrazione

    email = encodeURI(document.getElementById("email").value);
    fetch('checkmail.php', {
        method: "post",
        headers: { "Content-type": "application/x-www-form-urlencoded" },
        body: "email=" + email,
    }).then(function (response) {
        if (response.status != 200) {
            console.log("problem: " + response.status);
            return false;
        }
        return response.text();     //non andato a buon fine

    }).then(function (result) {
        if (result === "mailNonDisp" && filename === "registrationForm.php") {
            document.getElementById("emailControl").innerHTML = "La seguente mail è già associata ad un'altro account";
            check_mail = false;
        }
        else if (result === "mailDisp" && filename === "loginForm.php") {
            document.getElementById("emailControl").innerHTML = "La seguente mail non è associata a nessun account";
        }
        else {
            document.getElementById("emailControl").innerHTML = "";
            check_mail = true;
        }
    });
}

/* FUNZIONI CHECK SUI FORM */

/* FUNZIONI LINK */
function int() {
    window.location = "shopint.php";
}
function est() {
    window.location = "shopest.php";
}
function guid() {
    window.location = "guida.php";
}
function cart() {
    window.location = "cart.php";
}
function valutazione() {
    window.location = "valutation.php";
}
function index() {
    clearCart();
    window.location = "index.php";
}

/* FUNZIONI LINK */


/* FUNZIONI CART */

function addToCart(id) {
    var name = document.getElementById("product_" + id).innerHTML;
    var quantity = document.getElementById("quantity_" + id).value;
    document.cookie = "products=" + merge(name, quantity) + "";
}

function merge(name, quantity) {        //cancello le ripetizione nel carrello di un prodotto
    var old = getCookie("products");
    if (old === null) return (name + "|" + quantity + "!");
    var temp = old.split("!");
    var newStr = "";
    var trovato = false;
    temp.forEach(prod => {
        if (prod == "") return;        //se il punto esclamativo è l'ultimo prod è vuoto, quindi lo salto
        if (prod.split("|")[0] == name) {
            trovato = true;       //se nei cookie c'è già quell'elemento
            var newQuantity = parseInt(prod.split("|")[1]) + parseInt(quantity);        //sommo alla sua quantità la quantità nuova
            newStr += name + "|" + newQuantity;
        }
        else {
            newStr += prod;       //sennò riscrivo quello che c'era
        }
        newStr += "!";
    })
    if (!trovato) newStr += name + "|" + quantity + "!";     //se invece quell'elemento non c'era lo aggiungo con la relativa quantità
    return newStr;
}

function getCookie(cname) {     //ritorna il valore del cookie con quel nome altrimenti null
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return null;
}

function clearCart() {
    document.cookie = "products=" + getCookie("products") + "; expires=Thu, 18 Dec 2021 12:00:00 UTC";
}


function RemoveToCart(id) {
    var name = document.getElementById("product_" + id).innerHTML;
    var quantity = document.getElementById("quantity_" + id).innerHTML;
    var old = getCookie("products");
    old = old.replace(name + "|" + parseInt(quantity) + "!", "")
    document.cookie = "products=" + old + "";
    if (getCookie("products") == "") clearCart();       //se il cookie è vuoto lo cancello
}

function addEval(id) {
    var name = document.getElementById("product_" + id).innerHTML;
    var evaluation = document.getElementById("productEval_" + id).value;
    document.cookie = "toEval=" + name + "|" + evaluation + "";
    window.location = "valutationProcess.php";
    RemoveToCart(id);
}

function emptycart() {
    if (document.getElementById("total_price").innerHTML == "0") {
        document.getElementById("myform").addEventListener("submit", function (event) {
            event.preventDefault();
        });
        document.getElementById("control").innerHTML = "Carrello vuoto, Impossibile effettuare acquisti";
    }
    else {
        document.getElementById("control").innerHTML = "";
    }
}
/* FUNZIONI CART */







