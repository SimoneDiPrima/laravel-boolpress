const deleteForm = document.querySelectorAll('.delete-form');
deleteForm.forEach(form=>{
    form.addEventListener('submit',(event)=>{
        event.preventDefault();
        const hasConfirmed = confirm('Sei sicuro di voler eliminare questo post??');
        if(hasConfirmed){form.submit()};
    })
})