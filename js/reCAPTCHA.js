document.getElementById("submit").disabled = true;
document.getElementById("submit").textContent = "Carregando...";

grecaptcha.ready(function () {
    grecaptcha
        .execute('6LdD2-0UAAAAAPk1AG0xz0zRqchBIQ08ltbcPDJ7', { action: 'homepage' })
        .then(token => {

            var gRecaptchaResponse = document.getElementById("g-recaptcha-response");

            gRecaptchaResponse.value = token;

            document.getElementById("submit").disabled = false;
            document.getElementById("submit").textContent = "Send";

        });
});