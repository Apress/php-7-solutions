var cbox = document.getElementById('allowUpload');
cbox.style.display = 'block';
var uploadImage = document.getElementById('upload_new');
uploadImage.onclick = function () {
    var image_id = document.getElementById('image_id');
    var image = document.getElementById('image');
    var caption = document.getElementById('caption');
    var sel = uploadImage.checked;
    image_id.disabled = sel;
    image.parentNode.style.display = sel ? 'block' : 'none';
    caption.parentNode.style.display = sel ? 'block' : 'none';
    image.disabled = !sel;
    caption.disabled = !sel;
}
