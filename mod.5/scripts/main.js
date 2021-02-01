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

//отправляем выбранные изображения в формате json методом
btnDeleteImg.addEventListener('click', async () => {
    try {
        const res  = await fetch (`../delete_img.php?delete=true`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(selectedImages)
        });
        location.reload();
        console.log("Выбранные изображения удалены");
    } catch (error) {
        console.log("При удалении возникла ошибка");
    }
    


})
