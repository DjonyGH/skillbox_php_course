console.log('test');

// const downloadImg = document.addEventListener('click', async () => {
//     const response = await fetch('index.php', {
//         method: 'POST',
//         enctype: 'multypart/form-data'
//     })
// })

const btnDeleteImg = document.querySelector('#btnDeleteImg');
const chbDelete = document.querySelectorAll('.chbDelete');

let selectedImages = [];

chbDelete.forEach(item => {
    item.addEventListener('change', () => {
        if (item.checked) {
            selectedImages.push(item.name);
        } else {            
            const index = selectedImages.indexOf(item.name);
            if (index > -1) {
                selectedImages.splice(index, 1);
            }
        }
    })
    
});

btnDeleteImg.addEventListener('click', async () => {
    // console.log(selectedImages.join());
    const res  = await fetch ('index.php?delete=true', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(selectedImages)
    });
    window.location.reload();

})
