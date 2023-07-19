function loadImage(event)
{
    const imagePreview = document.getElementById('productImagePreview')
    const input = event.target

    const image = URL.createObjectURL(input.files[0])
    imagePreview.src = image
}

function showProduct(e)
{
    const getId = e.currentTarget.dataset.productid
    window.location.href = '/product/show/' + getId
    console.log('/product/show/' + getId)
}