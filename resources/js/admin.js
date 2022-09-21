window.addEventListener('load', function () {
    const deleteButtonHandler = document.querySelectorAll('.js-delete-button');
    if (deleteButtonHandler.length === 0) {
        return;
    }

    deleteButtonHandler.forEach(el => {
        el.addEventListener('click', (e) => {
            if (confirm(`Сигурни ли сте, че искате да изтриете продукт: ${e.target.id} ?`)) {
                e.target.closest('#js-delete-form').submit();
            }
        })
    })
});
