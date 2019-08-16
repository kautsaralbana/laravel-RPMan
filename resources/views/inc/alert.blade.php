<style>
    .alert {
        z-index: 99;
        top: 200px;
        right: 18px;
        min-width: 30%;
        position: fixed;
        animation: slide 0.5s forwards;
    }
    @keyframes slide {
        100% {
            top: 70px;
        }
    }
    @media screen and (max-width: 668px) {
        .alert {
            /* center the alert on small screens */
            left: 10px;
            right: 10px;
        }
    }
</style>
