function loadImage(event)
{
    const imagePreview = document.getElementById('productImagePreview')
    const input = event.target

    const image = URL.createObjectURL(input.files[0])
    imagePreview.src = image
}