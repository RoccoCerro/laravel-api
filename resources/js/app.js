import './bootstrap';
import '~resources/scss/app.scss';
import '~icons/bootstrap-icons.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])


document.querySelectorAll('.project-destroy-form').forEach((form, i) => {
    form.addEventListener('submit', (ev) => {
        ev.preventDefault();
        console.log('delete');
        // Mostrare il modale
        const modalDelete = document.querySelectorAll('.modal-delete');

        modalDelete[i].classList.add('d-block');
        modalDelete[i].classList.remove('d-none');

        const btnYes = document.querySelectorAll('.btn-yes');
        btnYes[i].addEventListener('click', (ev) =>{
            ev.preventDefault();
            console.log('hai cliccato si')
            form.submit();
        })

        const btnNo = document.querySelectorAll('.btn-no');
        btnNo[i].addEventListener('click', (ev) =>{
            ev.preventDefault();
            
            console.log('hai cliccato no');

            modalDelete[i].classList.add('d-none');
            modalDelete[i].classList.remove('d-block');
        })

    });
});