document.addEventListener('DOMContentLoaded', function () {
    'use strict';
    const btn = document.getElementById('menuToggle');
    const menu = document.getElementById('menu');

    btn.addEventListener('click', function () {
        menu.classList.toggle('show');
        btn.classList.toggle('active');

    });
});