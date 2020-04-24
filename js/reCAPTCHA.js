document.getElementById("submit").disabled = true;
document.getElementById("submit").textContent = "Carregando...";

grecaptcha.ready(function () {
    grecaptcha
        .execute('Your site key here', { action: 'homepage' })
        .then(token => {

            var gRecaptchaResponse = document.getElementById("g-recaptcha-response");

            gRecaptchaResponse.value = token;

            document.getElementById("submit").disabled = false;
            document.getElementById("submit").textContent = "Send";

        });
});