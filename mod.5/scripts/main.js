console.log('test');

const btnDeleteImg = document.querySelector('#btnDeleteImg');
const chbDelete = document.querySelectorAll('.chbDelete');

// массив для выбранных изображений
let selectedImages = [];

// заполняем массив selectedImages выбранными изображениями 
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

//отправляем выбранные изображения в формате json методом post
btnDeleteImg.addEventListener('click', async () => {
    const res  = await fetch (`../delete_img.php?delete=true&deletedImd=${JSON.stringify(selectedImages)}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(selectedImages)
    });
    console.log(res.status);


})
