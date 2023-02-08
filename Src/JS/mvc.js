window.onload = () => {
    let d = document;

    /************************************************
     *** Gestion des options de l'application
     *** à travers les composant bootstrap OffCanvas
     *************************************************/
    let offcanvasTitle = d.querySelector('#mvcOffCanvas .offcanvas-title');
    let offcanvasBody = d.querySelector('#mvcOffCanvas .offcanvas-body');

    d.querySelectorAll('.openOffcanvas').forEach(canvas => {
        canvas.addEventListener('click', (e) => {
            let $this = e.currentTarget;
            let title = $this.dataset['title'];
            let content = $this.dataset['content'];
            fetch(content).then(response => {
                return response.text();
            }).then(data => {
                offcanvasTitle.textContent = title;
                offcanvasBody.innerHTML = data;
            });
            const Offcanvas = new bootstrap.Offcanvas('#mvcOffCanvas');
            Offcanvas.show();
        });
    });
    d.querySelector('#mvcOffCanvas').addEventListener('input', (e) => {
        let $this = e.target;
        switch ($this.id) {
            case 'bg-color':
                d.body.style.backgroundColor = $this.value;
                break;
            case 'titles-color':
                d.querySelectorAll('h1,h2,h3,h4,h5,h6').forEach(title => {
                    title.style.color = $this.value;
                });
                break;
            case 'texts-color':
                d.querySelectorAll('td').forEach(text => {
                    text.style.color = $this.value;
                });
                break;
        }
    }, true);

    /************************************************
     *** Gestion de la liste des régions
     *************************************************/
    let regionsList = d.querySelector('#regionsList');
    let countrieslist = d.querySelector('#countriesList');
    let regionsForm = d.querySelector('#regionsForm');
    let selectedList = d.querySelector('#selectedList');
    let regionName = d.querySelector('#regionName');
    regionsList.addEventListener('change', (e) => {
        let $this = e.currentTarget;
        if (parseInt($this.value) !== 0) {
            //On récupère le nom de la région sélectionnée
            let regionSelected = $this.selectedOptions[0].text;
            // On affiche l'animation
            selectedList.innerHTML = '<img src="assets/imgs/puff.svg" class="w-25" alt="Animation de chargement">';
            // On soumet le formulaire en fetch
            fetch('/', {
                method: 'POST',
                enctype: 'JSON',
                body: new FormData(regionsForm)
            }).then(response => {
                return response.json();
            }).then(data => {
                if (data.success === true) {
                    setTimeout(() => {
                        regionName.innerHTML = regionSelected;
                        selectedList.innerHTML = data.content;
                    }, 1000);
                }
            });
            countrieslist.classList.remove('d-none');
        } else {
            regionName.innerHTML = selectedList.innerHTML = '';
            countrieslist.classList.add('d-none');
        }
    });
}