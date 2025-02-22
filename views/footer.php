<!-- Arquivo responsável pelo componente FOOTER -->

<footer style="background-color: #068ED0;">
    <div class="height d-flex align-items-center justify-content-evenly h-full" style="color: white;">
        <p>Termos | Politicas</p>
        <div class="d-flex align-items-center justify-content-center">
            <p >©Copyright 2022 | Desenvolvido por</p>
            <img class="position-relative" style="top: -5px;" src="assets/logo_rodape_alphacode.png" height="30px" alt="Logo Aphacode">
        </div>
        <p>©Alphacode IT Solutions 2022</p>
    </div>
</footer>

<style>
    .height{
        height: 10vh;
    }

    @media (max-width: 576px) {
        .height{
            height: 20vh;
        }
    }

    @media (max-width: 768px) {
        .height{
            flex-direction: column;
            height: 15vh; 
        }
    }
</style>